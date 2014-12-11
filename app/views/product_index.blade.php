@extends('_master')

@section('title')
	Products
@stop

@section('content')

	@if($query)
		<p> You searched for <b>{{{ $query }}}</b> </p>
	@endif

	@if(sizeof($products) == 0)
		
		<button type="button" class="btn btn-default btn-xs">
			<a href='/product/create'> Add Product </a></li>
		</button>

		<br><br>

		No results
	
	@else
		<form role="form">
			<div class="form-group">
				{{ Form::open(array('url' => '/product', 'method' => 'GET')) }}
					{{ Form::text('query', 'Search item'); }}
					{{ Form::submit('Search'); }}
				{{ Form::close() }}
			</div>
		</form>
		
		<br>


		<table class="table table-hover">
			<tr>
				<th> Item </th>
				<th> Company </th>
				<th> Prucahse Date </th>
				<th> Cost </th>
				<th> Units </th>
				<th> Edit </th>
			</tr>
		
		@foreach($products as $product)
			<tr>
				<td> {{ $product['item'] }} </td>
				<td> {{ $product['company']['name'] }} </td>
				<td> {{ $product['purchase_date'] }} </td>
				<td> {{ $product['cost'] }} </td>
				<td> {{ $product['units'] }} </td>
				<td> <a href='/product/edit/{{$product['id']}}'>Edit</a> </td>
			</tr>	
		@endforeach
		
		</table>
	
	@endif
@stop