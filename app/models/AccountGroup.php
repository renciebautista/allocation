<?php

class AccountGroup extends \Eloquent {
	protected $fillable = ['id', 'account_group'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			if(!is_null($row->id)){
				$attributes = array(
					'id' => $row->id,
					'account_group' => $row->account_group);
				self::updateOrCreate($attributes, $attributes);
			}
    	});
	}
}