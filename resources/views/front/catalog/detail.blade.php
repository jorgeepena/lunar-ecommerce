@extends('layouts.front.default')

@section('content')

<div class="container mt-5">
	<div class="row">
		<div class="col-md-6">
			<img class="img-fluid" src="{{ asset('img/products/' . $product->image ) }}" alt="{{ $product->name }}">


			@if($product->image_2 == NULL)
				<div style="height: 100px; margin-right: 10px; display: inline-block;"></div>
			@else
				<div class="col-xs-6 col-md-3">
					<a href="#" class="thumbnail">
						<img class="img-fluid" src="{{ asset('img/products/' . $product->image_2 ) }}" alt="{{ $product->nombre }}">
					</a>
				</div>
			@endif

			@if($product->image_3 == NULL)
				<div style="height: 100px; margin-right: 10px; display: inline-block;"></div>
			@else

			<div class="col-xs-6 col-md-3">
				<a href="#" class="thumbnail">
					<img class="img-fluid" src="{{ asset('img/products/' . $product->image_3 ) }}" alt="{{ $product->nombre }}">
				</a>
			</div>
			@endif

			@if($product->image_4 == NULL)
				<div style="height: 100px; margin-right: 10px; display: inline-block;"></div>
			@else
			<div class="col-xs-6 col-md-3">
				<a href="#" class="thumbnail">
					<img class="img-fluid" src="{{ asset('img/products/' . $product->image_4 ) }}" alt="{{ $product->nombre }}">
				</a>
			</div>
			@endif

		</div>

		<div class="col-md-6">
			<h3>{{ $product->name }}</h3>
			<h6><small>SKU:</small> {{ $product->sku }}</h6>
			<hr>
			<p>{!! $product->description !!}</p>

			<h3><strong>$ {{ $product->price }}</strong></h3>


			<p><small class="mb-3"><em>We have <strong>{{ $product->stock }}</strong> in stock.</em></small></p>

			<div class="row mb-4">
				<div class="col">
					@if(isset(Auth::user()->id) && Auth::user()->isInWishlist($product->id))
						<p><a class="btn btn-block btn-danger" href="{{ route('wishlist.remove', $product->id) }}"><i class="fa fa-heartbeat"></i> Remove from Wishlist</a></p>
					@else
		            	<p><a class="btn btn-block btn-warning" href="{{ route('wishlist.add', $product->id) }}"><i class="fa fa-heart"></i> Add to Wishlist</a></p>
					@endif
				</div>
				<div class="col">
					<p><a href="{{ route('add-cart', ['id' => $product->id]) }}" class="btn btn-primary btn-big btn-block" role="button"><i class="fa fa-cart-plus"></i> Add to Cart</a> 
				</div>
			</div>

			<nav class="nav nav-tabs" id="myTab" role="tablist">
				<a class="nav-item nav-link active text-uppercase" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="true"><small>Product Info</small></a>
				<a class="nav-item nav-link text-uppercase" id="nav-reviews-tab" data-toggle="tab" href="#nav-reviews" role="tab" aria-controls="nav-reviews" aria-selected="false"><small>Reviews</small></a>
			</nav>
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active p-4" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
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
				<div class="tab-pane fade p-4" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
					HERE GOES REVIEWS FUNCTIONALITY
				</div>
			</div>


		</div>
	</div>
</div>

@endsection
