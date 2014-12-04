<?php
namespace Api;
class CustomerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /api/customer
	 *
	 * @return Response
	 */
	public function index()
	{
		if(\Request::ajax()){
			$data['group'] = \Input::get('group');
			$data['channel'] = \Input::get('channel');

			$customers = \DB::table('customers')
			->where(function($query) use ($data){
				if(!empty($data['group'])){
					$query->whereIn('group',$data['group'])->get();
				}
				if(!empty($data['channel'])){
					$query->whereIn('dt_channel',$data['channel'])->get();
				}
			})
			->groupBy('customer_code')
			->orderBy('customer_name')
			->get();
			$data = array();
			if($customers)
			{
				foreach ($customers as $row)
				{
					$data[$row->customer_code] = $row->customer_name;
				}
			}
			return \Response::json($data,200);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /api/customer/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /api/customer
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /api/customer/{id}
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
	 * GET /api/customer/{id}/edit
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
	 * PUT /api/customer/{id}
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
	 * DELETE /api/customer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}