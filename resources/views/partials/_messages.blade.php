@if(Session::has('success') )

<div class="row">
	<div class="alert alert-success fade in alert-dismissable" style="margin-top: -30px; padding: 30px;">
		<div class="container">
			 <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong>¡Success!</strong> {{ Session::get('success') }}
		</div>
	</div>
</div>

@endif