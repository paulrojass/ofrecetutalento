@extends('layouts.tema')

@section('title', 'Planes y precios')

@section('header_type', 'gradient')

@section('content')
<!-- <section>
	<div class="block no-padding  gray">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner2">
						<div class="inner-title2">
							<h3>Plans</h3>
							<span>Keep up to date with the latest news</span>
						</div>
						<div class="page-breacrumbs">
								<ul class="breadcrumbs">
									<li><a href="{{url('/')}}" title="">Inicio</a></li>
									<li><a title="">Como funciona</a></li>
								</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->

<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
						<h2>Conoce nuestros planes y paquetes</h2>
						<span>One of our jobs has some kind of flexibility option - such as telecommuting, a part-time schedule or a flexible or flextime schedule.</span>
					</div><!-- Heading -->
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
															@else
																	<i>$</i>{{$plan->monthly_price}}
															@endif
														</h2>
														<span>1 mes</span>
													</div>
													<ul>
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
															@else
																<i>$</i>{{$plan->quarterly_price}}
															@endif
														</h2>
														<span>3 meses</span>
													</div>
													<ul>
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
															@else
																	<i>$</i>{{$plan->annual_price}}
															@endif
														</h2>
														<span>1 año</span>
													</div>
													<ul>
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