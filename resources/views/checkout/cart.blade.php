@extends('layouts.front.default')

@section('content')

<div class="container">
	@if(Session::has('cart'))
		<div class="row">
			<div class="col-md-8 ml-auto mr-auto">
				<h2><i class="fa fa-shopping-cart"></i> Shopping Cart</h2>
				<br>
				<ul clas="list-group">
					@foreach($products as $product)
						<li class="list-group-item">
							<span class="badge">{{ $product['qty'] }}</span>
							<strong>{{ $product['item']['name'] }}</strong>
							<span class="label label-success"> $ {{ $product['price'] }}</span>

							<div class="btn-group">
								<button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									Actions <span class="caret"></span>
								</button>

								<ul class="dropdown-menu">
									<li><a href="{{ route( 'cart.substract', [ 'id' => $product['item']['id'] ] ) }}">Substract One</a></li>
									<li><a href="#">Delete Item</a></li>
								</ul>
								
							</div>
						</li>
					@endforeach

					<br>
					<div class="row">
						<div class="col-md-6">
							<h2><strong>Total: ${{ $totalPrice }}</h2></strong>
						</div>
						<div class="col-md-6">
							<br>
							<a  href="{{ route('checkout') }}" class="btn btn-success pull-right">Checkout</a>
						</div>
					</div>
				</ul>
			</div>
		</div>

	@else

		<div class="row">
			<div class="col-md-6 ml-auto mr-auto text-center">
				<h2>You haven't added products <i class="fa fa-frown-o"></i></h2>
				<br>
				<a href="{{ route('great-detail') }}" class="btn btn-lg btn-default">Start filling your cart!</a>
			</div>
		</div>
	@endif
</div>

@endsection
