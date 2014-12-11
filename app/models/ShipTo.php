<?php

class ShipTo extends \Eloquent {
	protected $fillable = ['customer_code', 'cmd_customer_code', 'ship_to_name', 'active'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			if($row->active == 'Y'){
				if(!is_null($row->customer_code)){
					$attributes = array(
						'customer_code' => $row->customer_code,
						'cmd_customer_code' => $row->cmd_customer_code, 
						'ship_to_name' => $row->ship_to_name,
						'active' => ($row->active == 'Y') ? 1 : 0);
					self::updateOrCreate($attributes, $attributes);
				}
			}
    	});
	}

	// test relationship	
	public function soldto()
	{
		return $this->belongsTo('SoldTo', 'customer_code', 'customer_code');
	}

	public function outlets()
	{
		return $this->hasMany('Outlet','customer_ship_to_code','cmd_customer_code');
	}
}