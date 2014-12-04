<?php

class Customer extends \Eloquent {
	protected $fillable = ['group', 'area_code', 'area_desc' ,'sold_to_code', 'customer_code',
	'customer_name', 'ship_to_code', 'ship_to_name', 'account_group', 'dt_channel', 'account_name',
	'active', 'split', 'alternative_sold_to', 'with_allocation', 'ship_to_y', 'ship_to', 'outlet', 'dt_channel_included'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			if(!is_null($row->group)){
				$attributes = array(
					'group' => $row->group,
					'area_code' => $row->area_code,
					'area_desc' => $row->area_desc,
					'sold_to_code' => $row->sold_to_code,
					'customer_code' => $row->customer_code,
					'customer_name' => $row->customer_name,
					'ship_to_code' => $row->ship_to_code,
					'ship_to_name' => $row->ship_to_name,
					'account_group' => $row->account_group,
					'dt_channel' => $row->dt_channel,
					'account_name' => $row->account_name,
					'active' => ($row->active = 'Y') ? 1: 0,
					'split' => $row->split,
					'alternative_sold_to' => $row->alternative_sold_to,
					'with_allocation' =>  ($row->with_allocation = 'Y') ? 1: 0,
					'ship_to_y' => ($row->ship_to_y = 'Y') ? 1: 0,
					'ship_to' => $row->ship_to,
					'outlet' => ($row->outlet = 'Y') ? 1: 0,
					'dt_channel_included' => ($row->dt_channel_included = 'Y') ? 1: 0);
				Customer::create($attributes);
			}
    	});
	}
}