<?php
namespace Api;

class SkuController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /api/sku
	 *
	 * @return Response
	 */
	public function index()
	{
		if(\Request::ajax()){
			$filter = \Input::get('brand');
			$data = array();
			if($filter != ''){
				$data = \Sku::select('sku_code', 'sku_desc')
				->whereIn('brand_code',$filter)
				->groupBy('sku_code')
				->orderBy('sku_desc')->lists('sku_desc', 'sku_code');
			}

			return \Response::json($data,200);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /api/sku/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /api/sku
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /api/sku/{id}
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
	 * GET /api/sku/{id}/edit
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
	 * PUT /api/sku/{id}
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
	 * DELETE /api/sku/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}