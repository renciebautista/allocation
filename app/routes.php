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

Route::group(array('prefix' => 'api'), function()
{
	Route::post('category', 'api\CategoryController@index');
	Route::post('brand', 'api\BrandController@index');
});

Route::group(array('prefix' => 'import'), function()
{
	// Route::get('arealist', 'ImportController@arealist');
	// Route::get('soldtolist', 'ImportController@soldtolist');
	// Route::get('shiptolist', 'ImportController@shiptolist');
	// Route::get('allocationlist', 'ImportController@allocationlist');
	Route::get('activitytypelist', 'ImportController@activitytypelist');
	Route::get('divisionlist', 'ImportController@divisionlist');
	Route::get('categorylist', 'ImportController@categorylist');
	Route::get('brandlist', 'ImportController@brandlist');

	Route::get('channel', 'ImportController@channel');
	Route::get('customer', 'ImportController@customer');
});




