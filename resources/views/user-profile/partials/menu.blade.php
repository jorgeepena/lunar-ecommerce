<section class="col-md-4">
	<div class="card p-4">
		<!-- Image -->
		<div class="profile-image">
			@if( Auth::user()->image == NULL)
				<img class="card-img-top" src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim( Auth::user()->email))) . '?d=retro&s=300' }}" alt="{{ Auth::user()->name }}" style="width: 100%;">
			@else
				<img class="card-img-top" src="{{ asset('img/users/' . Auth::user()->image ) }}" alt="{{ Auth::user()->name }}">
			@endif

		</div>

		<div class="profile-info">
			<h3>{{ Auth::user()->name }}</h3>
			<h5>{{ Auth::user()->email }}</h5>

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