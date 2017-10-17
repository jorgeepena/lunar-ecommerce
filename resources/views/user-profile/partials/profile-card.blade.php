<section class="col-md-3">
	<div class="card p-4">
		<!-- Image -->
		<div class="profile-image">
			@if( Auth::user()->image == NULL)
				<img class="card-img-top" src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim( Auth::user()->email))) . '?d=retro&s=300' }}" alt="{{ Auth::user()->name }}" style="width: 100%;">
			@else
				<img class="card-img-top" src="{{ asset('img/users/' . Auth::user()->image ) }}" alt="{{ Auth::user()->name }}">
			@endif

		</div>

		<div class="profile-info mt-3">
			<h4 class="mb-0">{{ Auth::user()->name }}</h4>
			<h6>{{ Auth::user()->email }}</h6>

			<hr>
			<p>SECTION PROBABLY FOR PROFILE INFO. WHAT TYPE OF INFO COULD THE USER FIND USEFULL HERE?</p>
		</div>
	</div>
</section>

