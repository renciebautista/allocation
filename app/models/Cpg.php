<?php

class Cpg extends \Eloquent {
	protected $fillable = ['id', 'brand_id', 'cpg'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			// echo $row->division_id .'=>'.$row->division_desc.'</br>';
			if(!is_null($row->cpg_code)){
				$attributes = array(
					'id' => $row->cpg_code,
					'brand_id' => $row->brand_code,
					'cpg' => $row->cpg_desc);
				Cpg::updateOrCreate($attributes, $attributes);
			}
    	});
	}
}