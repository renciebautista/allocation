<?php

class SoldTo extends \Eloquent {
	protected $fillable = ['area_code', 'customer_code', 'customer_name', 'active'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			if(!is_null($row->customer_code)){
				$attributes = array(
					'customer_code' => $row->customer_code,
					'area_code' => $row->area_code,
					'customer_name' => $row->customer_name,
					'active' => ($row->active == 'Y') ? 1 : 0);
				self::updateOrCreate($attributes, $attributes);
			}
			
    	});
	}
}