@extends('layouts.back.default')

@section('content')

<div class="section-title pt-3 pb-3">
	<div class="row align-items-center">
			<div class="col">
			<h6 class="section text-uppercase">Clients</h6>
			<h2 class="description">Client Information</h2>
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
		<div class="special-title">
			<h6 class="text-uppercase"><small>Currently Watching</small></h6>
			<div class="line"></div>
		</div>

		@if( $client->image == NULL)
			<img class="img-fluid" src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim( $client->email))) . '?d=retro&s=300' }}" alt="{{ $client->name }}" style="width: 100%;">
		@else
			<img class="img-fluid" src="{{ asset('img/users/' . $client->image ) }}" alt="{{ $client->name }}">
		@endif

		<h2 class="mt-3">{{ $client->name }}</h2>
		<p><a href="malito:{{ $client->email }}">{{ $client->email }}</a></p>

	</div>
	<div class="col-md-8">
		<!-- STATS -->
		<div class="row">
			<div class="col-md-12">
				<div class="special-title">
					<h6 class="text-uppercase"><small>Quick Stats</small></h6>
					<div class="line"></div>
				</div>
			</div>

			<div class="col col-md-4">
				<div class="card text-white card-primary mb-3">
					<div class="card-body p-3">
						<h6 class="card-title text-uppercase"><small>Items in Wishlist</small></h6>
						<h2 class="card-text">{{ $wishlist->count() }}</h2>
					</div>
				</div>
				<div class="dropdown">
                    <a href="#" id="dd-group1" class="dropdown-toggle text-uppercase" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><small>See Items in Wishlist</small></a>

                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-group1">
                    	@foreach($wishlist as $ws)
                    	<li class="dropdown-item">{{ $ws->product->name }}</li>
                    	@endforeach
                    </ul>
                </div>
			</div>
			<div class="col col-md-4">
				<div class="card text-white card-warning mb-3">
					<div class="card-body p-3">
						<h6 class="card-title text-uppercase"><small>Forgotten Carts</small></h6>
						<h2 class="card-text">[ NUM ]</h2>
					</div>
				</div>
			</div>
			<div class="col col-md-4">
				<div class="card text-white card-info mb-3">
					<div class="card-body p-3">
						<h6 class="card-title text-uppercase"><small>Total Orders</small></h6>
						<h2 class="card-text">{{ $client->orders->count() }}</h2>
					</div>
				</div>
			</div>
		</div>

		<!-- ORDER HISTORY -->
		<div class="row">
			<div class="col-md-12">
				<div class="special-title mt-2">
					<h6 class="text-uppercase"><small>Orders</small></h6>
					<div class="line"></div>
				</div>
			</div>

			<div class="col-md-12">
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
		       		<h4 class="mb-0">{{ $client->name }} doesn´t have recent purchases.</h4>
		       		<p>Visit this client in the future to see if he have bought anaything!</p>
		       	</div>
		       	@endif
			</div>
		</div>
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