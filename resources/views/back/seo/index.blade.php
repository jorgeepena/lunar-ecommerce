@extends('layouts.back.default')

@section('content')

<div class="section-title pt-3 pb-3">
	<div class="row align-items-center">
			<div class="col">
			<h6 class="section text-uppercase">SEO</h6>
			<h2 class="description">Configure you SEO</h2>
		</div>
		<div class="col">
			<div class="text-right">
		        <h5 id="clock"></h5>
	    		<h6 id="date"></h6> 
			</div>
		</div>
	</div>
	<hr>
</div>

<form method="POST" action="{{ route('seo.update', 1) }}" enctype="multipart/form-data">

<div class="row">
	<div class="col">
		<div class="float-right">
			<button type="submit" class="btn btn-success btn-lg" href="{{ route('seo.update', 1) }}">Save Changes</a>
		</div>
	</div>
</div>

<hr>
<h6><small>Last update: {{ $seo->updated_at }}</small></h6>



<div class="row">
    <div class="col-md-8">
    	<h6 class="text-uppercase mt-4"><small>Page Configuration</small></h6>
		<hr>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
			    	<label for="page_title">Page Title</label>
			 		<input type="text" class="form-control" id="page_title" name="page_title" value="{{ $seo->page_title or '' }}"/>
			    </div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
			    	<label for="page_url">URL</label>
			 		<input type="text" class="form-control" id="page_url" name="page_url" value="{{ $seo->page_url or '' }}"/>
			    </div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
		        	<label for="page_description">Description</label>
		        	<textarea class="form-control" id="page_description" name="page_description" rows="5">{{ $seo->page_description }}</textarea>
		        </div>
			</div>

			<div class="col-md-12">
				<label for="page_keywords">Keywords</label>
		 		<input type="text" class="form-control" id="page_keywords" name="page_keywords" value="{{ $seo->page_keywords or '' }}"/>
				<small class="form-text text-muted">Separate each element with a comma or the search robots will not be able to identify the keywords.</small>
			</div>

			<div class="col-md-12">
				<label for="page_theme_color_hex">Theme Color</label>
		 		<input type="text" class="form-control" id="page_theme_color_hex" name="page_theme_color_hex" value="{{ $seo->page_theme_color_hex or '' }}"/>
				<small class="form-text text-muted">Use a HEX Value too define your page's theme color.</small>
			</div>
		</div>

		<h6 class="text-uppercase mt-4"><small>Google Search Robots Configuration</small></h6>
		<hr>

		<div class="form-group">
	        <label for="image">Robots.txt file</label>
	        <input type="file" id="image" name="image" id="image" />
	        <small class="form-text text-muted">Upload your text file with the proper configurations for robots. We'll take care of the rest.</small>
	    </div>


	    <h6 class="text-uppercase mt-4"><small>Additional SEO Options</small></h6>
		<hr>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
			    	<label for="page_canonical_url">Canonical URL</label>
			 		<input type="text" class="form-control" id="page_canonical_url" name="page_canonical_url" value="{{ $seo->page_canonical_url or '' }}"/>
			    </div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
			    	<label for="page_alternate_url">Alternate URL</label>
			 		<input type="text" class="form-control" id="page_alternate_url" name="page_alternate_url" value="{{ $seo->page_alternate_url or '' }}"/>
			    </div>
			</div>
		</div>
			<hr>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
			        <label for="image">Browser Config XML</label>
			        <input type="file" id="image" name="image" id="image" />
			        <small class="form-text text-muted">Image must be 180x180 pixels (Anything bigger will be downscale to 180x180).</small>
			    </div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
			        <label for="image">MSTILE Image File 150x150</label>
			        <input type="file" id="image" name="image" id="image" />
			        <small class="form-text text-muted">Image must be 150x150 pixels (Anything bigger will be downscale to 150x150).</small>
			    </div>
			</div>
		</div>
    </div>
    <div class="col-md-4">
    	<div class="card p-4 mb-3">
	       	<h6 class="text-uppercase"><small>Page Image Options</small></h6>

   	       	<div class="form-group">
		        <label for="image">Logo</label>
		        <input type="file" id="image" name="image" id="image" />
		    </div>
			<hr>
			
    		<h6 class="text-uppercase"><small>Favicon Options</small></h6>

	       	<div class="form-group">
		        <label for="image">Apple Touch Icon</label>
		        <input type="file" id="image" name="image" id="image" />
		        <small class="form-text text-muted">Image must be 180x180 pixels (Anything bigger will be downscale to 180x180).</small>
		    </div>

		    <div class="form-group">
		        <label for="image">Favicon 32x32</label>
		        <input type="file" id="image" name="image" id="image" />
		        <small class="form-text text-muted">Image must be 32x32 pixels (Anything bigger will be downscale to 32x32).</small>
		    </div>

		    <div class="form-group">
		        <label for="image">Favicon 16x16</label>
		        <input type="file" id="image" name="image" id="image" />
		        <small class="form-text text-muted">Image must be 16x6 pixels (Anything bigger will be downscale to 16x16).</small>
		    </div>

		    <h6 class="text-uppercase"><small>Safari Theme Options</small></h6>

		    <div class="form-group">
		        <label for="image">Mask Icon</label>
		        <input type="file" id="image" name="image" id="image" />
		        <small class="form-text text-muted">File must be a .svg ; It will be renamed for it to work with your page's SEO.</small>
		    </div>

		    <div class="form-group">
				<label for="page_safari_mask_icon_color">Color</label>
		 		<input type="text" class="form-control" id="page_safari_mask_icon_color" name="page_safari_mask_icon_color" value="{{ $seo->page_safari_mask_icon_color or '' }}"/>
				<small class="form-text text-muted">HEX value.</small>
			</div>

			<h6 class="text-uppercase"><small>Android Chrome Manifest</small></h6>

			<div class="form-group">
		        <label for="image">Manifest JSON File</label>
		        <input type="file" id="image" name="image" id="image" />
		        <small class="form-text text-muted">Upload your manifest.json file here.</small>
		    </div>

		    <div class="form-group">
		        <label for="image">Manifest Icon 192x192</label>
		        <input type="file" id="image" name="image" id="image" />
		        <small class="form-text text-muted">Image must be 192x192 pixels (Anything bigger will be downscale to 192x192).</small>
		    </div>

		    <div class="form-group">
		        <label for="image">Manifest Icon 384x384</label>
		        <input type="file" id="image" name="image" id="image" />
		        <small class="form-text text-muted">Image must be 384x384 pixels (Anything bigger will be downscale to 383x384).</small>
		    </div>
    	</div>
    </div>
</div>
<hr>
<div class="row mb-5">
	<div class="col">
		<div class="float-right">
			<button type="submit" class="btn btn-success btn-lg" href="{{ route('seo.update', 1) }}">Save Changes</a>
		</div>
	</div>
</div>
{{ csrf_field() }}
{{ method_field('PUT') }}
</form>
@endsection

@section('scripts')
<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
</script>
@endsection