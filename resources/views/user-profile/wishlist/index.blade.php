@extends('layouts.front.default')

@section('content')

<div class="profile my-5">
	<div class="container">
	    <div class="row">
			<!-- PROFILE MENU -->
		    @include('user-profile.partials.menu')

		    <!-- PROFILE INFORMATION -->
		    <section class="col-md-7">
		       <h3>My Wishlist</h3>
		       <hr>

		       @if($wishlist->count())
            		@foreach($wishlist as $ws)
					
					@endforeach
            	@else
            		<div class="text-center my-5">
            			<h4 class="mb-0">You don't have saved products.</h4>
            			<p>Visit the store <a href="{{ route('great-detail') }}">here</a> and start saving your favorite products and share with your friends.</p>
            		</div>
				@endif
		    </section>

		    <!-- PROFILE INFO -->
		    @include('user-profile.partials.profile-card')
	    </div>
	</div>
</div>
@endsection
