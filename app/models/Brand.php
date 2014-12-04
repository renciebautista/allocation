<?php

class Brand extends \Eloquent {
	protected $fillable = ['id', 'category_id', 'brand'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			// echo $row->division_id .'=>'.$row->division_desc.'</br>';
			if(!is_null($row->brand_code)){
				$attributes = array(
					'id' => $row->brand_code,
					'category_id' => $row->category_code,
					'brand' => $row->brand_desc);
				Brand::updateOrCreate($attributes, $attributes);
			}
    	});
	}
}