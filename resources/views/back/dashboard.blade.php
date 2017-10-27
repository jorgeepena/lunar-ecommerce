@extends('layouts.back.default')

@section('content')

<div class="section-title pt-3 pb-3">
	<div class="row align-items-center">
			<div class="col">
			<h6 class="section text-uppercase">Dashboard</h6>
			<h2 class="description">General View</h2>
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
	<div class="col">
		<div class="special-title">
			<h6 class="text-uppercase"><small>Quick Stats</small></h6>
			<div class="line"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col col-md-3">
		<div class="card text-white card-primary mb-3">
			<span class="floating-info" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="This number is the result of the last 7 days."><i class="ionicons ion-ios-information"></i></span>

			<div class="card-body p-3">
				<h6 class="card-title text-uppercase"><small>Sales this Week</small></h6>
				<h2 class="card-text">120,288</h2>
			</div>
		</div>
	</div>
	<div class="col col-md-3">
		<div class="card text-white card-warning mb-3">
			<div class="card-body p-3">
				<h6 class="card-title text-uppercase"><small>Orders this Week</small></h6>
				<h2 class="card-text">{{ $new_orders }}</h2>
			</div>
		</div>
	</div>
	<div class="col col-md-3">
		<div class="card text-white card-info mb-3">
			<div class="card-body p-3">
				<h6 class="card-title text-uppercase"><small>Total Clients</small></h6>
				<h2 class="card-text">{{ $clients }}</h2>
			</div>
		</div>
	</div>
	<div class="col col-md-3">
		<div class="card text-white card-success  mb-3">
			<div class="card-body p-3">
				<h6 class="card-title text-uppercase"><small>Products</small></h6>
				<h2 class="card-text">{{ $products }}</h2>
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