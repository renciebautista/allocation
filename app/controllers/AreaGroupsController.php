<?php

class AreaGroupsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /areagroups
	 *
	 * @return Response
	 */
	public function index()
	{
		$areagroups = AreaGroup::orderBy('area_group')->get();
		return View::make('areagroup.index', compact('areagroups'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /areagroups/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /areagroups
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /areagroups/{id}
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
	 * GET /areagroups/{id}/edit
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
	 * PUT /areagroups/{id}
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
	 * DELETE /areagroups/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}