<?php
namespace Api;

class BrandController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /api/brande
	 *
	 * @return Response
	 */
	public function index()
	{
		if(\Request::ajax()){
			$filter = \Input::get('categories');
			$data = array();
			if($filter != ''){
				$data = \Sku::select('brand_code', 'brand_desc')
				->whereIn('category_code',$filter)
				->groupBy('brand_code')
				->orderBy('brand_desc')->lists('brand_desc', 'brand_code');
			}

			return \Response::json($data,200);

			// // dd(\Input::all());
			// // $brands = \Category::where('division_id',\Input::get('q'))->get();
			// $filter = \Input::get('categories');
			// if($filter != ''){
			// 	$category_brand = \DB::table('brands')
			// 	->whereIn('category_id',$filter)
			// 	->get();
			// 	$brands = array();
			// 	if($category_brand)
			// 	{
			// 		foreach ($category_brand as $row)
			// 		{
			// 			$brands[$row->id] = $row->brand;
			// 		}
			// 	}
				
			// }else{
			// 	$brands = array();
			// }
			// return \Response::json($brands,200);
			// // return \Response::json(array(
			// // 	'error' => false,
			// // 	'brands' => $brands),
			// // 	200
			// // );
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /api/brande/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /api/brande
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /api/brande/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /api/brande/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /api/brande/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /api/brande/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}