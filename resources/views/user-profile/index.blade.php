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
		    			@if( Auth::user()->imagen == NULL)
							<img class="card-img-top" src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim( Auth::user()->email))) . '?d=retro&s=300' }}" alt="{{ Auth::user()->name }}" style="width: 100%;">
						@else
							<img class="card-img-top" src="{{ asset('img/usuarios/' . Auth::user()->imagen ) }}" alt="{{ $usuario->name }}">
						@endif

		    		</div>

		    		<div class="profile-info">
		    			<h3>{{ Auth::user()->name }}</h3>
		    			<h5>{{ Auth::user()->email }}</h5>
		    			<h5>INFO</h5>
		    		</div>
		    	</div>

		    	<div class="profile-nav p-4">

		    		<h5>M E N U</h5>
		    		<ul class="list-unstyled">
		    			<li><a href="#">Overview</a></li>
		    			<li><a href="#">Edit Account</a></li>
		    			<li><a href="#">Upload Image</a></li>
		    			<li><a href="#">My Orders</a></li>
		    			<li><a href="#">Adressess</a></li>
		    			<li><a href="#">My Wishlist</a></li>
		    			<hr>
		    			<li><a href="#">Change Password</a></li>
		    			<li><a href="#">Logout</a></li>
		    		</ul>
		    	</div>
		    </section>


		    <!-- PROFILE INFORMATION -->
		    <section class="col-md-8">
		       <h3>Order Summary</h3>
		       <hr>

		       <h5>Title</h5>
		       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in eros odio. Etiam magna sem, condimentum ac neque ac, tincidunt lacinia quam. Pellentesque sit amet mi vel magna convallis rhoncus. Donec a luctus ante. Praesent ut lobortis nisi. Integer ac eros quis orci lacinia pretium. Nulla urna ipsum, suscipit vitae condimentum id, pretium fringilla nisl. Nullam enim metus, scelerisque et mollis a, mollis eu turpis. In eget velit tincidunt, laoreet sem et, accumsan lacus. Donec vel felis justo. Nullam porttitor arcu ut elementum pulvinar. Mauris ac ipsum et enim vehicula hendrerit. Duis bibendum, leo eget euismod tempor, purus dui tristique dolor, sed fermentum eros dui vel est. Sed metus augue, vehicula id mi bibendum, ultrices malesuada turpis. </p>
		    </section>
	    </div>
	</div>
</div>
@endsection
