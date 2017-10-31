<h6 class="text-uppercase"><small>Filter by Category</small></h6>
<hr>
<div class="card">
	<ul class="list-group">
		<li class="list-group-item"><a href="{{ route('great-detail') }}">View All</a></li>

		<div id="accordion">
		@foreach($categories as $category)
			@if($category->parent_id != NULL || 0)

			@else
				@if($category->product->count() == 0)

				@else
					<li class="list-group-item"><a href="{{ strtolower(route('filter.category', $category->name)) }}">{{ $category->name }} <span style="position:relative; top:3px;" class="badge badge-secondary float-right">{{ $category->product->count() }}</span></a></li>
				@endif
			@endif

			@foreach($category->getChilds($category->id) as $cat)
				@if($cat->product->count() == 0)
					
				@else
					<small>
						<li class="list-group-item list-group-item-secondary pl-5"><a href="{{ strtolower(route('filter.category', $cat->name)) }}">{{ $cat->name }} <span style="position:relative; top:3px;" class="badge badge-secondary float-right">{{ $cat->product->count() }}</span></a></li>
					</small>
				@endif
			@endforeach
		@endforeach
		</div>
	</ul>
</div>