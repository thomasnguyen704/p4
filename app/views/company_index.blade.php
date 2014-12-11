@extends('_master')

@section('title')
	Companies
@stop

@section('content')

	<button type="button" class="btn btn-default btn-xs">
			<a href='/company/create'> Add Company </a></li>
	</button>
		
	<br><br>
	
	@if($query)
		<p> You searched for <b>{{{ $query }}}</b> </p>
	@endif

	@if(sizeof($companies) == 0)

		No results
	
	@else

		<form role="form">
			<div class="form-group">
				{{ Form::open(array('url' => '/company', 'method' => 'GET')) }}
					{{ Form::text('query', 'Search name'); }}
					{{ Form::submit('Search'); }}
				{{ Form::close() }}
			</div>
		</form>

		<br>		
		
		<table class="table table-hover">
			<tr>
				<th> Name </th>
				<th> Phone </th>
				<th> State </th>
				<th> Zip </th>
				<th> Edit </th>
			</tr>
		
		@foreach($companies as $company)
			<tr>
				<td> {{ $company['name'] }} </td>
				<td> {{ $company['phone'] }} </td>
				<td> {{ $company['state'] }} </td>
				<td> {{ $company['zip'] }} </td>
				<td> <a href='/company/edit/{{$company['id']}}'>Edit</a> </td>
			</tr>	
		@endforeach
		
		</table>
	
	@endif
@stop