<?php

class Division extends \Eloquent {
	protected $fillable = ['id', 'division'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			// echo $row->division_id .'=>'.$row->division_desc.'</br>';
			if(!is_null($row->division_id)){
				$attributes = array(
					'id' => $row->division_id,
					'division' => $row->division_desc);
				Division::updateOrCreate($attributes, $attributes);
			}
    	});
	}
}