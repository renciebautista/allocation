<?php

class ShipToController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /shipto
	 *
	 * @return Response
	 */
	public function index()
	{
		$soldtos = SoldTo::join('areas','areas.area_code','=','sold_tos.area_code')
			->orderBy('sold_tos.area_code')
			->orderBy('sold_tos.customer_name')->get();
		return View::make('shipto.index', compact('soldtos'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /shipto/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /shipto
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /shipto/{id}
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
	 * GET /shipto/{id}/edit
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
	 * PUT /shipto/{id}
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
	 * DELETE /shipto/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}