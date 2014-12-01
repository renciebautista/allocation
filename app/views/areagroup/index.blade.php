@extends('layouts.layout')

@section('content')

<div class="page-header" id="banner">
	<div class="row">
	  	<div class="col-lg-8 col-md-7 col-sm-6">
			<h1>Area Group</h1>
	  	</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div >
			<a href="{{ URL::route('areagroup.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Area Group</a>
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
						<th colspan="2" style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($areagroups) == 0)
					<tr>
						<td colspan="3">No record found!</td>
					</tr>
					@else
					@foreach($areagroups as $areagroup)
					<tr>
						<td>{{ $areagroup->area_group }}</td>
						<td class="action">
							{{ HTML::linkRoute('areagroup.edit','Edit', $areagroup->id, array('class' => 'btn btn-info btn-xs')) }}
						</td>
						<td class="action">
							{{ Form::open(array('method' => 'DELETE', 'route' => array('areagroup.destroy', $areagroup->id))) }}                       
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