@extends('layouts.back.default')

@section('content')

<div class="section-title pt-3 pb-3">
	<div class="row align-items-center">
			<div class="col">
			<h6 class="section text-uppercase">Products</h6>
			<h2 class="description">Create New Product</h2>
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

<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
<div class="row">
	{{ csrf_field() }}
	<div class="col-md-8">
		<h6 class="text-uppercase"><small>Product Details</small></h6>
		<hr>

		<div class="form-group">
        	<label for="name">Product Name</label>
     		<input type="text" class="form-control" id="name" name="name" />
        </div>

		<div class="form-group">
        	<label for="description">Description</label>
        	<textarea class="form-control" id="description" name="description" rows="5"></textarea>
        </div>


       	<h6 class="text-uppercase mt-4"><small>Images</small></h6>
       	<hr>

       	<div class="form-group">
            <label for="image">Main Image</label>
            <input type="text" class="form-control" placeholder="Browse.." readonly="" />
            <input type="file" id="image" name="image" id="image" />
        </div>

        <div class="row">
        	<div class="col-md-6">
        		<div class="form-group">
                    <label for="image_2">Additional Image</label>
                    <input type="text" class="form-control" placeholder="Browse.." readonly="" />
                    <input type="file" id="image_2" name="image_2" multiple="" />
                </div>
        	</div>
        	<div class="col-md-6">
        		<div class="form-group">
                	<label for="image_3">Additional Image</label>
                	<input type="text" class="form-control" placeholder="Browse.." readonly="" />
                	<input type="file" id="image_3" name="image_3" multiple="" />
                </div>
        	</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image_4">Additional Image</label>
                    <input type="text" class="form-control" placeholder="Browse.." readonly="" />
                    <input type="file" id="image_4" name="image_4" multiple="" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image_5">Additional Image</label>
                    <input type="text" class="form-control" placeholder="Browse.." readonly="" />
                    <input type="file" id="image_5" name="image_5" multiple="" />
                </div>
            </div>
        </div>
       	<h6 class="text-uppercase mt-4"><small>Price</small></h6>
       	<hr>

       	<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				<label for="price">Price</label>
					<div class="input-group">
						<span class="input-group-addon">$</span>
						<input type="number" class="form-control" id="price" name="price" />
						<span class="input-group-addon">USD</span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="production_cost">Production Cost</label>
					<div class="input-group">
						<span class="input-group-addon">$</span>
						<input type="number" class="form-control" id="production_cost" name="production_cost" />
						<span class="input-group-addon">USD</span>
					</div>
				</div>
			</div>
		</div>

       	<h6 class="text-uppercase mt-4"><small>Inventory</small></h6>
       	<hr>

       	<div class="row">
			<div class="col-md-6">
				<div class="form-group">
                	<label for="stock">Stock</label>
             		<input type="text" class="form-control" id="stock" name="stock" />
                </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
                	<label for="sku">SKU, SBN</label>
             		<input type="text" class="form-control" id="sku" name="sku" />
                </div>
			</div>
		</div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                <label for="height">Height</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="height" name="height" />
                        <span class="input-group-addon">cm</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label for="lenght">Lenght</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="lenght" name="lenght" />
                        <span class="input-group-addon">cm</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label for="depth">Depth</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="depth" name="depth" />
                        <span class="input-group-addon">cm</span>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="float-right mb-5">
			<a href="{{ route('products.index') }}" class="btn btn-danger btn-lg">Cancel</a>
			<button type="submit" class="btn btn-success btn-lg">Save Product</button>
		</div>
	</div>
    <div class="col-md-4">
    	<div class="card p-4">
	       	<h6 class="text-uppercase"><small>Product Variants</small></h6>
	       	<hr>

	       	<div class="form-group">
    			<label>Category</label>
    			<select class="form-control" id="categoria_id" name="categoria_id">
                    <option value="0">Select a category</option>
                    <option value="1">Category 1</option>
                    <option value="2">Category 2</option>
                    <option value="3">Category 3</option>
                    <option value="4">Category 4</option>
                    <option value="5">Category 5</option>
    			</select>
    		</div>
			<hr>
			
    		<div class="text-center">
    			<p>Can´t find an option?</p>
    			<a href="{{ route('admin.variants') }}" class="btn btn-primary btn-block">Go to variants</a>
    		</div>
    	</div>
    </div>
</div>
</form>
@endsection

@section('scripts')
<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
</script>
@endsection