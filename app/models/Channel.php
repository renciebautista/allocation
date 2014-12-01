<?php

class Channel extends \Eloquent {
	protected $fillable = ['id', 'channel'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			if(!is_null($row->channel_desc)){
				$attributes = array(
					'id' => $row->channel_code,
					'channel' => $row->channel_desc);
				Channel::updateOrCreate($attributes, $attributes);
			}
    	});
	}
}