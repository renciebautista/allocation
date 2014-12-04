<?php

class Division extends \Eloquent {
	protected $fillable = ['id', 'division'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			if(!is_null($row->division_code)){
				$attributes = array(
					'id' => $row->division_code,
					'division' => $row->division_desc);
				Division::updateOrCreate($attributes, $attributes);
			}
    	});
	}
}