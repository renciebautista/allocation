<?php

class Channel extends \Eloquent {
	protected $fillable = ['id', 'channel'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			if(!is_null($row->id)){
				$attributes = array(
					'id' => $row->id,
					'channel' => $row->channel);
				self::updateOrCreate($attributes, $attributes);
			}
    	});
	}

}