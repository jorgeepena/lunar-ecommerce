@extends('layouts.back.default')

@section('content')

<div class="section-title pt-3 pb-3">
	<div class="row align-items-center">
			<div class="col">
			<h6 class="section text-uppercase">Products</h6>
			<h2 class="description">View All</h2>
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

<div class="row">
	<div class="col">
		<div class="float-right">
			<a class="btn btn-primary btn-lg" href="{{ route('products.create') }}">Add New Product</a>
		</div>
	</div>
</div>

<hr>

<div class="row">
    <div class="col">
        <table class="table table-hover">
          <thead class="thead-default">
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Name</th>
              <th>SKU</th>
              <th>Price</th>
              <th>In Stock</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <th scope="row">{{ $product->id }}</th>
              <th><img style="width: 50px;" src="{{ $product->image }}"></th>
              <td><strong>{{ $product->name }}</strong> <br> <p>{{ $product->description }}</p></td>
              <td>{{ $product->sku }}</td>
              <td>${{ $product->price }}</td>
              <td>{{ $product->stock }}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Acciones">
                  <a href="{{ route('products.edit', $product->id) }}" class="btn btn-secondary"><i class="ionicons ion-edit"></i></a>
                  <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary"><i class="ionicons ion-ios-eye"></i></a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
</script>
@endsection