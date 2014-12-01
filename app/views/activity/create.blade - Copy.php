@extends('layouts.layout')

@section('content')

<div class="page-header" id="banner">
	<div class="row">
		<div class="col-lg-8 col-md-7 col-sm-6">
			<h1>New Activity</h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<ul class="nav nav-tabs">
		  	<li class="active"><a aria-expanded="true" href="#header" data-toggle="tab">Activity Header</a></li>
		  	<li class=""><a aria-expanded="false" href="#details" data-toggle="tab">Activity Details</a></li>
		  	<li class=""><a aria-expanded="false" href="#budget" data-toggle="tab">Activity Budget</a></li>
		  	<li class=""><a aria-expanded="false" href="#customer" data-toggle="tab">Customer Details</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
		  	<div class="tab-pane fade active in" id="header">
		  		<div class="tab-form">
		  			<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('activity', 'Activiy Title', array('class' => 'control-label')) }}
										{{ Form::text('activity','',array('class' => 'form-control', 'placeholder' => 'Activiy Title')) }}
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('scope', 'Scope Type', array('class' => 'control-label')) }}
										{{ Form::select('scope', $scopes, null, array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
						</div>
					</div>
			  		
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('activity_type', 'Activity Type', array('class' => 'control-label')) }}
										{{ Form::select('activity_type', $activity_types, null, array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('scope', 'TOP Cycle', array('class' => 'control-label')) }}
										{{ Form::select('cycles', $cycles, null, array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('division', 'Division', array('class' => 'control-label')) }}
										{{ Form::select('division', $divisions, null, array('class' => 'form-control')) }}
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<div class="row">
									<div id="multiselect" class="col-lg-12">
										{{ Form::label('category', 'Category', array('class' => 'control-label')) }}
										<select class="form-control" data-placeholder="SELECT CATEGORY" id="category" name="category" multiple="multiple" ></select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('brand', 'Brand', array('class' => 'control-label')) }}
										<select class="form-control" data-placeholder="SELECT BRAND" id="brand" name="brand" multiple="multiple" ></select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('circular_name', 'Circular Name', array('class' => 'control-label')) }}
										{{ Form::text('circular_name','',array('class' => 'form-control', 'placeholder' => 'Circular No.')) }}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		  	<div class="tab-pane fade" id="details">
				<div class="tab-form">
		  			<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('objective', 'Objectives', array('class' => 'control-label' )) }}
										{{ Form::select('objective', $objectives, null, array('class' => 'form-control', 'multiple' => 'multiple')) }}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-form">
		  			<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('background', 'Background and Rationale', array('class' => 'control-label')) }}
										{{ Form::textarea('background','',array('class' => 'form-control', 'placeholder' => 'Background and Rationale')) }}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		 	</div>

		  	<div class="tab-pane fade" id="budget">
		  		<div class="tab-form">
		  			<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('budget_tts', 'Budget I/O TTS', array('class' => 'control-label')) }}
										{{ Form::text('budget_tts','',array('class' => 'form-control', 'placeholder' => 'Budget I/O TTS')) }}
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('budget_pe', 'Budget I/O PE', array('class' => 'control-label')) }}
										{{ Form::text('budget_pe','',array('class' => 'form-control', 'placeholder' => 'Budget I/O PE')) }}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		  	<div class="tab-pane fade" id="customer">
		  		<div class="tab-form">
		  			<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('objective', 'Group', array('class' => 'control-label' )) }}
										{{ Form::select('objective', $objectives, null, array('class' => 'form-control', 'multiple' => 'multiple')) }}
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('objective', 'Channels Involved', array('class' => 'control-label' )) }}
										{{ Form::select('objective', $objectives, null, array('class' => 'form-control', 'multiple' => 'multiple')) }}
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('objective', 'Customer Involved', array('class' => 'control-label' )) }}
										{{ Form::select('objective', $objectives, null, array('class' => 'form-control', 'multiple' => 'multiple')) }}
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('objective', 'Outlet Involved', array('class' => 'control-label' )) }}
										{{ Form::select('objective', $objectives, null, array('class' => 'form-control', 'multiple' => 'multiple')) }}
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<div class="row">
									<div class="col-lg-12">
										{{ Form::label('objective', 'SKU/s Involved', array('class' => 'control-label' )) }}
										{{ Form::select('objective', $objectives, null, array('class' => 'form-control', 'multiple' => 'multiple')) }}
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
@stop

@section('page-script')

$('select#division').on("change",function(){
   	$.ajax({
		   type: "POST",
		   data: {q: $(this).val()},
		   url: "../api/category",
		   success: function(data){
		    $('select#category').empty();
		   	$.each(data, function(i, text) {
		   		$('<option />', {value: i, text: text}).appendTo($('select#category')); 
		   	});
		   	$('select#category').multiselect('rebuild');
		   }
		});
});


$('select#category').multiselect({
	maxHeight: 200,
	includeSelectAllOption: true,
	enableFiltering: true,
	onDropdownHide: function(event) {
		$.ajax({
		   type: "POST",
		   data: {categories: GetSelectValues($('select#category'))},
		   url: "../api/brand",
		   success: function(data){
		    $('select#brand').empty();
		   	$.each(data, function(i, text) {
		   		$('<option />', {value: i, text: text}).appendTo($('select#brand')); 
		   	});
		   	$('select#brand').multiselect('rebuild');
		   }
		});
	}
});

$('select#brand').multiselect({
	maxHeight: 200,
	includeSelectAllOption: true,
	enableFiltering: true
});

$('select#objective').multiselect({
	maxHeight: 200,
	includeSelectAllOption: true,
	enableFiltering: true
});



@stop


	