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
		    			<h3>Edit your Account</h3>
		    		</div>
		    		<div class="col">
		    			<a href="{{ route('profile.index') }}" class="btn btn-danger float-right"><i class="fa fa-chevron-left"></i> Go back</a>
		    		</div>
		    	</div>
				
				<hr>

		      	<form role="form" method="POST" action="{{ route('profile.update', $user->id) }}">
		      		{{ csrf_field() }}
		      		{{ method_field('PUT') }}
		      		<div class="row">
		      			<div class="col-md-6">
		      				<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" required="">
								<input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ $user->id }}">
							</div>
		      			</div>
		      			<div class="col-md-6">
		      				<div class="form-group">
								<label for="email">E-Mail</label>
								<input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control" required="" disabled="">
							</div>
		      			</div>
		      		</div>

	      			<hr>
	      			<h6>Password</h6>
	      			<hr>

		      		<div class="row">
		      			<div class="col-md-6">
		      				<div class="form-group">
								<label for="password">New Password</label>
								<input type="text" name="password" id="password" value="" class="form-control">
							</div>
		      			</div>

		      			<div class="col-md-6">
		      				<div class="form-group">
								<label for="confirm-password">Confirm Password</label>
								<input type="text" name="confirm-password" id="confirm-password" value="" class="form-control">
							</div>
		      			</div>
		      		</div>

		      		<hr>
		      		<div class="row">
		      			<div class="col-md-8 mr-auto">
		      				<a href="{{ route('profile.index') }}" class="btn btn-warning">Cancel</a>

		      				<button type="submit" class="btn btn-primary">Save Profile</button>
		      			</div>
		      		</div>
		      	</form>
		    </section>
	    </div>
	</div>
</div>
@endsection
