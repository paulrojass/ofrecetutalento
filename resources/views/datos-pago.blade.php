@extends('layouts.tema')

@section('title', 'Datos del cliente')

@section('header_type', 'gradient')


@section('content')
<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
						<h2>Seleccionaste el plan @if($plan->id > 2)Talento @endif {{ $plan->name }} ({{ $periodo }})</h2>
						<span>Para culminar tu cambio de plan por favor verifica y completa tus datos para continuar.</span>
					</div>


			 		<div class="profile-form-edit">					
			 			<form method="post" action="{{ route('generar-form') }}">
							@csrf
			 				<input type="hidden" name="periodo" value="{{ $periodo }}">
			 				<input type="hidden" name="plan_id" value="{{ $plan->id }}">
			 				<div class="row">
			 					<div class="col-lg-6">
			 						<span class="pf-title">Nombres</span>
			 						<div class="pf-field">
			 							<input type="text" class="requerido" name="billing_address_first_name" placeholder="" value="{{ $usuario->name }}" />
	                                	<span class="e-message">campo obligatorio</span>

			 						</div>
			 					</div>
			 					<div class="col-lg-6">
			 						<span class="pf-title">Apellidos</span>
			 						<div class="pf-field">
			 							<input type="text" class="requerido" name="billing_address_last_name" placeholder="" value="{{ $usuario->lastname }}" />
	                                	<span class="e-message">campo obligatorio</span>
			 						</div>
			 					</div>
			 					<div class="col-lg-12">
			 						<span class="pf-title">Dirección</span>
			 						<div class="pf-field">
			 							<input type="text" class="requerido" name="billing_address_address1" placeholder="Dirección del cliente" value="{{ $usuario->address }}" />
	                                	<span class="e-message">campo obligatorio</span>
			 						</div>
			 					</div>
			 					<div class="col-lg-12">
			 						<span class="pf-title">Dirección 2 (opcional)</span>
			 						<div class="pf-field">
			 							<input type="text" name="billing_address_address2" value="" />
			 						</div>
			 					</div>
			 					<div class="col-lg-4">
			 						<span class="pf-title">Ciudad</span>
			 						<div class="pf-field">
			 							<input type="text" class="requerido" name="billing_address_city" placeholder="" value="{{ $usuario->city }}" />
	                                	<span class="e-message">campo obligatorio</span>
			 						</div>
			 					</div>
			 					<div class="col-lg-4">
			 						<span class="pf-title">Estado / Provincia</span>
			 						<div class="pf-field">
			 							<input type="text" class="requerido" name="billing_address_state" placeholder="" value="" />
	                                	<span class="e-message">campo obligatorio</span>
			 						</div>
			 					</div>
			 					<div class="col-lg-4">
			 						<span class="pf-title">País</span>
			 						<div class="pf-field">
			 							<select data-placeholder="Por favor seleccione su país" class="chosen" id="select-paises" name="billing_address_country">
											<option value="">-- Seleccione --</option>
												
											@foreach ($paises as $pais)
												<option value="{{$pais['Code']}}" @if($pais['Code']=='PA') selected @endif>{{$pais['Name']}}</option>
											@endforeach
										</select>
	                                	<span class="e-message" id="e-paises">Selecciona tu país</span>
			 						</div>
			 					</div>

			 					<div class="col-lg-3">
			 						<span class="pf-title">Zip / Postal (opcional)</span>
			 						<div class="pf-field">
			 							<input type="text" name="billing_address_zip" placeholder="" value="" />
			 						</div>
			 					</div>
			 					<div class="col-lg-3">
			 						<span class="pf-title">correo electrónico</span>
			 						<div class="pf-field">
			 							<input type="email" class="requerido" name="billing_address_email" placeholder="" value="{{ $usuario->email }}" />
	                                	<span class="e-message">campo obligatorio</span>
			 						</div>
			 					</div>
			 					<div class="col-lg-3">
			 						<span class="pf-title">Teléfono</span>
			 						<div class="pf-field">
			 							<input type="text" class="requerido" name="billing_address_phone" placeholder="" value="{{ $usuario->phone }}" />
		                                <span class="e-message">campo obligatorio</span>
			 						</div>
			 					</div>	 						 					
			 					<div class="col-lg-3">
			 						<span class="pf-title">Fax (opcional)</span>
			 						<div class="pf-field">
			 							<input type="text" name="billing_address_fax" placeholder="" value="" />
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
