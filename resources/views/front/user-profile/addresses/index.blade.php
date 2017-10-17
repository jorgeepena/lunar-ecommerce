@extends('layouts.front.default')

@section('content')

<div class="profile my-5">
	<div class="container">
	    <div class="row">
	    	<!-- PROFILE PICTURE AND MENU -->
		    @include('front.user-profile.partials.menu')


		    <!-- PROFILE INFORMATION -->
		    <section class="col-md-7">
		    	<div class="row align-items-center">
		    		<div class="col">
		    			<h3>Address List</h3>
		    		</div>
		    		<div class="col">
		    			<a href="{{ route('profile.address.create') }}" class="btn btn-big btn-primary float-right"><i class="fa fa-plus"></i> Add new Address</a>
		    		</div>
		    	</div>
				
				<hr>

				@if($addresses->count())
					@foreach($addresses as $address)
            		<div class="card my-3">
            			<div class="card-header">
            				<ul class="nav nav-pills card-header-pills float-right">
            					<li class="nav-item">
            						<a class="nav-link" href="#"><i class="fa fa-eye"></i> View</a>
            					</li>
            					<li class="nav-item">
            						<a class="nav-link" href="#"><i class="fa fa-pencil-square-o"></i> Edit</a>
            					</li>
            					<li class="nav-item">
            						<a class="nav-link" href="#"><i class="fa fa-trash"></i> Delete</a>
            					</li>
            				</ul>
            			</div>
            			<div class="card-body">
            				<h6 class="text-uppercase"><small><strong>Name</strong></small></h6>
            				<h4 class="card-title">{{ $address->name }}</h4>

            				<h6 class="text-uppercase"><small><strong>Address <em>(Street)</em></strong></small></h6>
            				<p class="card-text mb-1">{{ $address->street }} / {{ $address->street_num }}</p>
            				<p class="card-text">Contact Phone: {{ $address->phone }}</p>

            				<h6 class="text-uppercase"><small><strong>Location</strong></small></h6>
            				<ul>
								<li>City: {{ $address->city }}</li>
								<li>State: {{ $address->state }}</li>
								<li>CP: {{ $address->postal_code }}</li>
							</ul>
            			</div>
            		</div>						
					@endforeach
            	@else
            		<div class="text-center my-5">
            			<h4 class="mb-0">You don't have any saved addresses</h4>
            			<p>How about you save your first one <a href="{{ route('profile.address.create') }}">here</a> or in the botton at the top.</p>
            		</div>
				@endif
		    </section>

		    <!-- PROFILE INFO -->
		    @include('front.user-profile.partials.profile-card')
	    </div>
	</div>
</div>
@endsection
