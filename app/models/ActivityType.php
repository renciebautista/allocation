<?php

class ActivityType extends \Eloquent {
	protected $fillable = ['activity_type'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			if(!is_null($row->activity_type)){
				$attributes = array(
					'activity_type' => $row->activity_type);
				ActivityType::updateOrCreate($attributes, $attributes);
			}
			
    	});
	}
}