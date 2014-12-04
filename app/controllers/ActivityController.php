<?php

class ActivityController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /activity
	 *
	 * @return Response
	 */
	public function index()
	{
		$activities = array();
		return View::make('activity.index', compact('activities'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /activity/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$scopes = Scope::orderBy('scope')->lists('scope', 'id');
		$activity_types = ActivityType::orderBy('activity_type')->lists('activity_type', 'id');
		$cycles = Cycle::orderBy('cycle_name')->lists('cycle_name', 'id');

		$divisions = Sku::select('division_code', 'division_desc')
			->groupBy('division_code')
			->orderBy('division_desc')->lists('division_desc', 'division_code');

		$objectives = Objective::orderBy('objective')->lists('objective', 'id');
		$area_groups = AreaGroup::orderBy('area_group')->lists('area_group', 'id');
		$channels = Channel::orderBy('channel')->lists('channel', 'id');
		return View::make('activity.create', compact('scopes', 'activity_types', 'cycles', 
			'divisions', 'objectives', 'area_groups', 'channels'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /activity
	 *
	 * @return Response
	 */
	public function store()
	{
		dd(Input::all());
	}

	/**
	 * Display the specified resource.
	 * GET /activity/{id}
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
	 * GET /activity/{id}/edit
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
	 * PUT /activity/{id}
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
	 * DELETE /activity/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}