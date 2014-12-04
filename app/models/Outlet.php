<?php

class Outlet extends \Eloquent {
	protected $fillable = ['area_code','customer_ship_to_code', 'account_group', 'account_name','channel'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			if(!is_null($row->area_code	)){
				$attributes = array(
					'area_code' => $row->area_code,
					'customer_ship_to_code' => $row->customer_ship_to_code,
					'account_group' => $row->account_group,
					'channel' => $row->channel,
					'account_name' => $row->account_name);
				Outlet::updateOrCreate($attributes, $attributes);
			}
			
    	});
	}
}