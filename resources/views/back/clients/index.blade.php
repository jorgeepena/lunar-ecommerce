@extends('layouts.back.default')

@section('content')

<div class="section-title pt-3 pb-3">
	<div class="row align-items-center">
			<div class="col">
			<h6 class="section text-uppercase">Clients</h6>
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

<div class="row mb-3">
  <div class="col col-md-6">
    <div class="card text-white card-primary mb-3">
      <span class="floating-info" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="This number is the result of the last 7 days."><i class="ionicons ion-ios-information"></i></span>

      <div class="card-body p-3">
        <h6 class="card-title text-uppercase"><small>New Clients</small></h6>
        <h2 class="card-text">{{ $new_clients }}</h2>
      </div>
    </div>
  </div>
  <div class="col col-md-6">
    <div class="card text-white card-warning mb-3">
      <div class="card-body p-3">
        <h6 class="card-title text-uppercase"><small>Total Clients</small></h6>
        <h2 class="card-text">{{ $clients->count() }}</h2>
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col">
        <table class="table table-hover">
          <thead class="thead-default">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Orders</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($clients as $client)
            <tr>
              <th scope="row">{{ $client->id }}</th>
              <td>{{ $client->name }}</td>
              <td>{{ $client->email }}</td>
              <td>[[[ ORDERS ]]]</td>
              <td>
                <div class="btn-group" role="group" aria-label="Actions">
                  <a href="{{ route('client.show', $client->id ) }}" class="btn btn-secondary"><i class="ionicons ion-ios-eye"></i> Details</a>
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