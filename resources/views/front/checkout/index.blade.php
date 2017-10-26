@extends('layouts.front.default')

@section('content')
<form action="{{ route('checkout') }}" method="POST" id="checkout-form">
	<div class="container">
		<div class="row">



			<div class="col-md-12">
				<h2 class="text-uppercase mt-5">Checkout</h2>
				<hr>

				<div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'fade' : '' }}">
					{{ Session::get('error') }}
				</div>
			</div>

			<div class="col-md-8">
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
				<p class="my-0">Select one of your previously saved addresses or register a new one.</p>

				<div class="row mt-3">
					<div class="col-md-12" id="accordion">
					@foreach($addresses as $adds)
			        <div class="card py-3 px-4">
			            
			            <div class="card-heading">
			            	<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $adds->id }}">
			                	<h6 class="card-title text-uppercase my-0"><small>{{ $adds->id }}. {{ $adds->name }}</small></h6>
			                </a>
			            </div>
		            

			            <div id="collapse{{ $adds->id }}" class="card-collapse collapse">
			                <div class="card-body card-addresses">
			                   	<!-- Datos de dirección para Formulario -->
			                   	<div class="row">
			                   		<div class="col-md-10">
			                   			<input type="text" name="street" id="street" class="form-control" value="{{ $adds->street }}" disabled readonly="">
			                   		</div>
			                   		<div class="col-md-2">
			                   			<input type="text" name="street_num" id="street_num" class="form-control" value="{{ $adds->street_num }}" disabled readonly="">
			                   		</div>

			                   	</div>

			                   	<div class="row mt-4">
			                   		<div class="col-md-4">
			                   			<input type="text" name="postal_code" id="postal_code" class="form-control" value="{{ $adds->postal_code }}" disabled readonly="">
			                   		</div>
			                   		<div class="col-md-4">
			                   			<input type="text" name="city" id="city" class="form-control" value="{{ $adds->city }}" disabled readonly="">
			                   		</div>
			                   		<div class="col-md-4">
			                   			<input type="text" name="state" id="state" class="form-control" value="{{ $adds->state }}" disabled readonly="">
			                   		</div>
			                   	</div>
			                </div>
			            </div>
			        </div>

			        @endforeach

			        <div class="card py-3 px-4">
			            <div class="card-heading">
			            	<a data-toggle="collapse" data-parent="#accordion" href="#collapseNuevo">
				                <h5 class="card-title text-uppercase my-0"><small>Register a New Address</small></h5>
			                </a>

			                <p class="my-0"><small>This address will be saved on your profile for future use.</small></p>
			            </div>
			            

			            <div id="collapseNuevo" class="card-collapse collapse in">
			                <div class="card-body new-direction">
			                   	<div class="row">
									<div class="col-md-10">
										<div class="form-group">
											<label for="street">Street</label>
											<input type="text" name="street" id="street" class="form-control" required="">
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label for="street_num">Street Num</label>
											<input type="text" name="street_num" id="street_num" class="form-control" required="">
										</div>
									</div>
								</div>

								<div class="row">
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
									<div class="col-md-4">
										<div class="form-group">
											<label for="state">State</label>
											<input type="text" name="state" id="state" class="form-control" required="">
										</div>
									</div>
								</div>	
			                </div>
			            </div>
			        </div>
			    </div>
				</div>

				<!--
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

					<div class="col-md-12">
						<div class="form-group">
							<label for="country">Country</label>
							<input type="text" name="country" id="country" class="form-control" required="">
						</div>
					</div>

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
				-->
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
			</div>

			<div class="col-md-4">
				<div class="card p-4">
					<h6 class="text-uppercase"><small>¿Do you have a Coupon?</small></h6>
					<form role="search" action="#">
						<div class="form-group mt-3 mb-5">
							<div class="input-group">
								<input class="form-control" name="query" type="search" placeholder="Code" aria-label="Code">
								<button class="input-group-addon btn btn-outline-success" type="submit">Apply</button>
							</div>
						</div>
	                </form>

	                <dl class="row mb-1">
                        <dd class="col-md-8"><strong>Subtotal</strong></td>
                        <dd class="col-md-4 text-right">$ {{ $total }}</td>
                    </dl>

                    <dl class="row mb-0">
                        <dd class="col-md-8"><strong>Coupon Discount:</strong></td>
                        <dd class="col-md-4 text-right">$ 150</td>
                    </dl>

                    <hr>

                    <dl class="row">
                        <dd class="col-md-8"><h4><strong>Total</strong></h4></td>
                        <dd class="col-md-4 text-right"><h4>$ {{ $total - 150 }}</h4></td>
                    </dl> 
				</div>
				<hr>
				<button type="submit" class="btn btn-success btn-lg btn-block">Checkout</button>
			</div>
		</div>
	</div>
</form>
@endsection

@section('scripts')

<script type="text/javascript">
	$(document).ready(function() {
		$('.card-heading').on('click', function(){
			$('.card').removeClass('bg-info');
			$('.card-addresses input').prop('disabled', true);
			$('.new-direction').find('input').prop('disabled', true);
			

			if ($('.in')) {
				$(this).parent().find('input').prop('disabled', false);
				$(this).find('.card').addClass('bg-info');
			}
		})

	});
</script>

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