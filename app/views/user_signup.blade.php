@extends('_master')

@section('title')
	Sign Up
@stop

@section('content')

@foreach($errors->all() as $message)
	<div class="error alert alert-danger" role="alert">
		{{ $message }}
	</div>
@endforeach


{{ Form::open(array('url' => '/signup')) }}

<div class="form-group">
    {{ Form::label('email') }} <br>
    {{ Form::text('email') }}
</div>

<div class="form-group">
    {{ Form::label('password') }} <br>
    {{ Form::password('password') }}
    <p class="text-muted">Min 6 characters</p>
</div>
    
    {{ Form::submit('Submit') }}

{{ Form::close() }}
@stop