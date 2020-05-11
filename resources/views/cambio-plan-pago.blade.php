@extends('layouts.tema')

@section('title', 'Resultado de la Transacción')

@section('header_type', 'stick-top forsticky')

@section('css')

@endsection

@section('content')
<section>
	<div class="block no-padding">
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-featured-sec">
						<div class="new-slide">
							<img src="{{ url('tema/images/menu-suscripcion.jpg') }}" style="max-width: 100%" alt="" />
						</div>
						<div class="job-search-sec">
							<div class="job-search">
							@if ($resultado === 'aprobada')
								<h3>Se ha realizado un cambio de plan exitosamente</h3>
								<span class="pr-0">Nuevo Plan: Talento {{ $nueva_suscripcion->plan->name }}</span>
								<span class="pr-0">fecha de vencimiento: {{ $nueva_suscripcion->expiration_date->format('d / m / Y')}}</span>
								<span class="pr-0">Número de transacción: {{ $transaction_id }}</span>
								<span class="pr-0">Precio: ${{ $total }}</span>
							@else
								<h3>Hubo un error en la transacción:</h3>
								<span class="pr-0">El proceso de pago no fue ejecutado.</span>
								@if($respuesta)<span class="pr-0">Mensaje de respuesta: {{ $respuesta }}</span>@endif
							@endif
							</div>
							@if($resultado != 1)
							<div class="simple-text-block">
								<a href="{{ url('cambiar-plan') }}" title="">Volver a Cambio de Plan</a>
							</div>
							@endif
							<div class="simple-text-block">
								<a href="{{ url('mi-cuenta') }}" title="">Volver a Mi cuenta</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
@endsection