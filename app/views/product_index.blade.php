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
		<div class="form-inline pull-right" role="form">
			<div class="form-group">
				{{ Form::open(array('url' => '/product', 'method' => 'GET')) }}
					{{ Form::text('query','',
						array(
							'placeholder' => 'Search product item',
							'class' => 'form-control'
						)
					) }}
				{{ Form::close() }}
			</div>
		</div>
		
		<br>
		
		<button type="button" class="btn btn-default btn-xs">
			<a href='/product/create'> Add Product </a></li>
		</button>

		<table id="myTable" class="table table-hover tablesorter">
			<thead>	
				<tr>
					<th> Prucahse Date </th>
					<th> Item </th>
					<th> Company </th>
					<th> Cost </th>
					<th> Units </th>
					<th> Edit </th>
				</tr>
			</thead>

			<tbody>
				@foreach($products as $product)
				<tr>
					<td> {{ $product['purchase_date'] }} </td>		
					<td> {{ $product['item'] }} </td>
					<td> {{ $product['company']['name'] }} </td>
					<td> {{ $product['cost'] }} </td>
					<td> {{ $product['units'] }} </td>
					<td> <a href='/product/edit/{{$product['id']}}'>Edit</a> </td>
				</tr>
				@endforeach
			</tbody>

		</table>


	
	@endif
@stop