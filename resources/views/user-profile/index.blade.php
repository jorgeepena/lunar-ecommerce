@extends('layouts.front.default')

@section('content')

<div class="profile my-5">
	<div class="container">
	    <div class="row">
	    	<!-- PROFILE PICTURE AND MENU -->
		    <section class="col-md-4">
		    	<div class="card p-4">
		    		<!-- Image -->
		    		<div class="profile-image">
		    			@if( Auth::user()->imagen == NULL)
							<img class="card-img-top" src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim( Auth::user()->email))) . '?d=retro&s=300' }}" alt="{{ Auth::user()->name }}" style="width: 100%;">
						@else
							<img class="card-img-top" src="{{ asset('img/usuarios/' . Auth::user()->imagen ) }}" alt="{{ $usuario->name }}">
						@endif

		    		</div>

		    		<div class="profile-info">
		    			<h3>{{ Auth::user()->name }}</h3>
		    			<h5>{{ Auth::user()->email }}</h5>
		    			<h5>INFO</h5>
		    		</div>
		    	</div>

		    	<div class="profile-nav p-4">

		    		<h5>M E N U</h5>
		    		<ul class="list-unstyled">
		    			<li><a href="#">Overview</a></li>
		    			<li><a href="#">Edit Account</a></li>
		    			<li><a href="#">Upload Image</a></li>
		    			<li><a href="#">My Orders</a></li>
		    			<li><a href="#">Adressess</a></li>
		    			<li><a href="#">My Wishlist</a></li>
		    			<hr>
		    			<li><a href="#">Change Password</a></li>
		    			<li><a href="#">Logout</a></li>
		    		</ul>
		    	</div>
		    </section>


		    <!-- PROFILE INFORMATION -->
		    <section class="col-md-8">
		       <h3>Order Summary</h3>
		       <hr>

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
		    </section>
	    </div>
	</div>
</div>
@endsection
