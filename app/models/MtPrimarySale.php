<?php

class MtPrimarySale extends \Eloquent {
	protected $fillable = [];

	public static function sales($area_code,$customer_code,$skus){
		return self::where('area_code',$area_code)
					->where('customer_code',$customer_code)
					->whereIn('sku_code',$skus)
					->sum('gsv');;
	}
}