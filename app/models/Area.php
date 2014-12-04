<?php

class Area extends \Eloquent {
	protected $fillable = ['area_group_id', 'area_code', 'area'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			print_r($row);
			if(!is_null($row->area_group)){
				$area_group = AreaGroup::whereAreaGroup($row->area_group)->first();
				$attributes = array(
					'area_group_id' => $area_group->id,
					'area_code' => $row->area_code, 
					'area' => $row->area_name);
				Area::updateOrCreate($attributes, $attributes);
			}
			
    	});
	}
}