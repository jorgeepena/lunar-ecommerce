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

				<h3>Información de Orden</h3>
				<hr>
				<h5>Información de Contacto</h5>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nombre_cliente">Nombre del comprador</label>
							<input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control" required="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="telefono">Teléfono</label>
							<input type="numbre" name="telefono" id="telefono" class="form-control" required="">
						</div>
					</div>
				</div>
			
				<hr>
				<h5>Dirección de Envio</h5>

				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
							<label for="calle">Calle</label>
							<input type="text" name="calle" id="calle" class="form-control" required="">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="num_calle">Número</label>
							<input type="text" name="num_calle" id="num_calle" class="form-control" required="">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="colonia">Colonia</label>
							<input type="text" name="colonia" id="colonia" class="form-control" required="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="codigo_postal">Postal Code</label>
							<input type="text" name="codigo_postal" id="codigo_postal" class="form-control" required="">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="ciudad">City</label>
							<input type="text" name="ciudad" id="ciudad" class="form-control" required="">
						</div>
					</div>
				</div>
				
				<hr>
				<h3>Datos de Tarjeta</h3>
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