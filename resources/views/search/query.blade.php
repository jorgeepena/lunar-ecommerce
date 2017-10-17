@extends('layouts.front.default')

@section('content')

<div class="container">
	<h6 class="mt-5 text-uppercase">Search</h6>

	@if(Request::input('query') == NULL)
	@else
		<h2 class="description">Items that contain: "{{ Request::input('query') }}"</h2>
	@endif

	@if(Request::input('query') == NULL)
			
	@else
	<div class="alert alert-dismissible alert-info">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	   We've found a total of: <strong>{{ $products->count() }}</strong> result(s).
	</div>
	@endif


	@if(Request::input('query') == NULL)
		<div class="col">
			<h3 class="text-center"><i class="ionicons ion-sad-outline"></i> There are no results.</h3>
		</div>
	@else

		<div class="col-md-6">
			<h5 class="text-uppercase"><small><i class="ionicons ion-images"></i> Products</small> <span class="badge badge-primary">{{ $products->count() }}</span></h5>
			<hr>

			<ul class="list-unstyled">
				@foreach($products as $product)
					<li><a class="card p-3" href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a></li>
		    	@endforeach
			</ul>
		</div>
	@endif
</div>


@endsection
