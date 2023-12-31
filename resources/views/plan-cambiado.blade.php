@extends('layouts.tema')

@section('title', 'Cambio de plan')

@section('header_type', 'stick-top forsticky')

@section('css')

@endsection

@section('content')
@php($fecha = new Date($suscription->expiration_date))
<section>
	<div class="block no-padding">
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-featured-sec">
						<div class="new-slide">
							<!-- <img src="http://placehold.it/1920x800" alt="" /> -->
							<img src="{{ url('tema/images/menu-suscripcion.jpg') }}" style="max-width: 100%" alt="" />
						</div>
						<div class="job-search-sec">
							<div class="job-search">
								<h3>Se ha realizado un cambio de plan exitosamente</h3>
								<span class="pr-0">Nuevo plan adquirido: Talento {{ $suscription->plan->name }}</span>
								<span class="pr-0">Fecha de expiración:
									@if($suscription->expiration_date)
										{{ $fecha->format('d / m / Y') }}
									@else
										Indefinido
									@endif
								</span>
								@if($request->order_number)
								<span class="pr-0">Precio: ${{ $request->total }}</span>
								<span class="pr-0">número de orden: {{ $request->order_number }}</span>
								@endif
							</div>
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