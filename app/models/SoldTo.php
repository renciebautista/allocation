<?php

class SoldTo extends \Eloquent {
	protected $fillable = ['area_code', 'soldto_code', 'customer_code', 'customer_name'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			if(!is_null($row->area_code)){
				$attributes = array(
					'area_code' => $row->area_code,
					'soldto_code' => $row->sold_to_code, 
					'customer_code' => $row->customer_code, 
					'customer_name' => $row->customer_name);
				SoldTo::updateOrCreate($attributes, $attributes);
			}
			
    	});
	}
}