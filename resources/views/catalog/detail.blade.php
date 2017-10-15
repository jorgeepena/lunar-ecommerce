@extends('layouts.front.default')

@section('content')

<div class="container mt-5">
	<div class="row">
		<div class="col-md-6">
			<img class="img-fluid" src="{{ $product->image }}">
		</div>

		<div class="col-md-6">
			<h3>{{ $product->name }}</h3>
			<h6>{{ $product->sku }}</h6>
			<hr>
			<p>{{ $product->description }}</p>

			<h3><strong>$ {{ $product->price }}</strong></h3>


			<p><small class="mb-3"><em>We have <strong>{{ $product->stock }}</strong> in stock.</em></small></p>

			<p><a href="{{ route('add-cart', ['id' => $product->id]) }}" class="btn btn-primary btn-big btn-block" role="button"><i class="fa fa-cart-plus"></i> Add to Cart</a> 


			<hr>
			<h6 class="text-uppercase">Product Details</h6>
			 <dl class="dl-horizontal">
			  <dt>Size</dt>
			  <dd>{{ $product->depth }} depth</dd>
			  <dd>{{ $product->height }} height</dd>
			  <dd>{{ $product->lenght }} lenght</dd>
			</dl> 

			<dl class="dl-horizontal">
			  <dt>Weight</dt>
			  <dd>{{ $product->weight }} kg</dd>
			</dl> 
		</div>
	</div>
</div>

@endsection
