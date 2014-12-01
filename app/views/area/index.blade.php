@extends('layouts.layout')

@section('content')

<div class="page-header" id="banner">
	<div class="row">
	  	<div class="col-lg-8 col-md-7 col-sm-6">
			<h1>Areas</h1>
	  	</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div >
			<a href="{{ URL::route('area.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Area</a>
		</div>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Area Group</th>
						<th>Area Code</th>
						<th>Area Name</th>
						<th colspan="2" style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($areas) == 0)
					<tr>
						<td colspan="4">No record found!</td>
					</tr>
					@else
					@foreach($areas as $area)
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