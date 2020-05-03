@extends('layouts.tema')

@section('title', 'Mensajes')

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
								<h3>Todavia no tienes mensajes</h3>
								<span class="pr-0">Accede a los perfiles de Talentos Pro y Oro para intercambiar mensajes.</span>
							</div>
							<div class="simple-text-block">
								<a href="{{ url('talentos') }}" title="">Explora Talentos</a>
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