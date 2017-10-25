@extends('layouts.back.default')

@section('content')

<div class="section-title pt-3 pb-3">
	<div class="row align-items-center">
			<div class="col">
			<h6 class="section text-uppercase">Order Search</h6>
			@if(Request::input('query') == NULL)
			@else
				<h2 class="description">Orders that contain: "{{ Request::input('query') }}"</h2>
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
	<div class="col-md-12 mb-3">
		<form class="form-inline" style="display: block;" role="search" action="{{ route('order.search.query') }}">
	        <div class="input-group">
	          <input type="search" name="query" class="form-control form-control-lg" placeholder="Search by User, Payment ID or Date of Purchase...">
	          <span class="input-group-btn">
	              <button class="btn btn-primary" type="submit"><i class="ionicons ion-android-search"></i></button>
	          </span>
	      </div>
	    </form>
	</div>
	
	<div class="col mb-3">
		@if(Request::input('query') == NULL)
		
		@else
		<div class="alert alert-dismissible alert-info">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		   A total of <strong>{{ $orders->count() }}</strong> result(s) found.
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

	<div class="col-md-12">
		<h5 class="text-uppercase"><small><i class="ionicons ion-images"></i> Orders</small> <span class="badge badge-default">{{ $orders->count() }}</span></h5>
		<hr>

		@foreach($orders as $order)
       	<div class="card card-default mb-4">
       		<div class="card-body p-3">
       			<div class="row">
       				<div class="col-md-4">
       					<h6 class="text-uppercase"><small>User Information</small></h6>
       					<hr>

       					<div class="row">
       						<div class="col">
       							<h6 class="text-uppercase"><small>User ID</small></h6>
       							<h5>{{ $order->user->id }}</h5>
       						</div>
       						<div class="col">
       							<h6 class="text-uppercase"><small>Name</small></h6>
       							<h5>{{ $order->user->name }}</h5>
       						</div>

       						<div class="col-md-12 mt-4">
       							<h6 class="text-uppercase"><small>E-mail</small></h6>
       							<h5>{{ $order->user->email }}</h5>
       						</div>
       					</div>			
       				</div>

       				<div class="col-md-8">
       					<h6 class="text-uppercase"><small>Order</small></h6>
       					<hr>

       					<div class="row">
       						<div class="col">
       							<h6 class="text-uppercase"><small>Order ID</small></h6>
       							<h5>{{ $order->id }}</h5>
       						</div>
       						<div class="col">
       							<h6 class="text-uppercase"><small>Payment ID</small></h6>
       							<h5>{{ $order->payment_id }}</h5>
       						</div>
       					</div>
       					

       					

       					<h6 class="text-uppercase mt-4"><small>Products Bought</small></h6>
       					<ul class="list-group mt-2">
		       				@foreach($order->cart->items as $item)
		       				<li class="list-group-item">
		       					{{ $item['item']['name']}} | {{ $item['qty'] }} Units.

		       					<span class="badge badge-primary float-right" style="top: 14px;">$ {{ $item['price'] }}</span>
		       				</li>
		       				@endforeach
		       			</ul>

       				</div>
       			</div>
       		</div>
       		<div class="card-footer">
       			<strong>Total: $ {{ $order->cart->totalPrice }}</strong>
       			<span class="badge badge-secondary pull-right" style="margin-top: 3px;">Date of Purchase: {{ $order->created_at }}</span>
       		</div>
       	</div>
       	@endforeach

	</div>

	@endif
</div>
@endsection
