@extends('layouts.tema')

@section('title',  $user->name.' '.$user->lastname)

@section('header_type', 'stick-top style3')

@section('content')
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url({{ url('tema/images/como-funciona.jpg') }}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE 1600x800-->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<div class="container">
								<div class="row">
									<div class="col-lg-6">
									</div>
									<div class="col-lg-6">
										@auth
										@if(auth()->user()->id != $user->id && auth()->user()->suscription->plan_id > 2)
										<div class="action-inner" id="div-recommended">

										</div>
										@endif
										@endauth
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="overlape">
		<div class="block remove-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="cand-single-user">
							<div class="share-bar circle">
							<!--
							<a href="#" title="" class="share-google"><i class="la la-google"></i></a>
							<a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a>
							<a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a> -->
				 			</div>
				 			<div class="can-detail-s">
				 				<div class="cst"><img src="{{URL::asset('images/users/'.$user->avatar)}}" alt="" /></div>
				 				<h3>{{ $user->name }} {{ $user->lastname }}</h3>
				 				<span>
				 					<i>
										@if($user->suscription->plan->id > 1)
										Talento
										@endif
										{{$user->suscription->plan->name}}
									</i> en Ofrece tu talento
								</span>
				 				<!-- <p>{{ $user->email }}</p> -->
				 				<p>Miembro desde, {{ \Carbon\Carbon::parse($user->created_at)->format('Y')}} </p>
				 				<p><i class="la la-map-marker"></i>{{ $user->city }}, {{ $user->country }}</p>
				 				
				 			</div>

				 			<div class="download-cv estrellas">
							@if($user->suscription->plan_id > 2)
							<div class="star-rating">
								<span class="la la-star-o" data-rating="1" style="color:#ff9200"></span>
								<span class="la la-star-o" data-rating="2" style="color:#ff9200"></span>
								<span class="la la-star-o" data-rating="3" style="color:#ff9200"></span>
								<span class="la la-star-o" data-rating="4" style="color:#ff9200"></span>
								<span class="la la-star-o" data-rating="5" style="color:#ff9200"></span>
								<p>{{ $evaluadores }} valoraciones</p>
								<input type="hidden" name="whatever1" id="rating" class="rating-value" value="{{ $valoracion }}">
							</div>
							@endif
				 			</div> 
				 		</div>
				 		<div class="job-single-head style2 mt-3 pb-0">
			 				@auth
							@if(auth()->user()->id != $user->id)
			 				<a href="javascript:void(0)" data-toggle="modal" data-target="#modal-trato" title="" class="apply-job-btn"></i>Ofrecer trato</a>
			 				@endif
			 				@else
			 				<a href="{{route('register')}}" title="" class="apply-job-btn"></i>Registrate para ofrecer trato</a>
			 				@endauth

			 			</div>


				 		<ul class="cand-extralink">
				 			<li><a href="#informacion" title="">Información personal</a></li>

				 			@if($user->talents->count() > 0)
				 			<li><a href="#talentos" title="">Talentos</a></li>
				 			@endif
			 			
				 			
				 			@if($user->talents->count() > 0)
				 			<li><a href="#comentarios" title="">Comentarios</a></li>
				 			@endif
							
				 			@auth
							@if((auth()->user()->suscription->plan_id > 2)&&(auth()->user()->id != $user->id)&&($user->suscription->plan_id > 2))

				 				<li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-message" title=""><strong>Enviar Mensaje</strong></a></li>
				 			@endif
				 			
				 			@endauth
				 		</ul>

				 		<div class="cand-details-sec" id="informacion-general">
				 			<div class="row">
			 					<div class="cand-details mr-5 ml-5" id="informacion">
			 						<h2 class="text-center pb-4">Solución y beneficio que ofrezco a mis clientes</h2>
			 						<p class="text-center">{{ $user->abilities }}</p>
			 					</div>

				 				<div class="col-lg-9 column">
			 						<div class="cand-details" id="experience">
			 							<h2>Experiencia Laboral</h2>

			 							@if($user->experiences->position1)
			 							<div class="edu-history style2">
			 								<i></i>
			 								<div class="edu-hisinfo">
			 									<h3>{{ $user->experiences->position1 }} <span>{{ $user->experiences->company1 }}</span></h3>
			 									<i>{{ \Carbon\Carbon::parse($user->experiences->start_date1)->format('Y')}} - 
			 										{{ \Carbon\Carbon::parse($user->experiences->due_date1)->format('Y')}} </i>
			 									<p>{{ $user->experiences->achievements1 }} </p>
			 								</div>
			 							</div>
			 							@endif
			 							@if($user->experiences->position2)
			 							<div class="edu-history style2">
			 								<i></i>
			 								<div class="edu-hisinfo">
			 									<h3>{{ $user->experiences->position2 }} <span>{{ $user->experiences->company2 }}</span></h3>
			 									<i>{{ \Carbon\Carbon::parse($user->experiences->start_date2)->format('Y')}} - 
			 										{{ \Carbon\Carbon::parse($user->experiences->due_date2)->format('Y')}} </i>
			 									<p>{{ $user->experiences->achievements2 }} </p>
			 								</div>
			 							</div>
			 							@endif
			 							@if($user->experiences->position3)
			 							<div class="edu-history style2">
			 								<i></i>
			 								<div class="edu-hisinfo">
			 									<h3>{{ $user->experiences->position3 }} <span>{{ $user->experiences->company3 }}</span></h3>
			 									<i>{{ \Carbon\Carbon::parse($user->experiences->start_date3)->format('Y')}} - 
			 										{{ \Carbon\Carbon::parse($user->experiences->due_date3)->format('Y')}} </i>
			 									<p>{{ $user->experiences->achievements3 }} </p>
			 								</div>
			 							</div>
			 							@endif
			 						</div>
			 					</div>
			 					<div class="col-lg-3 column">
									<div class="border-title mt-2">
										<h3>Idiomas</h3>
									</div>
									@if($user->languages->count() > 0)
										@foreach($user->languages as $language)
											<div class="progress-sec">
												<span class="mb-4">{{ $language->language }}</span>
												@php($porcentaje = $language->level * 10)
												<div class="progressbar">
													<div class="progress" style="width: {{$porcentaje}}%">
														<span>{{$language->level}}</span>
													</div>
												</div>
											</div>
										@endforeach
									@else
										<p>No hay idiomas agreagados</p>
									@endif
			 					</div>

								@if($user->talents->count() > 0)
								<section id="talentos">
									<div class="block">
										<div class="container">
											<div class="row">
												<div class="col-lg-12">
													<div class="heading">
														<h2>Talentos</h2>
														<!-- <span>Conoce sus .</span> -->
													</div><!-- Heading -->
													<div class="job-listings-sec">
														@foreach($user->talents as $talent)
														<div class="job-listing pl-4">
															<div class="job-title-sec">
																<!-- <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div> -->
																<h3><a href="{{ url('talento/'.$talent->id) }}" title="">{{ $talent->title }}</a></h3>
																<span >{{ $talent->exchanges->count()}} Canjes</span></br>
																<span style="color:#888888">{{ $talent->description }}</span>
															</div>
															<span class="job-lctn"></span>
															<span class="job-lctn">{{ $talent->category->industry->name }} / {{ $talent->category->name }}</span>
															<!-- <span class="fav-job"><i class="la la-heart-o"></i></span> -->
															<a href="{{ url('talento/'.$talent->id) }}" title=""><span class="job-is ft">VER MAS</span></a>
														</div><!-- Job -->
														@endforeach
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
								@endif
								
			 					<div class="col-lg-12 mt-5" id="comentarios">
			 						<div class="cand-details">
								 		<div class="comment-sec estrellas" id="div-comentarios">

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

<section id="div-modal-send-message">
	<div class="modal fade bd-example-modal" id="modal-message" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content pt-4">
			<!-- <h3>Cambiar información del Pdf</h3> -->
			<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
				<span class="close-popup"><i class="la la-close"></i></span>
			</button>
			<div class="modal-body">
				<div class="contact-edit pl-5 pr-5">
					<div class="row">
					<div class="alert alert-light" role="alert" id="alert-message">
					  El mensaje a {{ $user->name }} {{ $user->lastname }} ha sido enviado
					</div>

					@auth
						@if((auth()->user()->suscription->plan_id > 2)&&(auth()->user()->id != $user->id)&&($user->suscription->plan_id > 2))
					 		<div class="quick-form-job" >
					 			<h3>Enviar Mensaje</h3>
					 			<form id="form-message">
					 				<input type="hidden" name="from_id" id="from_id" value={{ auth()->user()->id }}>
					 				<input type="hidden" name="to_id" id="to_id" value={{ $user->id }}>
					 				<textarea id="body" name="body" placeholder="Envia un mensaje directo a {{ $user->name }} {{ $user->lastname }}"></textarea>
					 				<button id="button-enviar" class="button">enviar</button>
					 			</form>
					 		</div>
				 		@endif
					@endauth					
					</div>
				</div>
			</div>
<!-- 			<div class="modal-footer">
	<button type="button" data-dismiss="modal" class="boton-normal">Cerrar</button>
	<button type="button" class="boton-normal" id="b-editar-pdf">Guardar</button>
</div> -->
		</div>
	  </div>
	</div>	
</section>

<section id="div-modal-nuevo-trato">
	<div class="modal fade bd-example-modal" id="modal-trato" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content pt-4">
				<h3>Proponer un trato</h3>
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
							<input type="hidden" name="accept_id" id="accept_id" value="{{ $user->id }}">
							<input type="hidden" name="propose_id" id="propose_id" value="@auth{{ auth()->user()->id }}@endauth">
							<div class="col-lg-12">
								<span class="pf-title">Nombre del proyecto</span>									
								<div class="pf-field">
									<input type="text" name="name" id="name" maxlength="100" required>
									<span class="form-error" id="e_name_pdf" hidden> Debe agregar un nombre válido</span>
								</div>
							</div>
							<div class="col-lg-12">
								<span class="pf-title">Descripción: Cuentanos en tus palabras el cómo esta estructurado este producto, servicio o beneficio</span>									
								<div class="pf-field">
									<textarea id="description" name="description" placeholder="" required></textarea>
								</div>
							</div>
							<div class="col-lg-12">
								<span class="pf-title">Resultado Final Ideal: ¿Cuál es el producto, servicio o beneficio final en su ​<srong>mejor versión</srong> ​ que requieres de este talento? (opcional)</span>									
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

							<div class="alert alert-success mt-4" role="alert" id="alert-espere">
								Enviando propuesta, por favor espere...
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
<!-- 				
<div class="modal-footer">
</div> -->
			</div>
		</div>
	</div>	
</section>


@endsection

@section('scripts')
<script>
$(function(){
	var user_id = '{{ $user->id }}';
	var auth_user = '@auth {{ auth()->user()->id }} @endauth';
	actualizarComentarios(user_id);

	if(auth_user)actualizarRecomendacion(user_id, 0);


	$(".alert").hide();


	function actualizarRecomendacion(user_id, cambiar){
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			url: '/actualizar-recomendado',
			type: 'POST',
			data: {cambiar: cambiar, user_id: user_id, _token: "{{ csrf_token() }}"},
		})
		.done(function(response) {
			$('#div-recommended').html(response);
		})
		.fail(function() {
			console.log("error");
		});
	}

	$('#div-recommended').on('click', '.a-recomendar', function(){
		actualizarRecomendacion(user_id, 1)
	} );


	/*  Enviar Mensjes */		
	$('#button-enviar').click(function(e){
		e.preventDefault();
		var datos = $('#form-message').serialize();
		$.ajax({
			url: '/enviar-mensaje-perfil',
			type: 'GET',
			data: datos,
			contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
			processData: false // NEEDED, DON'T OMIT THIS
		})
		.done(function() {
			$("#alert-message").fadeTo(2000, 500).slideUp(500, function(){
			    $("#alert-message").slideUp(1000);
			    $('#modal-message').modal('hide');
				$("#form-message")[0].reset();
			});
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {

		});
	});

	/*  Enviar Mensjes */

	$('#boton-nuevo-trato-talento').click(function(event) {
		event.preventDefault();
		$('#alert-espere').show();
		var dataString = $('#form-trato-talento').serialize();
		$.ajax({
			url: '/nuevo-trato-talento',
			type: 'get',
			data: dataString,
			contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
			processData: false // NEEDED, DON'T OMIT THIS
		})
		.done(function(response) {
			if(response.errors){
				$('#alert-espere').hide();

				$("#alert-error").fadeTo(2000, 500).slideUp(500, function(){
				    $("#alert-error").slideUp(1000);
				});
      		}else{
      			$('.alert-danger').hide();
				$('#alert-espere').hide();


				$("#alert-trato").fadeTo(2000, 500).slideUp(500, function(){
				    $("#alert-trato").slideUp(1000);
				    $('#modal-trato').modal('hide');
					$("#form-trato-talento")[0].reset();
				});

      		}
		});
	});

	/*================================== RATING ==========================*/


	var $star_rating = $('div.estrellas .star-rating .la');

	var SetRatingStar = function() {		
	  return $star_rating.each(function() {
	    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
	      return $(this).removeClass('la-star-o').addClass('la-star');
	    } else {
	      return $(this).removeClass('la-star').addClass('la-star-o');
	    }
	  });
	};

	/*$('#valoracion').on('click', '.star-rating .la', function() {*/
	/*		
	$star_rating.on('click', function() {
	  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
	  return SetRatingStar();
	});*/

	//$('div.estrellas').on('ready', $star_rating, SetRatingStar);
	SetRatingStar();

	/*================================== RATING ==========================*/
	$('#div-comentarios').on('click', '.a-responder', function(e){
		e.preventDefault();
		var clickeado = $(this).data('responder');
		$('#respuesta'+clickeado).slideDown('slow', function(){
			$('#textarea-respuesta'+clickeado).focus();
		});
	});

	$('#div-comentarios').on('click', '.b-publicar-respuesta', function(e){
		e.preventDefault();
		var comentario = $(this).data('value');
		var responde = $(this).data('evaluado');
		agregarRespuesta(comentario, responde);
	});

	function actualizarComentarios(user_id){
		$.ajax({
			url: '/actualizar-comentarios-perfil',
			type: 'get',
			data: {user_id : user_id},
			dataType: 'html',
		})
		.done(function(data) {
			$('#div-comentarios').html(data);
		});
	}

	function agregarRespuesta(comentario_id, responde){
		var comentario = $('#textarea-respuesta'+comentario_id).val();
		if (comentario != ''){
			$.ajax({
				url: '/agregar-respuesta',
				type: 'get',
				data: { comment:comentario, replyto:comentario_id, evaluated_id:responde, user_id:responde},
				dataType: 'html',
			})
			.done(function(data) {
				$('#div-comentarios').html(data);
			});		
		}
	}

	$('#modal-trato').on('show.bs.modal', function (e) {
		$('#form-trato-talento')[0].reset();
		$('.alert').hide();
		$('#div-pago').show();
		$('#div-canje').hide();
		$('#div-propuesta').hide();
		$('#div-tiempo').hide();
	});

	$('#tipo-pago').click(function () {
		$('#div-pago').show();
		$('#div-canje').hide();
		$('#div-propuesta').hide();
		$('#div-tiempo').hide();
		$('#proposal_id').val('');
	});
	$('#tipo-canje').click(function () {
		$('#div-pago').hide();
		$('#div-canje').show();
		$('#div-propuesta').hide();
		$('#div-tiempo').show();
	});
	$('#tipo-propuesta').click(function(){
		$('#div-pago').hide();
		$('#div-canje').hide();
		$('#div-propuesta').show();
		$('#div-tiempo').show();
		$('#proposal_id').val('');
	});
});
</script>
@endsection

@section('footer')
	@include('includes.footer')
@endsection
