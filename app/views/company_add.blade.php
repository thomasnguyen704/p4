@extends('_master')


@section('title')
	Add a new company	
@stop


@section('content')

	@foreach($errors->all() as $message) 
		<div class="alert alert-danger" role="alert">{{ $message }}</div>
	@endforeach <br>

	{{ Form::open(array('url' => '/company/create')) }}

		<div class="form-group">
			{{ Form::label('name','Name') }} <br>
			{{ Form::text('name'); }}
		</div>

		<div class='form-group'>
			{{ Form::label('phone', 'Phone (No dashes or parentheses)') }} <br>
			{{ Form::text('phone'); }}
		</div>
		
		<div class="form-group">
			{{ Form::label('street','Street') }} <br>
			{{ Form::text('street'); }}
		</div>
		
		<div class="form-group">
			{{ Form::label('city','City') }} <br>
			{{ Form::text('city'); }}
		</div>
		
		<div class="form-group">
			{{ Form::label('state','State') }} <br>
			{{ Form::text('state'); }}
		</div>

		<div class="form-group">
			{{ Form::label('zip','Zip') }} <br>
			{{ Form::text('zip'); }}
		</div>

		{{ Form::submit('Add'); }}

	{{ Form::close() }}

@stop