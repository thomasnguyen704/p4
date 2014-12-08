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



	{{----- # EDIT -----}}
	{{ Form::open(array('url' => '/product/edit')) }}

		{{ Form::hidden('id',$product['id']); }}
		
		<div class="form-group">
			{{ Form::label('item','Item') }} <br>
			{{ Form::text('item',$product['item']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('company_id', 'Company') }} <br>
			{{ Form::select('company_id', $companies, $product->company_id); }}
		</div>
		
		<div class="form-group">
			{{ Form::label('purchase_date','Purchase Date (YYYY-MM-DD)') }} <br>
			{{ Form::text('purchase_date',$product['purchase_date']); }}
		</div>
		
		<div class="form-group">
			{{ Form::label('cost','Cost') }} <br>
			{{ Form::text('cost',$product['cost']); }}
		</div>
		
		<div class="form-group">
			{{ Form::label('units','Units') }} <br>
			{{ Form::text('units',$product['units']); }}
		</div>
		
		{{ Form::submit('Save'); }}

	{{ Form::close() }}


	<br>


	{{----- # DELETE -----}}
	{{ Form::open(array('url' => '/product/delete')) }}
		{{ Form::hidden('id',$product['id']); }}
		<button onClick='parentNode.submit();return false;'>Delete</button>
	{{ Form::close() }}

@stop