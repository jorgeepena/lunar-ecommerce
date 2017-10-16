@extends('layouts.front.default')

@section('content')

<div class="profile my-5">
	<div class="container">
	    <div class="row">
			<!-- PROFILE PICTURE AND MENU -->
		    @include('user-profile.partials.menu')

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
