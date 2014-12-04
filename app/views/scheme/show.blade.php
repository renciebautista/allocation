@extends('layouts.layout')

@section('content')

<div class="page-header" id="banner">
	<div class="row">
	  	<div class="col-lg-8 col-md-7 col-sm-6">
			<h1>Activity List</h1>
	  	</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div >
			<a href="{{ URL::route('activity.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Activity</a>
		</div>
		
	</div>
</div>
<div class="row mytable">
	<div class="col-lg-12">
		<div id="allocation" class="table-responsive">
			<table class="table table-condensed  table-header-rotated">
				<thead>
					<tr>
						<th>Area Group</th>
						<th>Area</th>
						<th>Sold To</th>
						<th>Ship To</th>
						<th>Channel</th>
						<th>Outlet</th>
						<th class="rotate-45"><div><span>SOLD TO PRIMARY SALES GSV IN MILLIONS TOTAL 2013</span></div></th>
						<th class="rotate-45"><div><span>SOLD TO ALLOCATION</span></div></th>
						<th class="rotate-45"><div><span>SHIP TO SECONDARY SALES IN CS AVE. DAILY OFFTAKE</span></div></th>
						<th class="rotate-45"><div><span>SHIP TO ALLOCATION</span></div></th>
						<th class="rotate-45"><div><span>OUTLET SECONDARY SALES GSV IN MILLIONS TOTAL 2013</span></div></th>
						<th class="rotate-45"><div><span>OUTLET SECONDARY SALES GSV IN MILLIONS TOTAL 2013 TOTAL CHANNEL</span></div></th>
						<th class="rotate-45"><div><span>OUTLET ALLOCATION</span></div></th>
						<th class="rotate-45"><div><span>ALLOCATION</span></div></th>
						<th class="rotate-45"><div><span>COMPUTED ALLOCATION</span></div></th>
						<th class="rotate-45"><div><span>VETTED ALLOCATION</span></div></th>
						<th class="rotate-45"><div><span>FINAL ALLOCATION</span></div></th>
					</tr>
				</thead>
				<tbody>
					@if(count($customer) == 0)
					<tr>
						<td colspan="16">No record found!</td>
					</tr>
					@else
					@foreach($customer as $area)
					<tr class="info">
						<td>{{ $area->area_group }}</td>
						<td>{{ $area->area }}</td>
						<td>{{ $area->customer_name }}</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
						@foreach($area->shipto as $shipto)
						<tr>
							<td>{{ $area->area_group }}</td>
							<td>{{ $area->area }}</td>
							<td>{{ $area->customer_name }}</td>
							<td>{{ $shipto->ship_to_name }}</td>
							<td></td>
							<td></td>
						</tr>
							@foreach($shipto->outlet as $outlet)
							<tr class="warning">
								<td>{{ $area->area_group }}</td>
								<td>{{ $area->area }}</td>
								<td>{{ $area->customer_name }}</td>
								<td>{{ $shipto->ship_to_name }}</td>
								<td>{{ $outlet->channel }}</td>
								<td>{{ $outlet->account_name }}</td>
							</tr>
							@endforeach
						@endforeach
					@endforeach
					@endif
				</tbody>
			</table> 
		</div>
	</div>
</div>

@stop