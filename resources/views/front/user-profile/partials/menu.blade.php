<section class="col-md-2">
	<nav class="profile-nav mt-3">
		<h5>M E N U</h5>
		<ul class="list-unstyled">
			<li><a href="{{ route('profile.index') }}"><i class="fa fa-eye"></i> Overview</a></li>
			<li><a href="{{ route('profile.orders') }}"><i class="fa fa-th-list"></i> My Orders</a></li>
			<li><a href="{{ route('profile.address.index') }}"><i class="fa fa-location-arrow"></i> Adressess</a></li>
			<li><a href="{{ route('profile.wishlist') }}"><i class="fa fa-star"></i> My Wishlist</a></li>
			<hr>
			<li><a href="{{ route('profile.edit') }}"><i class="fa fa-pencil-square-o"></i> Edit Account</a></li>
			<li><a href="{{ route('profile.image') }}"><i class="fa fa-file-image-o"></i> Upload Image</a></li>
			<hr>
			<li><a href="{{ route('profile.edit') }}"><i class="fa fa-lock"></i> Change Password</a></li>
			<li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <i class="fa fa-power-off"></i> Logout
            </a></li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
		</ul>
	</nav>
</section>