<?php

class ImportController extends \BaseController {

	// public function arealist()
	// {
	// 	Excel::load(public_path('import/arealist.xls'), function($reader) {
	// 		Area::batchInsert($reader->get(array('area_group', 'area_code','area_name')));
	// 	});
	// }

	// public function soldtolist()
	// {
	// 	Excel::load(public_path('import/soldtolist.xls'), function($reader) {
	// 		SoldTo::batchInsert($reader->get(array('area_code', 'sold_to_code', 'customer_code', 'customer_name')));
	// 	});
	// }

	// public function allocationlist()
	// {
	// 	Excel::load(public_path('import/allocationlist.xls'), function($reader) {
	// 		Allocation::batchInsert($reader->get());
	// 	});
	// }

	public function activitytypelist()
	{
		Excel::load(public_path('import/activitytypelist.xls'), function($reader) {
			ActivityType::batchInsert($reader->get());
		});
	}

	public function divisionlist()
	{
		Excel::selectSheets('Material Master')->load(public_path('import/masterfiles.xlsx'), function($reader) {
			Division::batchInsert($reader->get(array('division_id', 'division_desc')));
		});
	}

	public function categorylist()
	{
		Excel::selectSheets('Material Master')->load(public_path('import/masterfiles.xlsx'), function($reader) {
			Category::batchInsert($reader->get(array('division_id', 'category_id','category_desc')));
		});
	}

	public function brandlist()
	{
		Excel::selectSheets('Material Master')->load(public_path('import/masterfiles.xlsx'), function($reader) {
			Brand::batchInsert($reader->get(array('category_id', 'brand_id','brand_desc')));
		});
	}

	//---------
	public function channel()
	{
		Excel::selectSheets('Channel')->load(public_path('import/masterfile_12012014.xlsx'), function($reader) {
			Channel::batchInsert($reader->get(array('channel_code', 'channel_desc')));
		});
	}

	//---------
	public function customer()
	{
		Excel::selectSheets('Customer')->load(public_path('import/masterfile_12012014.xlsx'), function($reader) {
			Customer::batchInsert($reader->get());
		});
	}
}