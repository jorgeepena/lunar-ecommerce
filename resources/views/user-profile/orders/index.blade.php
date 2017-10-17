@extends('layouts.front.default')

@section('content')

<div class="profile my-5">
	<div class="container">
	    <div class="row">
			<!-- PROFILE MENU -->
		    @include('user-profile.partials.menu')

		    <!-- PROFILE INFORMATION -->
		    <section class="col-md-7">
		       	<h3>Order Summary</h3>
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
		       	@endforeach
		       	@else
		       	<div class="text-center my-5">
		       		<h4 class="mb-0">You don't have recent purchases.</h4>
		       		<p>Visit the store <a href="{{ route('great-detail') }}">here</a> and enjoy.</p>
		       	</div>
		       	@endif

		       
		    </section>

		    <!-- PROFILE INFO -->
		    @include('user-profile.partials.profile-card')
	    </div>
	</div>
</div>
@endsection
