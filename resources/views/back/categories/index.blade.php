@extends('layouts.back.default')

@section('content')

<div class="section-title pt-3 pb-3">
	<div class="row align-items-center">
			<div class="col">
			<h6 class="section text-uppercase">Categories</h6>
			<h2 class="description">General View</h2>
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
    <div class="col-md-8">
        <table class="table table-hover">
          <thead class="thead-default">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $cat)
            <tr>
              <th scope="row">{{ $cat->id }}</th>
              <td><strong>{{ $cat->name }}</strong> <br> <p>{{ $cat->description }}</p></td>
              <td>
                <div class="btn-group" role="group" aria-label="Acciones">
            	<form method="POST" action="{{ route('categories.destroy', $cat->id) }}">
	                <button type="submit" class="btn btn-danger btn-block"><i class="icon ion-ios-trash" aria-hidden="true"></i> Delete</button>
	                {{ csrf_field() }}
	                {{ method_field('DELETE') }}
	            </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>

    <div class="col-md-4">
    	<div class="card p-4">
    		<h6 class="text-uppercase"><small>Add new Category</small></h6>
    		<form method="POST" action="{{ route('categories.store') }}">
			{{ csrf_field() }}
				<div class="form-group mt-2">
		     		<input type="text" class="form-control" id="name" name="name" />
		        </div>

				<button type="submit" class="btn btn-success btn-block">Save Category</button>
		    </form>
    	</div>
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