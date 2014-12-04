<?php
namespace Api;

class OutletController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /api/outlet
	 *
	 * @return Response
	 */
	public function index()
	{
		if(\Request::ajax()){
			$filter = \Input::get('customer');
			if($filter != ''){
				$outlets = \DB::table('customers')
				->whereIn('customer_code',$filter)
				->where('outlet',1)
				->get();

				$data = array();
				if($outlets)
				{
					foreach ($outlets as $row)
					{
						$data[$row->id] = $row->account_name;
					}
				}
				
			}else{
				$data = array();
			}
			return \Response::json($data,200);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /api/outlet/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /api/outlet
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /api/outlet/{id}
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
	 * GET /api/outlet/{id}/edit
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
	 * PUT /api/outlet/{id}
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
	 * DELETE /api/outlet/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}