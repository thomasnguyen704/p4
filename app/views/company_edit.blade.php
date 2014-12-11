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

	<h2>{{{ $company['name'] }}}</h2>



	{{----- # EDIT -----}}
	{{ Form::open(array('url' => '/company/edit')) }}

		{{ Form::hidden('id',$company['id']); }}
		
		<div class="form-group">
			{{ Form::label('name','Name') }} <br>
			{{ Form::text('name',$company['name']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('phone', 'Phone (No dashes or parentheses)') }} <br>
			{{ Form::text('phone',$company['phone']); }}
		</div>
		
		<div class="form-group">
			{{ Form::label('street','Street') }} <br>
			{{ Form::text('street',$company['street']); }}
		</div>
		
		<div class="form-group">
			{{ Form::label('city','City') }} <br>
			{{ Form::text('city',$company['city']); }}
		</div>
		
		<div class="form-group">
			{{ Form::label('state','State') }} <br>
			{{ Form::text('state',$company['state']); }}
		</div>

		<div class="form-group">
			{{ Form::label('zip','Zip') }} <br>
			{{ Form::text('zip',$company['zip']); }}
		</div>
		
		{{ Form::submit('Save'); }}

	{{ Form::close() }}


@stop