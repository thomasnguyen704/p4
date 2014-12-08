@extends('_master')

@section('title')
	Log in
@stop

@section('content')


{{ Form::open(array('url' => '/login')) }}

    <div class="form-group">
	    {{ Form::label('email') }} <br>
	    {{ Form::text('email') }}
    </div>

	<div class="form-group">
	    {{ Form::label('password') }} <br>
	    {{ Form::password('password') }}
	</div>
        
    {{ Form::submit('Submit') }}

{{ Form::close() }}

@stop