<?php

class PackSize extends \Eloquent {
	protected $fillable = ['id', 'packsize'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			if(!is_null($row->packsize_code)){
				$attributes = array(
					'id' => $row->packsize_code,
					'packsize' => $row->packsize_desc);
				PackSize::updateOrCreate($attributes, $attributes);
			}
    	});
	}
}