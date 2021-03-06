<?php

namespace Api;

class CategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /api.category
	 *
	 * @return Response
	 */
	public function index()
	{
		if(\Request::ajax()){

			$data = \Sku::select('category_code', 'category_desc')
			->where('division_code',\Input::get('q'))
			->groupBy('category_code')
			->orderBy('category_desc')->lists('category_desc', 'category_code');

			return \Response::json($data,200);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /api.category/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /api.category
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /api.category/{id}
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
	 * GET /api.category/{id}/edit
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
	 * PUT /api.category/{id}
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
	 * DELETE /api.category/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}