@extends('layouts.front.default')

@section('content')

<div class="profile my-5">
	<div class="container">
	    <div class="row">
			<!-- PROFILE MENU -->
		    @include('front.user-profile.partials.menu')

		    <!-- PROFILE INFORMATION -->
		    <section class="col-md-7">

		    	<h3>Personal Stats</h3>
		       	<hr>

		       	<div class="row">
		       		<div class="col-md-4">
		       			<div class="card text-white bg-info mb-3">
							<div class="card-body p-3">
								<h6 class="card-title text-uppercase"><small>On your Wishlist</small></h6>
								<h2 class="card-text">{{ $wishlist->count() }}</h2>
							</div>
						</div>
			       	</div>
			       	<div class="col-md-4">
			       		<div class="card text-white bg-warning mb-3">
							<div class="card-body p-3">
								<h6 class="card-title text-uppercase"><small>Total Orders</small></h6>
								<h2 class="card-text">{{ $orders->count() }}</h2>
							</div>
						</div>
			       	</div>
			       	<div class="col-md-4">
			       		<div class="card text-white bg-danger mb-3">
							<div class="card-body p-3">
								<h6 class="card-title text-uppercase"><small>Addresses Saved</small></h6>
								<h2 class="card-text">{{ $addresses->count() }}</h2>
							</div>
						</div>
			       	</div>
		       	</div>


		       	<h3 class="mt-3">Order Summary</h3>
		       	<hr>

		       	@if($orders->count())
		       	@foreach($orders as $order)
		       	<div class="card card-default">
		       		<div class="card-body">
		       			<ul class="list-group">
		       				@foreach($order->cart->items as $item)
		       				<li class="list-group-item">
		       					{{ $item['item']['name']}} | {{ $item['qty'] }} Units.

		       					<span class="badge badge-primary float-right">$ {{ $item['price'] }}</span>
		       				</li>
		       				@endforeach
		       				<li class="list-group-item active">
		       					Payment ID: {{ $order->payment_id }}
		       				</li>
		       			</ul>
		       		</div>
		       		<div class="card-footer">
		       			<strong>Total: $ {{ $order->cart->totalPrice }}</strong>
		       			<span class="badge badge-secondary pull-right" style="margin-top: 3px;">Date of Purchase: {{ $order->created_at }}</span>
		       		</div>
		       	</div>

		       	<hr>
		       	
		       	<div class="row">
		       		<div class="col text-center">
		       			<a class="btn btn-secondary mt-3" href="{{ route('profile.orders') }}">See all Orders</a>
		       		</div>
		       	</div>
		       	@endforeach
		       	@else
		       	<div class="text-center my-5">
		       		<h4 class="mb-0">You don't have recent purchases.</h4>
		       		<p>Visit the store <a href="{{ route('great-detail') }}">here</a> and enjoy.</p>
		       	</div>
		       	@endif
		    </section>

		    <!-- PROFILE INFO -->
		    @include('front.user-profile.partials.profile-card')
	    </div>
	</div>
</div>
@endsection
