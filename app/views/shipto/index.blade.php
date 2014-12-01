@extends('layouts.layout')

@section('content')

<div class="page-header" id="banner">
	<div class="row">
	  	<div class="col-lg-8 col-md-7 col-sm-6">
			<h1>Sold To Customer</h1>
	  	</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div >
			<a href="{{ URL::route('soldto.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> soldto</a>
		</div>
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Area Name</th>
						<th>Sold To Code</th>
						<th>Customer Code</th>
						<th>Customer Name</th>
						<th colspan="2" style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($soldtos) == 0)
					<tr>
						<td colspan="4">No record found!</td>
					</tr>
					@else
					@foreach($soldtos as $soldto)
					<tr>
						<td>{{ $soldto->area }}</td>
						<td>{{ $soldto->soldto_code }}</td>
						<td>{{ $soldto->customer_code }}</td>
						<td>{{ $soldto->customer_name }}</td>
						<td class="action">
							{{ HTML::linkRoute('soldto.edit','Edit', $soldto->id, array('class' => 'btn btn-info btn-xs')) }}
						</td>
						<td class="action">
							{{ Form::open(array('method' => 'DELETE', 'route' => array('soldto.destroy', $soldto->id))) }}                       
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