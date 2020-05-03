@extends('layouts.tema')

@section('title', 'Talento - '.$talent->title )

@section('header_type', 'stick-top style3')

@section('content')
<input type="hidden" name="talento_id" id="talento_id" value="{{ $talent->id }}">
@auth
<input type="hidden" name="auth_user" id="auth_user" value="{{ auth()->user()->id }}">
@endauth
<section class="overlape">
	<div class="block no-padding">
		<div data-velocity="-.1" style="background: url({{ url('tema/images/busca-talento.jpg') }}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE 1600x800-->
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner-header">
						<h3>{{ $talent->title }}</h3>
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
			 	<div class="col-lg-8 column">
			 		<div class="job-single-sec">
			 			<div class="job-single-head2">
			 				<div class="job-title2">
			 					@auth
				 					<div class="me-gusta">

				 					</div>
			 					@endauth
			 				</div>
			 				<span>
			 					<strong>Industria</strong> : {{$talent->category->industry->name}} /
			 					<strong>Categoria</strong> : {{$talent->category->name}}
			 				</span>
			 			<div class="job-details">
			 				<h3>Descripción</h3>
			 				<p>{{$talent->description}}</p>
			 			</div>

					 		<div class="job-single-head style2 mt-5 pb-0">
				 				@auth
								@if(auth()->user() != $talent->user)
				 				<a href="javascript:void(0)" data-toggle="modal" data-target="#modal-trato" title="" class="apply-job-btn"></i>Ofrecer trato</a>
				 				@endif
				 				@else
				 				<a href="{{url('suscripcion')}}" title="" class="apply-job-btn"></i>Registrate para ofrecer trato</a>
				 				@endauth
				 			</div>

			 			</div><!-- Job Head -->

			 		</div>
			 	</div>

			 	<div class="col-lg-4 column">
			 		<div class="job-single-head style2">
		 				<div class="job-thumb"> <img src="{{URL::asset('images/users/'.$talent->user->avatar)}}" style="max-width: 124px" alt="" /> </div>
		 				<div class="job-head-info">
		 					<h4>{{$talent->user->name}} {{$talent->user->lastname}}</h4>
		 					<p><i class="la la-map-marker"></i> {{$talent->user->city}}, {{$talent->user->country}}</p>
		 				</div>
		 			</div><!-- Job Head -->
			 	</div>
			</div>
		</div>
	</div>
</section>

@if($talent->exchanges->count()>0)
<section>
	<div class="block">
		<div class="container">
			 <div class="row">
			 	<div class="col-lg-12">
			 		<div class="blog-sec">
			 			<h5> Canjes Relacionados </h5>
						<div class="row" id="masonry">
							@foreach ($talent->exchanges as $exchange)
							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
								<div class="my-blog">
									<div class="blog-thumb">
										<a href="{{ url('canjes/'.$exchange->id) }}" title=""><img src="{{ URL::asset('images/exchanges/'.$exchange->image) }}" style="object-fit: cover; height: : 200px" alt="" /></a>{{-- 360x200 --}}
										<div class="blog-metas">
											<a href="{{ url('canjes/'.$exchange->id) }}" title="">{{ $exchange->created_at->format('d/m/Y') }}</a>
											<a href="{{ url('canjes/'.$exchange->id) }}" title="">{{ $exchange->dealings()->where('exchange_id',$talent->user->id)->count() }} Tratos</a>
										</div>
									</div>
									<div class="blog-details">
										<h3><a href="{{ url('canjes/'.$exchange->id) }}" title="">{{ $exchange->title }}</a></h3>
										<p class="text-truncate">{{ $exchange->description }}</p>
										<a href="{{ url('canjes/'.$exchange->id) }}" title="">Ver Canje<i class="la la-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endif


<section>
<!-- 	<div class="block"> -->
		<div class="container">
			<!-- Imagenes -->
			@if($imagenes->count() > 0)
			<section class="" id="div-image"></section>
			@endif

			<!-- Videos -->
			@if($videos->count() > 0)
 			<section class="" id="div-video"></section>
			@endif

			<!-- Pdfs -->
			@if($pdfs->count() > 0)
			<section class="mp-row" id="div-pdf"></section>		
			@endif
		</div>
<!-- 	</div> -->
</section>





{{-- MODALS  --}}

{{-- Agregar nuevo Trato de Talento --}}

<section id="div-modal-nuevo-trato">
	<div class="modal fade bd-example-modal" id="modal-trato" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content pt-4">
				<h3>Contratar este talento</h3>
				<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
					<span class="close-popup"><i class="la la-close"></i></span>
				</button>
				<div class="modal-body">
					<div class="contact-edit pl-5 pr-5">
						<form id="form-trato-talento" class="pl-0">
							<div class="col-lg-12">
								<p>
									Parece que has encontrado a quien estabas buscando. ¡Enoharbuena!
								</p>
								<p>
									Con el siguiente paso, nos gustaría recabar información detallada sobre el proyecto que requieres de este talento. Por favor trata de usar lenguaje abierto e informal para poder evitar malos entendidos. En esta étapa inicial queremos conocer tus expectativas como alguien que necesita de un producto o servicio de este talento.
								</p>
							</div>

							@csrf
							<input type="hidden" name="pay" id="pay" value="0">
							<input type="hidden" name="accept_id" id="accept_id" value="{{ $talent->user->id }}">
							<input type="hidden" name="propose_id" id="propose_id" value="@auth{{ auth()->user()->id }}@endauth">
							<div class="col-lg-12">
								<span class="pf-title">Nombre del proyecto</span>									
								<div class="pf-field">
									<input type="text" name="name" id="name" maxlength="100" required>
									<span class="form-error" id="e_name_pdf" hidden> Debe agregar un nombre válido</span>
								</div>
							</div>
							<div class="col-lg-12">
								<span class="pf-title">¿Cuál es el producto, servicio o beneficio final en su ​ mejor versión ​ que requieres de este talento?</span>									
								<div class="pf-field">
									<textarea id="description" name="description" placeholder="" required></textarea>
								</div>
							</div>
							<div class="col-lg-12">
								<span class="pf-title">Resultado Final Ideal: ¿Cuál es el producto, servicio o beneficio final en su ​ mejor versión ​ que requieres de este talento?”​ cuando lo recibas. (opcional)</span>									
								<div class="pf-field">
									<input type="text" name="ideal" id="ideal" maxlength="100" placeholder="" required>
								</div>
							</div>
							<div class="col-lg-12">
								<span class="pf-title">¿Cuál es el factor crítico de calidad en este proyecto? Descríbenos ese “ingrediente esencial” que necesita tener este proyecto para que tu digas ​“es un éxito”​ cuando lo recibas. (opcional)</span>
								<div class="pf-field">
									<input type="text" name="plus" id="plus" maxlength="100" placeholder="" required>
								</div>
							</div>

							<div class="col-lg-6">
								<span class="pf-title">¿Días aproximados para recibir el producto?</span>				
								<div class="pf-field">
									<input type="number" name="exchange_days" id="exchange_days" maxlength="100" required>
								</div>
							</div>


							<div class="col-lg-12">
								<span class="pf-title">Oferta económica:</span>			
							</div>
							<div class="col-lg-6">
								<span class="pf-title">Cantidad Total</span>
								<div class="pf-field">
									<input type="number" name="quantity" id="quantity" required  />
								</div>
							</div>


							<div class="col-lg-12">
								<span class="pf-title">Forma de pago</span>
							</div>

							<div class="pf-field">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="pay" id="tipo-pago" value="1" checked>
									<label class="form-check-label" for="tipo-pago">
										Realizar Pago
									</label>
								</div>
								@auth
								@if(auth()->user()->suscription->plan_id > 2)
								<div class="form-check">
									<input class="form-check-input" type="radio" name="pay" id="tipo-canje" value="0">
									<label class="form-check-label" for="tipo-canje">
										Ofrecer Canje
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="pay" id="tipo-propuesta" value="0">
									<label class="form-check-label" for="tipo-propuesta">
										Ofrecer nueva propuesta
									</label>
								</div>
								@endif
								@endauth
							</div>


							<div class="col-lg-6" id="div-pago" >
								<span class="pf-title">Pago: ¿Cuánto es tu presupuesto por 1 cantidad de este proyecto?</span>
								<div class="pf-field">
									<input type="number" name="value" id="value" required />
								</div>
							</div>

							<div class="col-lg-6" id="div-canje" style="display: none">
								<span class="pf-title">Mis Canjes</span>
								<div class="pf-field">
									<select id="proposal_id" name="proposal_id" data-placeholder="Selecciona tu canje" class="chosen" required>
										@auth
										@foreach(Auth()->user()->talents as $talent)
										@foreach($talent->exchanges as $exchange)
										<option value="{{$exchange->id}}">{{$exchange->title}}</option>
										@endforeach
										@endforeach
										@endauth
									</select>
								</div>
							</div>

							<div id="div-propuesta" style="display: none;">
								<div class="col-lg-12">
									<span class="pf-title">Nombre de su propuesta</span>									
									<div class="pf-field">
										<input type="text" name="name_proposal" id="name_proposal" maxlength="100" required>
										<span class="form-error" id="e_name_proposal" hidden> Debe agregar un nombre válido</span>
									</div>
								</div>

								<div class="col-lg-12">
									<span class="pf-title">¿Cuál es el producto, servicio o beneficio final en su ​ mejor versión ​ que propones a este talento?</span>									
									<div class="pf-field">
										<textarea id="description_proposal" name="description_proposal" placeholder="" required></textarea>
									</div>
								</div>
							</div>


							<div class="col-lg-6" id="div-tiempo" style="display: none;">
								<span class="pf-title">Días para culminar mi propuesta</span>
								<div class="pf-field">
									<input type="number" name="proposal_days" id="proposal_days" required>
								</div>
							</div>

							<div class="alert alert-success mt-4" role="alert" id="alert-trato">
								Propuesta enviada
							</div>

							<div class="alert alert-danger mt-4" role="alert" id="alert-error">
								Revise el formato de los campos, todos son obligatorios
							</div>

							<div class="col-lg-12">
								<div class="float-right">
									<button type="button" data-dismiss="modal" class="bbutton ml-4">Cancelar</button>
									<button type="submit" class="bbutton  ml-4" id="boton-nuevo-trato-talento">Ofrecer Trato</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
{{-- Agregar nuevo Trato de Talento --}}
@endsection
@section('scripts')
<script src="{{URL::asset('js/talento-single.js')}}" type="text/javascript"></script>
@endsection

@section('footer')
	@include('includes.footer')
@endsection