@extends('layouts.back.default')

@section('content')

<div class="section-title pt-3 pb-3">
	<div class="row align-items-center">
			<div class="col">
			<h6 class="section text-uppercase">Orders</h6>
			<h2 class="description">View All</h2>
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
  <div class="col col-md-6">
    <div class="card text-white card-primary mb-3">
      <span class="floating-info" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="This number is the result of the last 7 days."><i class="ionicons ion-ios-information"></i></span>

      <div class="card-body p-3">
        <h6 class="card-title text-uppercase"><small>New Orders</small></h6>
        <h2 class="card-text">{{ $new_orders }}</h2>
      </div>
    </div>
  </div>
  <div class="col col-md-6">
    <div class="card text-white card-warning mb-3">
      <div class="card-body p-3">
        <h6 class="card-title text-uppercase"><small>Total Orders</small></h6>
        <h2 class="card-text">{{ $orders->count() }}</h2>
      </div>
    </div>
  </div>
</div>

<div class="row mb-5">
  <div class="col-md-12">
    <div class="special-title mt-0">
      <h6 class="text-uppercase"><small>Quick Search</small></h6>
      <div class="line"></div>
    </div>
  </div>

  <div class="col-md-12">
      <form class="form-inline" style="display: block;" role="search" action="{{ route('order.search.query') }}">
        <div class="input-group">
          <input type="search" name="query" class="form-control form-control-lg" placeholder="Search by User, Payment ID or Date of Purchase...">
          <span class="input-group-btn">
              <button class="btn btn-primary" type="submit"><i class="ionicons ion-android-search"></i></button>
          </span>
      </div>
      </form>
  </div>
</div>


<div class="row">
    <div class="col">
       	@if($orders->count())
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
       	@else
       	<div class="text-center my-5">
       		<h4 class="mb-0">Your client base haven't order anything!</h4>
       		<p>Visit this page in the future to see if they have bought anything!</p>
       	</div>
       	@endif
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