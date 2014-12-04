<?php

class ShipTo extends \Eloquent {
	protected $fillable = ['customer_code', 'cmd_customer_code', 'ship_to_name'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			if($row->active == 'Y'){
				if(!is_null($row->customer_code)){
					$attributes = array(
						'customer_code' => $row->customer_code,
						'cmd_customer_code' => $row->cmd_customer_code, 
						'ship_to_name' => $row->ship_to_name);
					ShipTo::updateOrCreate($attributes, $attributes);
				}
			}
    	});
	}
}