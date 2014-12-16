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

		<br><br>

		<button type="button" class="btn btn-default btn-xs">
			<a href='/company/create'> Add Company </a></li>
		</button>

		<br><br>
		
		<div class="row">
			@foreach($companies as $company)
			<div class="col-sm-6 col-md-4 col-md-3">
				<address class="well">
					<strong> {{ $company['name'] }} </strong><br>
					{{ $company['street'] }} <br>
					{{ $company['city'] }}, {{ $company['state'] }} {{ $company['zip'] }} <br>
					<abbr title="Phone">P:</abbr> {{ $company['phone'] }} <br>
					<a href='/company/edit/{{$company['id']}}'>Edit</a>
				</address>
			</div>
			@endforeach
		</div>	

	@endif
@stop