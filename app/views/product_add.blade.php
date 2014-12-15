@extends('_master')


@section('title')
	Add a New Product
@stop


@section('content')

@foreach($errors->all() as $message) 
	<div class="alert alert-danger" role="alert"> {{ $message }} </div>
@endforeach 

<br>

<div class="form-horizontal" role="form">

	{{ Form::open(array('url' => '/product/create')) }}
	
		<div class="form-group">
			{{ Form::label('item','Item',
				array(
					'class' => 'col-lg-1 col-md-1 col-sm-2 col-xs-2 control-label'
				)
			) }}
			<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
				{{ Form::input('text', 'item', '', 
					array(
						'class' => 'form-control'
					)
				) }}
			</div>
		</div>




		<div class="form-group">
			{{ Form::label('company_id', 'Company',
				array(
					'class' => 'col-lg-1 col-md-1 col-sm-2 col-xs-2 control-label'
				)
			) }}
			<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
				{{ Form::select('company_id', 
					array(
						'Companies' => $companies
					),

					null,

					array(
						'class' => 'form-control'
					)
				) }}
			</div>
		</div>




		<div class="form-group">
			{{ Form::label('purchase_date','Purchase Date',
				array(
					'class' => 'col-lg-1 col-md-1 col-sm-2 col-xs-2 control-label'
				)
			) }}
			<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
				{{ Form::input('date', 'purchase_date', 'null', 
					array(
						'class' => 'form-control'
					)
				) }}
			</div>
		</div>




		<div class="form-group">
			{{ Form::label('cost','Cost',
				array(
					'class' => 'col-lg-1 col-md-1 col-sm-2 col-xs-2 control-label'
				)
			) }}
			<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
				{{ Form::input('number', 'cost', 'null', 
					array(
						'class' => 'form-control'
					)
				) }}
			</div>
		</div>




		<div class="form-group">
			{{ Form::label('units','Units',
				array(
					'class' => 'col-lg-1 col-md-1 col-sm-2 col-xs-2 control-label'
				)
			) }}
			<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
				{{ Form::input('number', 'units', 'null',
					array(
						'class' => 'form-control'
					)
				) }}
			</div>
		</div>




		{{ Form::submit('Add', 
			array(
				'class' => 'pull-right btn btn-default'
			)
		) }}


	{{ Form::close() }}

</div>
@stop

