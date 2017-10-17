@extends('layouts.front.default')

@section('content')

<div class="profile my-5">
	<div class="container">
	    <div class="row">
	    	<!-- PROFILE PICTURE AND MENU -->
		    @include('front.user-profile.partials.menu')

		    <!-- PROFILE INFORMATION -->
		    <section class="col-md-8">
		    	<div class="row align-items-center">
		    		<div class="col">
		    			<h3>Create New Address</h3>
		    		</div>
		    		<div class="col">
		    			<a href="{{ route('profile.address.index') }}" class="btn btn-danger float-right"><i class="fa fa-chevron-left"></i> Go back</a>
		    		</div>
		    	</div>
				
				<hr>

		      	<form role="form" method="POST" action="{{ route('profile.address.store') }}">
		      		{{ csrf_field() }}
		      		<div class="row">
		      			<div class="col-md-12">
		      				<div class="form-group">
								<label for="name">Name for Direction</label>
								<input type="text" name="name" id="name" class="form-control" required="">
								<input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
							</div>
		      			</div>
		      			<div class="col-md-8">
		      				<div class="form-group">
								<label for="street">Street</label>
								<input type="text" name="street" id="street" class="form-control" required="">
							</div>
		      			</div>
		      			<div class="col-md-4">
		      				<div class="form-group">
								<label for="street_num">Street Number</label>
								<input type="text" name="street_num" id="street_num" class="form-control" required="">
							</div>
		      			</div>

		      			<div class="col-md-4">
		      				<div class="form-group">
								<label for="postal_code">Postal Code</label>
								<input type="text" name="postal_code" id="postal_code" class="form-control" required="">
							</div>
		      			</div>
		      			<div class="col-md-4">
		      				<div class="form-group">
								<label for="city">City</label>
								<input type="text" name="city" id="city" class="form-control" required="">
							</div>
		      			</div>
		      			<div class="col-md-4">
		      				<div class="form-group">
								<label for="state">State</label>
								<input type="text" name="state" id="state" class="form-control" required="">
							</div>
		      			</div>

		      			<div class="col-md-6">
		      				<div class="form-group">
								<label for="country">Country</label>
								<input type="text" name="country" id="country" class="form-control">
							</div>
		      			</div>

		      			<div class="col-md-6">
		      				<div class="form-group">
								<label for="phone">Phone</label>
								<input type="text" name="phone" id="phone" class="form-control" required="">
							</div>
		      			</div>
		      		</div>

		      		<div class="row">
		      			<div class="col-md-8 mr-auto">
		      				<a href="{{ route('profile.address.index') }}" class="btn btn-warning">Cancel</a>

		      				<button type="submit" class="btn btn-primary">Save Address</button>
		      			</div>
		      		</div>
		      	</form>
		    </section>
	    </div>
	</div>
</div>
@endsection
