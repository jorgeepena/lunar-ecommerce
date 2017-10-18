@extends('layouts.front.default')

@section('content')

<div class="profile my-5">
	<div class="container">
	    <div class="row">
			<!-- PROFILE MENU -->
		    @include('front.user-profile.partials.menu')

		    <!-- PROFILE INFORMATION -->
		    <section class="col-md-7">
		       <div class="row align-items-center">
		    		<div class="col">
		    			<h3>My Wishlist</h3>
		    		</div>
		    		<div class="col">
		    			<ul class="my-0 float-right list-inline">
		    				<li class="list-inline-item dropdown">
	                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                              Share
	                            </a>
	                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

	                                <a class="dropdown-item" href="#"><i class="fa fa-facebook-official"></i> Facebook</a>
	                                <a class="dropdown-item" href="#"><i class="fa fa-twitter-square"></i> Twitter</a>
	                                <a class="dropdown-item" href="#"><i class="fa fa-google-plus-square"></i> Google +</a>
	                                <a class="dropdown-item" href="#"><i class="fa fa-envelope-square"></i> Email</a>
	                               
	                            </div>
	                        </li>

	                        
        		    		@if($wishlist->count())
                        		<li class="list-inline-item"><a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Checkout Now!</a></li>
        		    		@else
        		    			<li class="list-inline-item"><a href="javascript:void(0)" class="btn btn-primary disabled"><i class="fa fa-shopping-cart"></i> Checkout Now!</a></li>
		    				@endif
		    			</ul>
		    		
		    		</div>

		    	</div>
				
				<hr>

		       @if($wishlist->count())
		       		<div class="card-columns">
		       			@foreach($wishlist as $ws)
		       			<a href="{{ route('product.detail', $ws->product->id) }}" class="card">
		       				<img class="card-img-top" src="{{ $ws->product->image }}" alt="Card image cap">
		       				<div class="card-body">
		       					<h4 class="card-title">{{ $ws->product->name }}</h4>
		       					<p class="card-text"><strong>$ {{ $ws->product->price }}</strong></p>
		       				</div>
		       				<div class="card-footer">
		       					<small class="text-muted">Only {{ $ws->product->stock }} left in stock!</small>
		       				</div>
		       			</a>
						@endforeach
		       		</div>
            	@else
            		<div class="text-center my-5">
            			<h4 class="mb-0">You don't have saved products.</h4>
            			<p>Visit the store <a href="{{ route('great-detail') }}">here</a> and start saving your favorite products and share with your friends.</p>
            		</div>
				@endif
		    </section>

		    <!-- PROFILE INFO -->
		    @include('front.user-profile.partials.profile-card')
	    </div>
	</div>
</div>
@endsection
