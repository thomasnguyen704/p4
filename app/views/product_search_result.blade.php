<section>
	<h2> {{ $product['item'] }} </h2>
	<p> {{ $product['company']->name }} {{ $product['purchase_date'] }} </p>
	<a href='/product/edit/{{ $product->id }}'> Edit </a>
</section>