@extends('layouts.tema')

@section('title', 'Planes y precios')

@section('header_type', 'gradient')

@section('content')
<section>
	<div class="block no-padding">
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-featured-sec">
						<div class="new-slide-3" style="top:-110px">
							<img src="{{ url('tema/images/menu-suscripcion.jpg') }}" style="height: 80%" alt="" />{{-- 600x500 --}}
						</div>
						<div class="job-search-sec">
							<div class="job-search">
								<h3 style="color: #202020; text-align: left;">Planes y Suscripción</h3>
								<span style="color: #888888; text-align: left;">Este es el directorio de los TOP talentos de Latinoamérica.<br/> Los siguientes planes te permiten crear un perfil y cargar fotos o videos que puedan validar tus talentos. Escoge el plan que más se adapte a tú necesidad para empezar a exponer tus talentos a nuestra comunidad.</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
<!-- 					<div class="heading">
	
</div> --><!-- Heading -->
					<div class="tab-sec">
						<ul class="nav nav-tabs">
						  <li><a class="bbutton current" data-tab="mensual">Mensual</a></li>
						  <li><a class="bbutton" data-tab="trimestral">Trimestral</a></li>
						  <li><a class="bbutton" data-tab="anual">Anual</a></li>
						</ul>
						<div id="mensual" class="tab-content current pt-4">
							<div class="job-listings-tabs">

								<div class="plans-sec">
									<div class="row">
										@foreach($plans as $plan)
											<div class="col-lg-3">
												<div class="pricetable"> 
													<div class="pricetable-head">
														<h3>
														@if ( $plan->id > 1 )
															Talento 
														@endif
														{{$plan->name}}
														</h3>
														<h2>
															@if(is_null($plan->monthly_price))
																Gratis
															@elseif($plan->monthly_price == 0)
																<i>{{ $plan->recommendations }} RECOMENDACIONES</i>
															@else
																<i>$</i>{{$plan->monthly_price}}
															@endif
														</h2>
														@if($plan->monthly_price == 0)
														<span>Indefinido</span>
														@else
														<span>1 mes</span>
														@endif
													</div>
													<ul>
														<li><strong>@if ( $plan->id > 1 )Te permite cargar a tu perfil lo siguiente:@endif</strong></li>
														<li>
															@if(is_null($plan->talents)) Talentos ilimitados
															@else
																@if($plan->talents != 0) {{$plan->talents}} Talentos
																@endif
															@endif
														</li>
														<li>
															@if(is_null($plan->photos)) Fotos ilimitadas
															@else
																@if($plan->photos != 0) {{$plan->photos}} Fotos
																@endif
															@endif
														</li>
														<li>
															@if(is_null($plan->videos)) Videos ilimitadas
															@else
																@if($plan->videos != 0) {{$plan->videos}} Videos
																@endif
															@endif
														</li>
														<li>
															@if(is_null($plan->pdfs)) Pdfs ilimitados ({{$plan->pdf_size}} Mb)
															@else
																@if($plan->pdfs != 0) {{$plan->pdfs}} Pdfs ({{$plan->pdf_size}} Mb)
																@endif
															@endif
														</li>
														@if ($plan->id == 1)
														<li>Te permite navegar y hacer tratos con los talentos de nuestra comunidad</li>
														<li></li>
														<li></li>
														@endif
														@if ($plan->id == 2)
														<li>Disponible por recomendación únicamente</li>
														<li>Exclusivo para Talentos con 10 años mínimo de experiencia</li>
														<li>Recomendamos mínimo 3 años de experiencia Gerencial</li>
														@endif
														@if ($plan->id > 2)
														<li><strong>Acceso a base de datos Canjea tu Talento para realizar trueques entre usuarios</strong></li>
														<li></li>
														<li></li>
														@endif
													</ul>
												</div>
											</div>
										@endforeach
									</div>
								</div>									

							</div>
						</div>
						<div id="trimestral" class="tab-content pt-4">
							<div class="job-listings-tabs">
								<div class="plans-sec">
									<div class="row">
										@foreach($plans as $plan)
											<div class="col-lg-3">
												<div class="pricetable"> 
													<div class="pricetable-head">
														<h3>
														@if ( $plan->id > 1 )
															Talento 
														@endif
														{{$plan->name}}
														</h3>
														<h2>
															@if(is_null($plan->quarterly_price))
																Gratis
															@elseif($plan->quarterly_price == 0)
																<i>{{ $plan->recommendations }} RECOMENDACIONES</i>
															@else
																<i>$</i>{{$plan->quarterly_price}}
															@endif
														</h2>
														@if($plan->quarterly_price == 0)
														<span>Indefinido</span>
														@else
														<span>3 meses</span>
														@endif
													</div>
													<ul>
														<li><strong>@if ( $plan->id > 1 )Te permite cargar a tu perfil lo siguiente:@endif</strong></li>
														<li>
															@if(is_null($plan->talents)) Talentos ilimitados
															@else
																@if($plan->talents != 0) {{$plan->talents}} Talentos
																@endif
															@endif
														</li>
														<li>
															@if(is_null($plan->photos)) Fotos ilimitadas
															@else
																@if($plan->photos != 0) {{$plan->photos}} Fotos
																@endif
															@endif
														</li>
														<li>
															@if(is_null($plan->videos)) Videos ilimitadas
															@else
																@if($plan->videos != 0) {{$plan->videos}} Videos
																@endif
															@endif
														</li>
														<li>
															@if(is_null($plan->pdfs)) Pdfs ilimitados ({{$plan->pdf_size}} Mb)
															@else
																@if($plan->pdfs != 0) {{$plan->pdfs}} Pdfs ({{$plan->pdf_size}} Mb)
																@endif
															@endif
														</li>
														@if ($plan->id == 1)
														<li>Te permite navegar y hacer tratos con los talentos de nuestra comunidad</li>
														<li></li>
														<li></li>
														@endif
														@if ($plan->id == 2)
														<li>Disponible por recomendación únicamente</li>
														<li>Exclusivo para Talentos con 10 años mínimo de experiencia</li>
														<li>Recomendamos mínimo 3 años de experiencia Gerencial</li>
														@endif
														@if ($plan->id > 2)
														<li><strong>Acceso a base de datos Canjea tu Talento para realizar trueques entre usuarios</strong></li>
														<li></li>
														<li></li>
														@endif
													</ul>
												</div>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						<div id="anual" class="tab-content pt-4">
							<div class="job-listings-tabs">

								<div class="plans-sec">
									<div class="row">
										@foreach($plans as $plan)
											<div class="col-lg-3">
												<div class="pricetable"> 
													<div class="pricetable-head">
														<h3>
														@if ( $plan->id > 1 )
															Talento 
														@endif
														{{$plan->name}}
														</h3>
														<h2>
															@if(is_null($plan->annual_price))
																Gratis
															@elseif($plan->annual_price == 0)
																<i>{{ $plan->recommendations }} RECOMENDACIONES</i>
															@else
																<i>$</i>{{$plan->annual_price}}
															@endif
														</h2>
														@if($plan->annual_price == 0)
														<span>Indefinido</span>
														@else
														<span>1 año</span>
														@endif
													</div>
													<ul>
														<li><strong>@if ( $plan->id > 1 )Te permite cargar a tu perfil lo siguiente:@endif</strong></li>
														<li>
															@if(is_null($plan->talents)) Talentos ilimitados
															@else
																@if($plan->talents != 0) {{$plan->talents}} Talentos
																@endif
															@endif
														</li>
														<li>
															@if(is_null($plan->photos)) Fotos ilimitadas
															@else
																@if($plan->photos != 0) {{$plan->photos}} Fotos
																@endif
															@endif
														</li>
														<li>
															@if(is_null($plan->videos)) Videos ilimitadas
															@else
																@if($plan->videos != 0) {{$plan->videos}} Videos
																@endif
															@endif
														</li>
														<li>
															@if(is_null($plan->pdfs)) Pdfs ilimitados ({{$plan->pdf_size}} Mb)
															@else
																@if($plan->pdfs != 0) {{$plan->pdfs}} Pdfs ({{$plan->pdf_size}} Mb)
																@endif
															@endif
														</li>
														@if ($plan->id == 1)
														<li>Te permite navegar y hacer tratos con los talentos de nuestra comunidad</li>
														<li></li>
														<li></li>
														@endif
														@if ($plan->id == 2)
														<li>Disponible por recomendación únicamente</li>
														<li>Exclusivo para Talentos con 10 años mínimo de experiencia</li>
														<li>Recomendamos mínimo 3 años de experiencia Gerencial</li>
														@endif
														@if ($plan->id > 2)
														<li><strong>Acceso a base de datos Canjea tu Talento para realizar trueques entre usuarios</strong></li>
														<li></li>
														<li></li>
														@endif
													</ul>
												</div>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
{{-- 
<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 column">
					<div class="job-single-sec">
						<div class="job-details">
							<h3>Caza Talentos</h3>
							<ul>
								<li>Te permite navegar y hacer tratos con los talentos de nuestra comunidad</li>
							</ul>
							<h3>Talento Novato</h3>
							<ul>
								<li>Disponible por recomendación únicamente</li>
								<li>Exclusivo para Talentos con 10 años mínimo de experiencia</li>
								<li>Recomendamos mínimo 3 años de experiencia Gerencial</li>
							</ul>
							<h3>Talento Pro</h3>
							<ul>
								<li>Disponible por recomendación únicamente</li>
								<li>Exclusivo para Talentos con 10 años mínimo de experiencia</li>
								<li>Recomendamos mínimo 3 años de experiencia Gerencial</li>
							</ul>
							<h3>Talento Novato</h3>
							<ul>
								<li>Disponible por recomendación únicamente</li>
								<li>Exclusivo para Talentos con 10 años mínimo de experiencia</li>
								<li>Recomendamos mínimo 3 años de experiencia Gerencial</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>--}}
@endsection


@section('scripts')
<script>
	$(function() {
		$(".pricetable").mouseover(function(event){
			$(this).addClass("active");
		});
		$(".pricetable").mouseout(function(event){
			$(this).removeClass("active");
		});
	});
</script>
@endsection


@section('footer')
	@include('includes.footer')
@endsection