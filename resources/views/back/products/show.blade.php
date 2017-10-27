@extends('layouts.back.default')

@section('content')

<div class="section-title pt-3 pb-3">
	<div class="row align-items-center">
			<div class="col">
			<h6 class="section text-uppercase">Products</h6>
			<h2 class="description">Product Detail Information</h2>
		</div>
		<div class="col">
			<div class="text-right">
		        <h5 id="clock"></h5>
	    		<h6 id="date"></h6> 
			</div>
		</div>
	</div>
	<hr>
</div>



<div class="row mb-3">
	<div class="col-md-4">
		<p class="badge badge-primary">Product ID: {{ $product->id }}</p>
		<img class="img-fluid" src="{{ asset('img/products/' . $product->image ) }}">

		@if($product->category_id == NULL)

		@else
		<p class="text-uppercase my-3"><small>Belongs to category: <strong>{{ $product->category->name }}</strong></small></p>
		@endif

	</div>
	<div class="col-md-8">
		

		<h3>{{ $product->name }}</h3>
		<h6 class="text-uppercase"><small>{{ $product->sku }}</small></h6>

		{!! $product->description !!}

		<h2>$ {{ $product->price }}</h2>

		<h6 class="text-uppercase mt-4"><small>Inventory Information</small></h6>
		<hr>
		<ul class="list-group">
			<li class="list-group-item">Stock: {{ $product->stock }}</li>
		</ul>
	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
</script>
@endsection