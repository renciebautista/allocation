<?php

class Brand extends \Eloquent {
	protected $fillable = ['id', 'category_id', 'brand'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			// echo $row->division_id .'=>'.$row->division_desc.'</br>';
			if(!is_null($row->brand_id)){
				$attributes = array(
					'id' => $row->brand_id,
					'category_id' => $row->category_id,
					'brand' => $row->brand_desc);
				Brand::updateOrCreate($attributes, $attributes);
			}
    	});
	}
}