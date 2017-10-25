@extends('layouts.back.default')

@section('content')

<div class="section-title pt-3 pb-3">
	<div class="row align-items-center">
			<div class="col">
			<h6 class="section text-uppercase">Search</h6>
			@if(Request::input('query') == NULL)
			@else
				<h2 class="description">Items that contain: "{{ Request::input('query') }}"</h2>
			@endif
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

<div class="row">
	<div class="col mb-3">
		@if(Request::input('query') == NULL)
		
		@else
		<div class="alert alert-dismissible alert-info">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		   A total of <strong>{{ $products->count() + $clients->count() }}</strong> result(s) found.
		</div>
		@endif
	</div>
</div>

<div class="row">
	@if(Request::input('query') == NULL)
		<div class="col">
			<h3 class="text-center"><i class="ionicons ion-sad-outline"></i> No results found.</h3>
		</div>
	@else

	<div class="col-md-6">
		<h5 class="text-uppercase"><small><i class="ionicons ion-images"></i> Clients</small> <span class="badge badge-default">{{ $clients->count() }}</span></h5>
		<hr>

		<ul class="list-unstyled">
			@foreach($clients as $client)
				<li><a class="card p-3" href="{{ route('client.show', $client->id) }}">{{ $client->name }}</a></li>
	    	@endforeach
		</ul>
	</div>

	<div class="col-md-6">
		<h5 class="text-uppercase"><small><i class="ionicons ion-images"></i> Products</small> <span class="badge badge-default">{{ $products->count() }}</span></h5>
		<hr>

		<ul class="list-unstyled">
			@foreach($products as $product)
				<li><a class="card p-3" href="#">{{ $product->name }} <span class="badge badge-primary">{{ $product->price }}</span></a></li>
	    	@endforeach
		</ul>
	</div>

	@endif
</div>
@endsection
