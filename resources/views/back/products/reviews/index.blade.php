@extends('layouts.back.default')

@section('content')

<div class="section-title pt-3 pb-3">
	<div class="row align-items-center">
			<div class="col">
			<h6 class="section text-uppercase">Review Moderation</h6>
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
    	<h4>Pending Approval</h4>
    	<hr>
    	<table class="table table-hover">
          <thead class="thead-default">
            <tr>
              <th>#</th>
              <th>User</th>
              <th>Product</th>
              <th>Review</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($reviews_pending as $rp)
            <tr>
              <th scope="row">{{ $rp->id }}</th>
      
              <td>{{ $rp->name }} <br> {{ $rp->email }}</td>
              <td><a href="{{ route('product.detail', $rp->product->slug) }}">{{ $rp->product->name }}</a></td>
              <td>{{ $rp->review }}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Acciones">
                  <a href="{{ route('review.approve', $rp->id) }}" class="btn btn-success"><i class="ionicons ion-checkmark"></i> Approve</a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

    	<h4>Reviews</h4>
    	<hr>
        <table class="table table-hover">
          <thead class="thead-default">
            <tr>
              <th>#</th>
              <th>User</th>
              <th>Product</th>
              <th>Review</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($reviews as $review)
            <tr>
              <th scope="row">{{ $review->id }}</th>
      
              <td>{{ $review->name }} <br> {{ $review->email }}</td>
              <td><a href="{{ route('product.detail', $review->product->slug) }}">{{ $review->product->name }}</a></td>
              <td>{{ $review->review }}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Acciones">
                  <a href="#" class="btn btn-danger"><i class="ionicons ion-checkmark"></i> Delete</a>
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