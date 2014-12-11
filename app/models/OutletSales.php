<?php

class OutletSales extends \Eloquent {
	protected $fillable = [];

	public static function sales($area_code,$customer_ship_to_code,$skus){
		return self::where('area_code',$area_code)
					->where('customer_ship_to_code',$customer_ship_to_code)
					->whereIn('sku_code',$skus)
					->sum('gsv');;
	}
	
}