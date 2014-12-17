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
		
		<br><br>
		
		<button type="button" class="btn btn-default btn-xs">
			<a href='/product/create'> Add Product </a></li>
		</button>

		<table id="myTable" class="table table-hover tablesorter">
			<thead>	
				<tr>
					<th class="small text-center"><span class="small"> Prucahse Date </span></th>
					<th class="small text-center"><span class="small"> Item			</span></th>
					<th class="small text-center"><span class="small"> Company		</span></th>
					<th class="small text-center"><span class="small"> Cost ($)		</span></th>
					<th class="small text-center"><span class="small"> Units (lbs)	</span></th>
					<th class="small text-center"><span class="small"> Edit			</span></th>
				</tr>
			</thead>

			<tbody>
				@foreach($products as $product)
				<tr>
					<td class="text-center"> <span class="small"> {{ $product['purchase_date'] }}	</span></td>	
					<td class="text-center"> <span class="small"> {{ $product['item'] }}			</span></td>
					<td class="text-center"> <span class="small"> {{ $product['company']['name'] }}	</span></td>
					<td class="text-center"> <span class="small"> {{ $product['cost'] }}			</span> </td>
					<td class="text-center"> <span class="small"> {{ $product['units'] }}			</span></td>
					<td class="text-center"> <span class="small"> <a href='/product/edit/{{$product['id']}}'> Edit </a> </span></td>
				</tr>
				@endforeach
			</tbody>

		</table>


	
	@endif
@stop