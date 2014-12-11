<?php

class DtShipToSale extends \Eloquent {
	protected $fillable = [];
	protected $table = 'ship_to_sales';

	public static function sales($cmd_customer_code,$skus){
		return self::where('cmd_customer_code',$cmd_customer_code)
					->whereIn('sku_code',$skus)
					->sum('gsv');;
	}
}