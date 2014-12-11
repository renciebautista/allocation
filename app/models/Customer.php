<?php

class Customer extends \Eloquent {
	protected $fillable = [];

	public static function getList2(){
		$skus = array('20226140');

		$soldtos = DB::table('sold_tos')
			->select('area_group','area','customer_name','customer_code','sold_tos.area_code as sold_to_area_code')
			->join('areas', 'sold_tos.area_code', '=', 'areas.area_code')
			->join('area_groups', 'areas.area_group_id', '=', 'area_groups.id')
			->where('sold_tos.active', 1)
			->get();

		$soldto = array();
		foreach ($soldtos as $_soldto) {
			$soldto[] = $_soldto->customer_code;
		}
		
		// get all ship to
		$_shiptos = DB::table('ship_tos')->get();
		// get all outlets
		$_outlets = DB::table('outlets')
			->join('channels', 'outlets.channel', '=', 'channels.id')
			->get();
		// get all MT Primary Sales
		$_mt_primary_sales = DB::table('mt_primary_sales')
					->select(DB::raw("area_code,customer_code, SUM(gsv) as gsv"))
					->whereIn('sku_code',$skus)
					->groupBy(array('area_code','customer_code'))
					->get();
		// get all DT Secondary Sales
		$_dt_secondary_sales = DB::table('dt_secondary_sales')
					->select(DB::raw("area_code,customer_code, SUM(gsv) as gsv"))
					->whereIn('sku_code',$skus)
					->groupBy(array('area_code','customer_code'))
					->get();	

		// get Ship To Sales
		$_ship_to_sales = DB::table('ship_to_sales')
					->select(DB::raw("cmd_customer_code, SUM(gsv) as gsv"))
					->whereIn('sku_code',$skus)
					->groupBy('cmd_customer_code')
					->get();	

		// get Oulet Sales
		$_outlet_sales = DB::table('outlet_sales')
					->select(DB::raw("area_code, customer_ship_to_code, SUM(gsv) as gsv"))
					->whereIn('sku_code',$skus)
					->groupBy(array('area_code','customer_ship_to_code'))
					->get();

		foreach ($soldtos as $key => $value) {
			$shiptos = array();
			foreach ($_shiptos as $_shipto) {
				if($value->customer_code == $_shipto->customer_code){
					$shiptos[] = $_shipto;
				}
			}

			foreach ($shiptos as $shiptos_key => $shiptos_value) {
				if(!is_null($shiptos_value->cmd_customer_code)){
					$outlets = array();
					foreach ($_outlets as $_outlet) {
						if(($shiptos_value->cmd_customer_code == $_outlet->customer_ship_to_code) && ($value->sold_to_area_code == $_outlet->area_code)){
							$outlets[] = $_outlet;
						}
					}

					// start oulet sales
					
					foreach ($outlets as $outlets_key => $outlets_value) {
						$abort_oulet = false;
						foreach ($_outlet_sales as $_outlet_sale) {
							if(($outlets_value->area_code == $_outlet_sale->area_code) && ($outlets_value->customer_ship_to_code == $_outlet_sale->customer_ship_to_code)){
								$outlets[$outlets_key]->gsv = $_outlet_sale->gsv;
								$abort_oulet = true;
							}else{
								$outlets[$outlets_key]->gsv = '';
							}
							if ($abort_oulet === true) break;
						}
						
					}

					// end outlet sales

					// start ship to sales
					$abort_shipto = false;
					foreach ($_ship_to_sales as $_ship_to_sale) {
						if($shiptos_value->cmd_customer_code == $_ship_to_sale->cmd_customer_code){
							$shiptos[$shiptos_key]->gsv = $_ship_to_sale->gsv;
							$abort_shipto = true;
						}else{
							$shiptos[$shiptos_key]->gsv = '';
						}
						if ($abort_shipto === true) break;
					}
					// end ship to sales

					$shiptos[$shiptos_key]->outlet = $outlets;
				}else{
					$shiptos[$shiptos_key]->gsv = 0;
					$shiptos[$shiptos_key]->outlet = array();
				}
			}
			$soldtos[$key]->shipto = $shiptos;

			// start sold to sales
			if($value->area_group == 'DT'){
				$abort = false;
				foreach ($_dt_secondary_sales as $_dt_secondary_sale) {
					if(($value->customer_code == $_dt_secondary_sale->customer_code) && ($value->sold_to_area_code == $_dt_secondary_sale->area_code)){
						$soldtos[$key]->gsv = $_dt_secondary_sale->gsv;
						$abort = true;
					}else{
						$soldtos[$key]->gsv = 0;
					}

					if ($abort === true) break;
				}
			}else{
				$abort = false;
				foreach ($_mt_primary_sales as $_mt_primary_sale) {
					if(($value->customer_code == $_mt_primary_sale->customer_code) && ($value->sold_to_area_code == $_mt_primary_sale->area_code)){
						$soldtos[$key]->gsv = $_mt_primary_sale->gsv;
						$abort = true;
					}else{
						$soldtos[$key]->gsv = 0;
					}

					if ($abort === true) break;
				}
			}

			// end sold to sales
		}

		// echo "<pre>";
		// print_r($soldtos);
		// echo "</pre>";
		return $soldtos;
	}
	public static function getList(){
		$skus = array('20226140','65004502');

		$soldtos = DB::table('sold_tos')
			->select('area_group','area','customer_name','customer_code','sold_tos.area_code as sold_to_area_code')
			->join('areas', 'sold_tos.area_code', '=', 'areas.area_code')
			->join('area_groups', 'areas.area_group_id', '=', 'area_groups.id')
			->where('sold_tos.active', 1)
			->get();

		foreach ($soldtos as $key => $value) {
			$shipto = self::getShipTo($value->customer_code);
			foreach ($shipto as $key1 => $value1) {
				if(!is_null($value1->cmd_customer_code)){
					$shipto[$key1]->gsv = DtShipToSale::sales($value1->cmd_customer_code,$skus);
					// $shipto[$key1]->gsv = 0;
					$outlet = self::getOutlet($value->sold_to_area_code, $value1->cmd_customer_code);
					foreach ($outlet as $key2 => $value2) {
						$outlet[$key2]->gsv = OutletSales::sales($value2->area_code,$value2->customer_ship_to_code,$skus);
						// $outlet[$key2]->gsv = 0;
					}
					$shipto[$key1]->outlet = $outlet;

				}else{
					$shipto[$key1]->gsv = '';
					$shipto[$key1]->outlet = array();
				}
			}
			$soldtos[$key]->shipto = $shipto;
			if($value->area_group == 'DT'){
				// $soldtos[$key]->gsv = 0;
				$soldtos[$key]->gsv = DtSecondarySale::sales($value->sold_to_area_code,$value->customer_code,$skus);
			}else{
				// $soldtos[$key]->gsv = 0;
				$soldtos[$key]->gsv = MtPrimarySale::sales($value->sold_to_area_code,$value->customer_code,$skus);
			}

		}
		return $soldtos;
	}

	private static function getShipTo($customer_code){
		return DB::table('ship_tos')
			->where('customer_code',$customer_code)
			->get();
	}

	private static function getOutlet($area_code, $customer_ship_to_code){
		return DB::table('outlets')
			->join('channels', 'outlets.channel', '=', 'channels.id')
			->where('area_code',$area_code)
			->where('customer_ship_to_code',$customer_ship_to_code)
			->get();
	}
}