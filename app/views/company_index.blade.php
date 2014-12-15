@extends('_master')

@section('title')
	Companies
@stop

@section('content')

	@if($query)
		<p> You searched for <b>{{{ $query }}}</b> </p>
	@endif

	@if(sizeof($companies) == 0)
	<button type="button" class="btn btn-default btn-xs">
			<a href='/company/create'> Add Company </a></li>
	</button>
		
	<br><br>

	No results
	
	@else
		<div class="form-inline pull-right" role="form">
			<div class="form-group">
				{{ Form::open(array('url' => '/company', 'method' => 'GET')) }}
					{{ Form::text('query', '',
						array(
							'placeholder' => 'Search company name',
							'class' => 'form-control'
						)
					) }}
				{{ Form::close() }}
			</div>
		</div>

		<br>

		<button type="button" class="btn btn-default btn-xs">
			<a href='/company/create'> Add Company </a></li>
		</button>
				
		<table id="myTable" class="table table-hover tablesorter">
			<thead>	
				<tr>
					<th> Name </th>
					<th> Street </th>
					<th> City </th>
					<th> State </th>
					<th> Zip </th>
					<th> Phone </th>
					<th> Edit </th>
				</tr>
			</thead>

		<tbody>
			@foreach($companies as $company)
				<tr>
					<td> {{ $company['name'] }} </td>
					<td> {{ $company['street'] }} </td>
					<td> {{ $company['city'] }} </td>
					<td> {{ $company['state'] }} </td>
					<td> {{ $company['zip'] }} </td>
					<td> {{ $company['phone'] }} </td>
					<td> <a href='/company/edit/{{$company['id']}}'>Edit</a> </td>
				</tr>	
			@endforeach
		</tbody>
		
		</table>
	
	@endif
@stop