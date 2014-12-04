<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::resource('areagroup', 'AreaGroupsController');
Route::resource('area', 'AreasController');
Route::resource('soldto', 'SoldToController');
Route::resource('shipto', 'ShipToController');

Route::resource('activity', 'ActivityController');

Route::resource('scheme', 'SchemeController');

Route::group(array('prefix' => 'api'), function()
{
	Route::post('category', 'api\CategoryController@index');
	Route::post('brand', 'api\BrandController@index');
	Route::post('sku', 'api\SkuController@index');
	Route::post('customer', 'api\CustomerController@index');
	Route::post('outlet', 'api\OutletController@index');
});

Route::group(array('prefix' => 'import'), function()
{
	Route::get('areagrouplist', 'ImportController@areagrouplist');
	Route::get('arealist', 'ImportController@arealist');
	Route::get('soldtolist', 'ImportController@soldtolist');
	Route::get('shiptolist', 'ImportController@shiptolist');
	Route::get('outletlist', 'ImportController@outletlist');
	Route::get('channellist', 'ImportController@channellist');
	Route::get('accountgrouplist', 'ImportController@accountgrouplist');
	// Route::get('activitytypelist', 'ImportController@activitytypelist');
	// Route::get('divisionlist', 'ImportController@divisionlist');
	// Route::get('categorylist', 'ImportController@categorylist');
	// Route::get('brandlist', 'ImportController@brandlist');
	// Route::get('cpglist', 'ImportController@cpglist');
	// Route::get('packsizelist', 'ImportController@packsizelist');

	Route::get('skulist', 'ImportController@skulist');

	Route::get('channel', 'ImportController@channel');
	Route::get('customer', 'ImportController@customer');
});


Route::get('/customer', function(){
	$channels = DB::table('outlets')
		->select('channel')
		->groupBy('channel')
		->get();
	$data = DB::table('area_groups')->get();
	foreach ($data as $key => $value) {
		$area = DB::table('areas')->where('area_group_id',$value->id)->get();
		foreach ($area as $key2 => $_area) {
			$sold_to = DB::table('sold_tos')->where('area_code',$_area->area_code )->get();
			foreach ($sold_to as $key3 => $shipto) {
				$ship_to =  DB::table('ship_tos')->where('customer_code',$shipto->customer_code )->get();
				foreach ($ship_to as $key4 => $outlet) {
					if($outlet->cmd_customer_code != ''){

						foreach ($channels as $channel) {
							$outlets = DB::table('outlets')
								->where('customer_ship_to_code',$outlet->cmd_customer_code )
								->where('area_code',$_area->area_code)
								->where('channel',$channel->channel)
								->get();
								
							if(count($outlets)>0){
								$ship_to[$key4]->channel = array('channel' => $channel->channel);
								$ship_to[$key4]->outlet = $outlets;
							}
						}
						
					}
				}
				$sold_to[$key3]->shipto = $ship_to;
			}
			$area[$key2]->sold_to = $sold_to;

		}

		$data[$key]->area = $area;
	}
	return View::make('customer',compact('data'));
});

