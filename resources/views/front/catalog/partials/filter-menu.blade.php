<h6 class="text-uppercase"><small>Filter by Category</small></h6>
<hr>
<div class="card">
	<ul class="list-group">
		<li class="list-group-item"><a href="{{ route('great-detail') }}">View All</a></li>
		@foreach($categories as $category)
		<li class="list-group-item"><a href="{{ strtolower(route('filter.category', $category->name)) }}">{{ $category->name }} <span style="position:relative; top:3px;" class="badge badge-secondary float-right">{{ $category->product->count() }}</span></a></li>
		@endforeach
	</ul>
</div>