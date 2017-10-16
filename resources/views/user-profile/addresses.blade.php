@extends('layouts.front.default')

@section('content')

<div class="profile my-5">
	<div class="container">
	    <div class="row">
	    	<!-- PROFILE PICTURE AND MENU -->
		    @include('user-profile.partials.menu')


		    <!-- PROFILE INFORMATION -->
		    <section class="col-md-8">
		    	<div class="row align-items-center">
		    		<div class="col">
		    			<h3>Address List</h3>
		    		</div>
		    		<div class="col">
		    			<a href="{{ route('profile.new-address') }}" class="btn btn-big btn-primary float-right">Add new Address</a>
		    		</div>
		    	</div>
				
				<hr>

		      	@foreach($addresses as $address)
					<h1>{{ $address->name }}</h1>
					<p>{{ $address->street }} / {{ $address->street_num }}</p>

					<ul>
						<li>{{ $address->city }}</li>
						<li>{{ $address->state }}</li>
						<li>{{ $address->postal_code }}</li>
						<hr>
						<li>{{ $address->phone }}</li>
					</ul>
				@endforeach

		    </section>
	    </div>
	</div>
</div>
@endsection
