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
			// dd(\Input::all());
			// $categories = \Category::where('division_id',\Input::get('q'))->get();

			$division_categories = \DB::table('categories')
			->where('division_id',\Input::get('q'))
			->get();
			$categories = array();
			if($division_categories)
			{
				foreach ($division_categories as $row)
				{
					$categories[$row->id] = $row->category;
				}
			}

			// return \Response::json(array(
			// 	'error' => false,
			// 	'categories' => $categories),
			// 	200
			// );
			return \Response::json($categories,200);
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