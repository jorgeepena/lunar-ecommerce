@extends('layouts.front.default')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 ml-auto mr-auto">
			<h2>Checkout</h2>
			<hr>
			<h4>Tu total: $ {{ $total }}</h4>

			<div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'fade' : '' }}">
				{{ Session::get('error') }}
			</div>

			<form action="{{ route('checkout') }}" method="POST" id="checkout-form">

				<h3>Order Information</h3>
				<hr>
				<h5>Contact Information</h5>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="client_name">Buyers Name / Reciever's Name</label>
							<input type="text" name="client_name" id="client_name" class="form-control" required="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="numbre" name="phone" id="phone" class="form-control" required="">
						</div>
					</div>
				</div>
			
				<hr>
				<h5>Packaging Address</h5>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="address_1">Address 1</label>
							<input type="text" name="address_1" id="address_1" class="form-control" required="">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="address_2">Address 2</label>
							<input type="text" name="address_2" id="address_2" class="form-control">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="country">Country</label>
							<input type="text" name="country" id="country" class="form-control" required="">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="state">State</label>
							<input type="text" name="state" id="state" class="form-control" required="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="postal_code">Postal Code</label>
							<input type="text" name="postal_code" id="postal_code" class="form-control" required="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="city">City</label>
							<input type="text" name="city" id="city" class="form-control" required="">
						</div>
					</div>
				</div>
				
				<hr>
				<h3>Card Details</h3>
				<div class="form-group">
					<label for="card-name">Name on the Card</label>
					<input type="text" id="card-name" class="form-control" required="">
				</div>

				<div class="form-group">
					<label for="card-number">Card Number</label>
					<input type="text" id="card-number" class="form-control" required="">
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="card-month">Month</label>
							<input type="text" id="card-month" class="form-control" required="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="card-year">Year</label>
							<input type="text" id="card-year" class="form-control" required="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="card-ccv">CVC</label>
							<input type="text" id="card-cvc" class="form-control" required="">
						</div>
					</div>
				</div>

				{{ csrf_field() }}

				<hr>

				<button type="submit" class="btn btn-success btn-lg btn-block">Checkout</button>
				<br>
				<br>
			</form>
		</div>
	</div>
</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

	<script>
		Stripe.setPublishableKey('pk_test_WBX0VXTDkd7umFsGlw5I8qkF');

		var $form = $('#checkout-form');

		$form.submit(function(event){

			// No mostrar los errores.
			$('#change-error').addClass('hidden');

			// Pedirle al boton que se desactive al enviar el formulario para que no sea posible enviar varias veces el formulario.
			$form.find('button').prop('disabled', true);

			Stripe.card.createToken({
			name: $('#card-name').val(),
			  number: $('#card-number').val(),
			  cvc: $('#card-cvc').val(),
			  exp_month: $('#card-month').val(),
			  exp_year: $('#card-year').val()
			}, stripeResponseHandler);

			return false;
		});	

		function stripeResponseHandler(status, response){
			if (response.error) {
				$('#change-error').removeClass('hidden');
				$('#change-error').text(response.error.message);
				$form.find('button').prop('disabled', false);
			}else{
				var token = response.id;

				// Insert the token into the form so it gets submitted to the server:
			    $form.append($('<input type="hidden" name="stripeToken" />').val(token));

			    // Submit the form:
			    $form.get(0).submit();
			}
		}
	</script>
@endsection