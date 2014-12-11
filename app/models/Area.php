<?php

class Area extends \Eloquent {
	protected $fillable = ['area_group_id', 'area_code', 'area'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			if(!is_null($row->area_group)){
				$area_group = AreaGroup::whereAreaGroup($row->area_group)->first();
				$attributes = array(
					'area_group_id' => $area_group->id,
					'area_code' => $row->area_code, 
					'area' => $row->area_name);
				self::updateOrCreate($attributes, $attributes);
			}
			
    	});
	}

	// test relationship	
	public function area_group()
	{
		return $this->belongsTo('AreaGroup', 'area_group_id', 'id');
	}

	public function sold_tos()
	{
		return $this->hasMany('SoldTo','area_code','area_code');
	}
}