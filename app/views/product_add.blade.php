@extends('_master')


@section('title')
	Add a new product	
@stop


@section('content')

	@foreach($errors->all() as $message) 
		<div class="alert alert-danger" role="alert">{{ $message }}</div>
	@endforeach <br>

	{{ Form::open(array('url' => '/product/create')) }}

		{{ Form::label('item','Item') }} <br>
		{{ Form::text('item'); }} <br><br>

		{{ Form::label('company_id', 'Company') }} <br>
		{{ Form::select('company_id', $companies); }} <br><br>

		{{ Form::label('purchase_date','Purchase Date (YYYY-MM-DD)') }} <br>
		{{ Form::text('purchase_date'); }} <br><br>

		{{ Form::label('cost','Cost') }} <br>
		{{ Form::text('cost'); }} <br><br>

		{{ Form::label('units','Units') }} <br>
		{{ Form::text('units'); }} <br><br>

		{{ Form::submit('Add'); }}

	{{ Form::close() }}

@stop