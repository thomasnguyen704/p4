@extends('_master')


@section('title')
	Edit
@stop


@section('head')
@stop


@section('content')
	
	@foreach($errors->all() as $message) 
		<div class='error'>{{ $message }}</div>
	@endforeach

	<h2>{{{ $product['item'] }}}</h2>

	<div class="form-horizontal" role="form">

	<!-- EDIT -->
	{{ Form::open(array('url' => '/product/edit')) }}

		{{ Form::hidden('id',$product['id']); }}
		
		<div class="form-group">
			{{ Form::label('item','Item',
				array(
					'class' => 'col-lg-1 col-md-1 col-sm-2 col-xs-2 control-label'
				)
			) }}
			<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
				{{ Form::text('item',$product['item'],
					array(
						'class' => 'form-control'
					)
				) }}
			</div>
		</div>




		<div class='form-group'>
			{{ Form::label('company_id', 'Company',
				array(
					'class' => 'col-lg-1 col-md-1 col-sm-2 col-xs-2 control-label'
				)
			) }}
			<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
				{{ Form::select('company_id', $companies, $product->company_id,
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
				{{ Form::input('date', 'purchase_date', $product['purchase_date'], array(
					'class'=>'form-control', 
				)) }}
			</div>
		</div>
		



		<div class="form-group">
			{{ Form::label('cost','Cost',
				array(
					'class' => 'col-lg-1 col-md-1 col-sm-2 col-xs-2 control-label'
				)
			) }}
			<div class="col-lg-11 col-md-11 col-sm-10 col-xs-10">
				{{ Form::text('cost',$product['cost'],
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
				{{ Form::text('units',$product['units'],
					array(
						'class' => 'form-control'
					)
				) }}
			</div>
		</div>
		



		{{ Form::submit('Save',
			array(
				'class' => 'pull-right btn btn-default'
			)
		) }}

	{{ Form::close() }}

	<br><br><br>

	<!-- Delete -->
	{{ Form::open( array(
		'url' => '/product/delete'
	)) }}

	{{ Form::hidden('id',$product['id']); }}
		<button class="pull-right btn btn-danger" onClick="parentNode.submit();return false;"> 
			Delete 
		</button>
	{{ Form::close() }}

	</div>

@stop




