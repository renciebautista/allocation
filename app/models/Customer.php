<?php

class Customer extends \Eloquent {
	protected $fillable = [];

	public static function getList(){
		$total = DB::table('sold_tos')
			->select('area_group','area','customer_name','customer_code','sold_tos.area_code as sold_to_area_code')
			->join('areas', 'sold_tos.area_code', '=', 'areas.area_code')
			->join('area_groups', 'areas.area_group_id', '=', 'area_groups.id')
			// ->where('sold_tos.active', 1)
			// ->orderBy('area_group','DESC')
			// ->orderBy('area')
			->get();
		foreach ($total as $key => $value) {
			$shipto = self::getShipTo($value->customer_code);
			foreach ($shipto as $key1 => $value1) {
				$shipto[$key1]->outlet = self::getOutlet($value->sold_to_area_code, $value1->cmd_customer_code);
			}
			$total[$key]->shipto = $shipto;
		}
		return $total;
	}

	private static function getShipTo($customer_code){
		return DB::table('ship_tos')
			->where('customer_code',$customer_code)
			->get();
	}

	private static function getOutlet($area_code, $customer_ship_to_code){
		return DB::table('outlets', 'channel')
			->join('channels', 'outlets.channel', '=', 'channels.id')
			->where('area_code',$area_code)
			->where('customer_ship_to_code',$customer_ship_to_code)
			->get();
	}
}