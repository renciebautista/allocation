<?php

class SoldToController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /soldto
	 *
	 * @return Response
	 */
	public function index()
	{
		$soldtos = SoldTo::join('areas','areas.area_code','=','sold_tos.area_code')
			->orderBy('sold_tos.area_code')
			->orderBy('sold_tos.customer_name')->get();
		return View::make('soldto.index', compact('soldtos'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /soldto/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /soldto
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /soldto/{id}
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
	 * GET /soldto/{id}/edit
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
	 * PUT /soldto/{id}
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
	 * DELETE /soldto/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}