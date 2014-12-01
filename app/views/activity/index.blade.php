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
			<table class="table table-striped table-condensed table-bordered">
				<thead>
					<tr>
						<th>Activity Type</th>
						<th>Circular No.</th>
						<th>Scheme</th>
						<th>Division/Category/Brand</th>
						<th>CPG</th>
						<th>Packsize</th>
						<th>SKU Code</th>
						<th>SKU Description</th>
						<th>Total Allocation</th>
						<th>Unit of Measure</th>
						<th>No. of Deals/	Case</th>
						<th colspan="2" style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($activities) == 0)
					<tr>
						<td colspan="4">No record found!</td>
					</tr>
					@else
					@foreach($activities as $area)
					<tr>
						<td>{{ $area->area_group }}</td>
						<td>{{ $area->area_code }}</td>
						<td>{{ $area->area }}</td>
						<td class="action">
							{{ HTML::linkRoute('area.edit','Edit', $area->id, array('class' => 'btn btn-info btn-xs')) }}
						</td>
						<td class="action">
							{{ Form::open(array('method' => 'DELETE', 'route' => array('area.destroy', $area->id))) }}                       
							{{ Form::submit('Delete', array('class'=> 'btn btn-danger btn-xs','onclick' => "if(!confirm('Are you sure to delete this record?')){return false;};")) }}
							{{ Form::close() }}
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table> 
		</div>
	</div>
</div>

@stop