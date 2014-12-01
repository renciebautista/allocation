<?php

class Category extends \Eloquent {
	protected $fillable = ['id', 'division_id', 'category'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			// echo $row->division_id .'=>'.$row->division_desc.'</br>';
			if(!is_null($row->category_id)){
				$attributes = array(
					'id' => $row->category_id,
					'division_id' => $row->division_id,
					'category' => $row->category_desc);
				Category::updateOrCreate($attributes, $attributes);
			}
    	});
	}
}