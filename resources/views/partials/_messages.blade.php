@if(Session::has('success') )

<div class="alert alert-success in alert-dismissable" style="margin-top: 0px; margin-bottom: -10px; padding: 15px; width: 100%;">
	<div class="container">
		 <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
		<strong>¡Success!</strong> {{ Session::get('success') }}
	</div>
</div>

@endif