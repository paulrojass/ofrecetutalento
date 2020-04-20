@extends('layouts.tema')

@section('title', 'Cambio de Plan')

@section('header_type', 'gradient')

@section('content')
<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
						<h2>Cambia tu plan</h2>
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
											@if($plan->id>1)
											<div class="col-lg-4">
												<form action='https://www.2checkout.com/checkout/purchase' method='post'>
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
													@if ($plan->id == auth()->user()->suscription->plan_id)
													<ul class="mb-4">
														<li>
															<strong>TU PLAN ACTUAL</strong>
														</li>
													</ul>
													@else
														@if($plan->id == 2)
															@if(auth()->user()->recommended->count() < $plan->recommendations)
																<ul class="mb-4">
																	<li>
																		<strong>TIENES {{ auth()->user()->recommended->count() }} RECOMENDACIONES</strong>
																	</li>
																</ul>
															@else
																<button type=button data-value="{{$plan->id}}" data-toggle="modal" data-target="#modal-plan-novato" name='button-novato' class="btn-submit-plan">
																	Talento {{$plan->name}}
																</button>
															@endif
														@else
															<input type='hidden' name='sid' value='250310269846' >
															<input type='hidden' name='mode' value='2CO' >
															<input type='hidden' name='li_0_type' value='product' >
															<input type='hidden' name='li_0_name' value='Talento {{ $plan->name }}' >
															<input type='hidden' name='li_0_product_id' value='{{ $plan->id }}' >
															<input type='hidden' name='li_0__description' value='Plan Talento {{ $plan->name }}, por un periodo MENSUAL en ofrecetutalento.com ' >
															<input type='hidden' name='li_0_price' value='{{ $plan->monthly_price }}' >
															<input type='hidden' name='li_0_tangible' value='N' >
															<input type='hidden' name='card_holder_name' value='Checkout Shopper' >
															<input type='hidden' name='street_address' value='{{ auth()->user()->address }}' >
															<input type='hidden' name='city' value='{{ auth()->user()->city }}' >
															<input type='hidden' name='country' value='{{ auth()->user()->country }}' >
															<input type='hidden' name='email' value='{{ auth()->user()->email }}' >
															<input type='hidden' name='phone' value='{{ auth()->user()->phone }}' >
															<button type=submit data-value="{{$plan->id}}" name='submit' data-plan="mensual" class="btn-submit-plan">
																Talento {{$plan->name}}
															</button>
														@endif
													@endif									
												</div>
												</form>
											</div>
											@endif
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
											@if($plan->id>1)
											<div class="col-lg-4">
												<form action='https://www.2checkout.com/checkout/purchase' method='post'>
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
													@if ($plan->id == auth()->user()->suscription->plan_id)
													<ul class="mb-4">
														<li>
															<strong>TU PLAN ACTUAL</strong>
														</li>
													</ul>
													@else
													<input type='hidden' name='sid' value='250310269846' >
													<input type='hidden' name='mode' value='2CO' >
													<input type='hidden' name='li_0_type' value='product' >
													<input type='hidden' name='li_0_name' value='Talento {{ $plan->name }}' >
													<input type='hidden' name='li_0_product_id' value='{{ $plan->id }}' >
													<input type='hidden' name='li_0__description' value='Plan Talento {{ $plan->name }}, por un periodo MENSUAL en ofrecetutalento.com ' >
													<input type='hidden' name='li_0_price' value='{{ $plan->monthly_price }}' >
													<input type='hidden' name='li_0_tangible' value='N' >
													<input type='hidden' name='card_holder_name' value='Checkout Shopper' >
													<input type='hidden' name='street_address' value='{{ auth()->user()->address }}' >
													<input type='hidden' name='city' value='{{ auth()->user()->city }}' >
													<input type='hidden' name='country' value='{{ auth()->user()->country }}' >
													<input type='hidden' name='email' value='{{ auth()->user()->email }}' >
													<input type='hidden' name='phone' value='{{ auth()->user()->phone }}' >													
													<button type="submit" data-value="{{$plan->id}}" data-plan="trimestral" class="btn-submit-plan">
														Talento {{$plan->name}}
													</button>
													@endif
												</div>
												</form>
											</div>
											@endif
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
											@if($plan->id>1)
											<div class="col-lg-4">
												<form action='https://www.2checkout.com/checkout/purchase' method='post'>
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
													@if ($plan->id == auth()->user()->suscription->plan_id)
													<ul class="mb-4">
														<li>
															<strong>TU PLAN ACTUAL</strong>
														</li>
													</ul>
													@else
													<input type='hidden' name='sid' value='250310269846' >
													<input type='hidden' name='mode' value='2CO' >
													<input type='hidden' name='li_0_type' value='product' >
													<input type='hidden' name='li_0_name' value='Talento {{ $plan->name }}' >
													<input type='hidden' name='li_0_product_id' value='{{ $plan->id }}' >
													<input type='hidden' name='li_0__description' value='Plan Talento {{ $plan->name }}, por un periodo ANUAL en ofrecetutalento.com ' >
													<input type='hidden' name='li_0_price' value='{{ $plan->monthly_price }}' >
													<input type='hidden' name='li_0_tangible' value='N' >
													<input type='hidden' name='card_holder_name' value='Checkout Shopper' >
													<input type='hidden' name='street_address' value='{{ auth()->user()->address }}' >
													<input type='hidden' name='city' value='{{ auth()->user()->city }}' >
													<input type='hidden' name='country' value='{{ auth()->user()->country }}' >
													<input type='hidden' name='email' value='{{ auth()->user()->email }}' >
													<input type='hidden' name='phone' value='{{ auth()->user()->phone }}' >													
													<button type="submit" data-value="{{$plan->id}}" data-plan="anual" class="btn-submit-plan">
														Talento {{$plan->name}}
													</button>
													@endif
												</div>
												</form>
											</div>
											@endif
										@endforeach
									</div>
								</div>
							</div>
						</div>
	
				</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--=================================  MODALS PARA ACEPTAR PLAN NOVATO -->
<section>
	<!-- Modal Idioma -->
	<div class="modal fade bd-example" id="modal-plan-novato" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content pt-4">
			<h3>Seleccionar Plan Novato</h3>
			<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
				<span class="close-popup"><i class="la la-close"></i></span>
			</button>
			<div class="modal-body">
				<div class="contact-edit pl-5 pr-5">
					<div class="row justify-content-center">
						<span class="pf-title text-center">Tienes {{ auth()->user()->recommended->count() }} recomendaciones, puedes activar este plan.</span>
						<form id="form-plan-novato" method="post" action={{ route('activar-plan') }}>
							@csrf
							<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
							<input type="hidden" name="plan_id" value="2">
							<div class="col text-center">
								<button type="submit" class="bbutton">
									Activar Plan Novato
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>	
</section>
<!--=================================  MODALS PARA ACEPTAR PLAN NOVATO -->
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