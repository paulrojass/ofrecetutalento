@extends('layouts.tema')

@section('title', 'Cambio de plan por vencimiento')

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
							<!-- <img src="http://placehold.it/1920x800" alt="" /> -->
							<img src="{{ url('tema/images/menu-suscripcion.jpg') }}" style="max-width: 100%" alt="" />
						</div>
						<div class="job-search-sec">
							<div class="job-search">
								<h3>¡Tu Plan ha expirado!</h3>
								<span class="pr-0">La suscripción a tu plan anterior sobrepaso el tiempo fijado, por lo tanto has retornado a Caza Talento</span>
								<span class="pr-0">Fecha de expiración de plan Caza Talento: Indefinido</span>
								<span class="pr-0">Puedes seguir disfrutando de tu plan anterior a través de una nueva sucripción, haciendo clic en Cambio de plan, de lo contrario sigues disfrutando de los servicios disponibles para Caza Talento.
								</span>
							</div>
							<div class="simple-text-block">
								<a class="ml-2 mr-2" href="{{ url('cambiar-plan') }}" title="">Cambio de plan</a>
								<a class="ml-2 mr-2" href="{{ url('mi-cuenta') }}" title="">Volver a Mi cuenta</a>
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