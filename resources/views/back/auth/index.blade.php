@extends('layouts.back.default')

@section('content')

<div class="section-title pt-3 pb-3">
	<div class="row align-items-center">
			<div class="col">
			<h6 class="section text-uppercase">Admins</h6>
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
			<a class="btn btn-primary btn-lg" href="{{ route('admin.register') }}">Register New Admin</a>
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
              <th>Name</th>
              <th>E-mail</th>
              <th>Permission</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($admins as $admin)
            <tr>
              <th scope="row">{{ $admin->id }}</th>
              <td>{{ $admin->name }}</td>
              <td>{{ $admin->email }}</td>
              <td>[[ PERMISSION ]]</td>
              <td>
                <div class="btn-group" role="group" aria-label="Acciones">
                  <a href="#" class="btn btn-secondary"><i class="ionicons ion-edit"></i></a>
                  <a href="#" class="btn btn-secondary"><i class="ionicons ion-ios-eye"></i></a>
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