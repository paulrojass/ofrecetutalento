@extends('layouts.tema')

@section('title', 'Datos de pago')

@section('header_type', 'gradient')

@section('css')
@endsection

@section('content')
<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading mb-0">
						<h2>Información de Pago</h2>
						<span>Solo faltan los datos de tu tarjeta para finalizar.</span>
					</div>
			 		<div class="account-popup pt-0 mt-0">		
			 			<form method="post" action="{{$formURL}}">
							@csrf
			 				<div class="row">
			 					<div class="col-lg-12">
			 						<span class="pf-title">Número de tarjeta de crédito</span>
			 						<div class="pf-field">
			 							<input type="text" name="billing-cc-number" placeholder="" class="requerido" maxlength="20" />
			 							<span class="e-message">campo obligatorio</span>
			 						</div>
			 					</div>
			 					<div class="col-lg-12">
			 						<span class="pf-title">Fecha de vencimiento (formato: mesaño)</span>
			 						<div class="pf-field">
			 							<input type="text" name="billing-cc-exp" placeholder="ej: 0323" class="requerido" maxlength="4" />
			 							<span class="e-message">campo obligatorio</span>
			 						</div>
			 					</div>
			 					<div class="col-lg-12">
			 						<span class="pf-title">CVV</span>
			 						<div class="pf-field">
			 							<input type="text" name="cvv"  class="requerido" maxlength="3" />
			 							<span class="e-message">campo obligatorio</span>
			 						</div>
			 					</div> 
			 					<div class="col-lg-12">
			 						<button type="submit" id="enviar-datos">Enviar datos</button>
			 					</div>
			 				</div>
			 			</form>
			 		</div>

				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	$(function(){
		$('.e-message').hide();

		$('#enviar-datos').click(function(event) {
			$('.e-message').hide();
			$('.requerido').each(function(){
				if($(this).val() == ''){
				event.preventDefault();
				$(this).siblings().show();
				}
			});
		});
	});
</script>
@endsection