@extends('_master')

@section('title')
	Product Search
@stop

@section('content')
	{{ Form::open(array('url' => '/product', 'method' => 'GET')) }}
		{{ Form::text('query'); }}
		{{ Form::submit('Search'); }}
	{{ Form::close() }}
@stop