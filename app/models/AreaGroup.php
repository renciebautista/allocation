<?php

class AreaGroup extends \Eloquent {
	protected $fillable = ['id', 'area_group'];
	public $timestamps = false;

	public static function batchInsert($records){
		$records->each(function($row) {
			if(!is_null($row->id)){
				$attributes = array(
					'id' => $row->id,
					'area_group' => $row->area_group);
				self::updateOrCreate($attributes, $attributes);
			}
			
    	});
	}

	// test relationship	
	public function areas()
	{
		return $this->hasMany('Area');
	}
}