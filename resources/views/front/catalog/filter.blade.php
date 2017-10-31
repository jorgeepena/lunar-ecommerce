@extends('layouts.front.default')

@section('content')

<div class="container my-5">

	<div class="row">
		<div class="col-md-3 mt-2">
			@include('front.catalog.partials.filter-menu')
		</div>
		<div class="col-md-9">
			<div class="row align-items-center">
				<div class="col">
					<h6 class="text-uppercase mb-0"><small>Products in: {{ $category->name }}</small></h6>
				</div>
				<div class="col text-right">
					<span class="badge badge-primary mb-0">{{ $category->product()->count() }} Products</span>
				</div>
			</div>
			<hr>
			
			@if($category->product->count())
			@foreach($category->product->chunk(3) as $productGroup)
		    <div class="card-group">
		        @foreach($productGroup as $product)

		        <div class="card">
		            <img class="card-img-top" src="{{ asset('img/products/' . $product->image ) }}" alt="{{ $product->name }}">
		            <div class="card-body">
		                <h4 class="card-title">{{ $product->name }}</h4>
		                <p class="card-text">$ {{ $product->price }}</p>

		                <p><a href="{{ route('add-cart', ['id' => $product->id]) }}" class="btn btn-primary" role="button"><i class="fa fa-cart-plus"></i> Add to Cart</a> 

		                <a href="{{ route('product.detail', $product->slug) }}" class="btn btn-success" role="button"><i class="fa fa-plus-circle"></i> View Detail</a></p>
		            </div>
		        </div>
		        @endforeach
		    </div>
		    @endforeach
		    @else
	       	<div class="text-center my-5">
	       		<h4 class="mb-0">No products in this category.</h4>
	       		<p>Try another one on the filter to the left.</p>
	       	</div>
	       	@endif
		</div>
	</div>
</div>
@endsection
