<?php

class ImportController extends \BaseController {

	public function areagrouplist()
	{
		Excel::selectSheets('area_groups')->load(public_path('import/customer.xlsx'), function($reader) {
			AreaGroup::batchInsert($reader->get());
		});
	}

	public function arealist()
	{
		Excel::selectSheets('areas')->load(public_path('import/customer.xlsx'), function($reader) {
			Area::batchInsert($reader->get());
		});
	}

	public function soldtolist()
	{
		Excel::selectSheets('sold_to')->load(public_path('import/customer.xlsx'), function($reader) {
			SoldTo::batchInsert($reader->get());
		});
	}

	public function shiptolist()
	{
		Excel::selectSheets('ship_to')->load(public_path('import/customer.xlsx'), function($reader) {
			ShipTo::batchInsert($reader->get());
		});
	}

	public function channellist()
	{
		Excel::selectSheets('channel')->load(public_path('import/customer.xlsx'), function($reader) {
			Channel::batchInsert($reader->get());
		});
	}

	public function accountgrouplist()
	{
		Excel::selectSheets('account_group')->load(public_path('import/customer.xlsx'), function($reader) {
			AccountGroup::batchInsert($reader->get());
		});
	}

	public function outletlist()
	{
		Excel::selectSheets('outlet')->load(public_path('import/customer.xlsx'), function($reader) {
			Outlet::batchInsert($reader->get());
		});
	}

	// public function allocationlist()
	// {
	// 	Excel::load(public_path('import/allocationlist.xls'), function($reader) {
	// 		Allocation::batchInsert($reader->get());
	// 	});
	// }

	public function activitytypelist()
	{
		Excel::selectSheets('activity_type')->load(public_path('import/customer.xlsx'), function($reader) {
			ActivityType::batchInsert($reader->get());
		});
	}

	public function divisionlist()
	{
		Excel::selectSheets('SKU')->load(public_path('import/masterfile_12012014.xlsx'), function($reader) {
			Division::batchInsert($reader->get(array('division_code', 'division_desc')));
		});
	}

	public function categorylist()
	{
		Excel::selectSheets('SKU')->load(public_path('import/masterfile_12012014.xlsx'), function($reader) {
			Category::batchInsert($reader->get(array('division_code', 'category_code','category_desc')));
		});
	}

	public function brandlist()
	{
		Excel::selectSheets('SKU')->load(public_path('import/masterfile_12012014.xlsx'), function($reader) {
			Brand::batchInsert($reader->get(array('category_code', 'brand_code','brand_desc')));
		});
	}

	// public function cpglist()
	// {
	// 	Excel::selectSheets('SKU')->load(public_path('import/masterfile_12012014.xlsx'), function($reader) {
	// 		Cpg::batchInsert($reader->get(array('brand_code', 'cpg_code','cpg_desc')));
	// 	});
	// }

	// public function packsizelist()
	// {
	// 	Excel::selectSheets('SKU')->load(public_path('import/masterfile_12012014.xlsx'), function($reader) {
	// 		PackSize::batchInsert($reader->get(array('packsize_code', 'packsize_desc')));
	// 	});
	// }

	public function skulist()
	{
		Excel::selectSheets('SKU')->load(public_path('import/masterfile_12012014.xlsx'), function($reader) {
			Sku::batchInsert($reader->get());
		});
	}

	//---------


	//---------
	// public function customer()
	// {
	// 	Excel::selectSheets('Customer')->load(public_path('import/masterfile_12012014.xlsx'), function($reader) {
	// 		Customer::batchInsert($reader->get());
	// 	});
	// }



}