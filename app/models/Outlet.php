<?php

class Outlet extends \Eloquent {
	protected $fillable = ['area_code','customer_ship_to_code', 'account_group', 'channel','account_name', 'active'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			if(!is_null($row->area_code	)){
				$account_group = AccountGroup::whereAccountGroup($row->account_group)->first();
				$channel = Channel::whereChannel($row->channel)->first();
				$attributes = array(
					'area_code' => $row->area_code,
					'customer_ship_to_code' => $row->customer_ship_to_code,
					'account_group' => $account_group->id,
					'channel' => $channel->id,
					'account_name' => $row->account_name,
					'active' => ($row->active == 'Y') ? 1 : 0);
				self::updateOrCreate($attributes, $attributes);
			}
			
    	});
	}
}