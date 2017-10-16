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
		    			@if( Auth::user()->image == NULL)
							<img class="card-img-top" src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim( Auth::user()->email))) . '?d=retro&s=300' }}" alt="{{ Auth::user()->name }}" style="width: 100%;">
						@else
							<img class="card-img-top" src="{{ asset('img/users/' . Auth::user()->image ) }}" alt="{{ $user->name }}">
						@endif

		    		</div>

		    		<div class="profile-info">
		    			<h3>{{ $user->name }}</h3>
		    			<h5>{{ $user->email }}</h5>

		    			<hr>
		    			<h5>INFO</h5>
		    		</div>
		    	</div>

		    	<nav class="profile-nav p-4">

		    		<h5>M E N U</h5>
		    		<ul class="list-unstyled">
		    			<li><a href="{{ route('profile.index') }}">Overview</a></li>
		    			<li><a href="#">Edit Account</a></li>
		    			<li><a href="#">Upload Image</a></li>
		    			<li><a href="#">My Orders</a></li>
		    			<li><a href="{{ route('profile.address') }}">Adressess</a></li>
		    			<li><a href="#">My Wishlist</a></li>
		    			<hr>
		    			<li><a href="#">Change Password</a></li>
		    			<li><a href="{{ route('logout') }}"
	                        onclick="event.preventDefault();
	                                 document.getElementById('logout-form').submit();">
	                        Logout
	                    </a></li>

	                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>


		    		</ul>
		    	</nav>
		    </section>


		    <!-- PROFILE INFORMATION -->
		    <section class="col-md-8">
				<h3>Address List</h3>
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
