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
		    			<h3>Upload User Image</h3>
		    		</div>
		    		<div class="col">
		    			<a href="{{ route('profile.index') }}" class="btn btn-danger float-right"><i class="fa fa-chevron-left"></i> Go back</a>
		    		</div>
		    	</div>
				
				<hr>

		      	<form role="form" method="POST" action="{{ route('profile.image.update', $user->id) }}" enctype="multipart/form-data">
		      		{{ csrf_field() }}
		      		{{ method_field('PUT') }}
		      		<div class="row">
		      			<div class="col-md-6">
		      				<h6>Current Image</h6>
		      				<hr>

		      				@if( Auth::user()->image == NULL)
								<img class="card-img-top" src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim( Auth::user()->email))) . '?d=retro&s=300' }}" alt="{{ Auth::user()->name }}" style="width: 100%;">
							@else
								<img class="card-img-top" src="{{ asset('img/users/' . Auth::user()->image ) }}" alt="{{ Auth::user()->name }}">
							@endif
		      			</div>
		      			<div class="col-md-6">
		      				<h6>Upload New Image</h6>
		      				<hr>

		      				<input class="form-control-file" id="user_image" name="user_image" aria-describedby="fileHelp" type="file">
	      					<small id="fileHelp" class="form-text text-muted">This is the image that defines you. Make it something cool.</small>
		      				
		      			</div>
		      		</div>

		      		<hr>

		      		<div class="row">
		      			<div class="col-md-12">
		      				<button type="submit" class="btn btn-primary float-right">Upload Image</button>
		      				<a href="{{ route('profile.index') }}" class="btn btn-warning float-right">Cancel</a>
		      			</div>
		      		</div>
		      	</form>
		    </section>
	    </div>
	</div>
</div>
@endsection
