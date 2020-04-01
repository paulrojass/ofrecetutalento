@extends('layouts.tema')

@section('title', 'Perfil de usuario')

@section('header_type', 'stick-top style3')

@section('content')
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(https://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<div class="container">
								<div class="row">
									<div class="col-lg-6">
									</div>
									<div class="col-lg-6">
										<div class="action-inner">
											<!-- <a href="#" title=""><i class="la la-envelope-o"></i>Contact David</a> -->
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
				 				<span><i>Usuario {{$user->suscription->plan->name}}</i> en Ofrece tu talento</span>
				 				<p>{{ $user->email }}</p>
				 				<p>Miembro desde, {{ \Carbon\Carbon::parse($user->created_at)->format('Y')}} </p>
				 				<p><i class="la la-map-marker"></i>{{ $user->city }}, {{ $user->country }}</p>
				 			</div>
				 			<div class="download-cv">
				 				<!-- <a href="#" title="">Download CV <i class="la la-download"></i></a> -->
				 			</div>


				 		</div>
				 		<div class="job-single-head style2 mt-5 pb-0">
			 				@auth
							@if(auth()->user()->id != $user->id)
			 				<a href="javascript:void(0)" data-toggle="modal" data-target="#modal-trato" title="" class="apply-job-btn"></i>Ofrecer trato</a>
			 				@endif
			 				@else
			 				<a href="{{url('suscripcion')}}" title="" class="apply-job-btn"></i>Registrate para ofrecer trato</a>
			 				@endauth
			 			</div>

				 		<ul class="cand-extralink">
				 			<li><a href="#abilities" title="">habilidades</a></li>
				 			@if($user->talents->count() > 0)
				 			<li><a href="#talentos" title="">Talentos</a></li>
				 			@endif
				 			@auth
							@if((auth()->user()->suscription->plan_id > 2)&&(auth()->user()->id != $user->id)&&($user->suscription->plan_id > 2))

				 				<li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-message" title="">Enviar Mensaje</a></li>
				 				@endif
				 			@endauth
				 		</ul>




				 		<div class="cand-details-sec" id="informacion-general">
				 			<div class="row">
			 					<div class="cand-details mr-5 ml-5" id="abilities">
			 						<h2 class="text-center pb-4">Descripción de habilidades</h2>
			 						<p>{{ $user->abilities }}</p>
			 					</div>

				 				<div class="col-lg-9 column">
			 						<div class="cand-details" id="experience">
			 							<h2>Experiencia en trabajos</h2>
			 							<div class="edu-history style2">
			 								<i></i>
			 								<div class="edu-hisinfo">
			 									<h3>{{ $user->experiences->position1 }} <span>{{ $user->experiences->company1 }}</span></h3>
			 									<i>{{ \Carbon\Carbon::parse($user->experiences->start_date1)->format('Y')}} - 
			 										{{ \Carbon\Carbon::parse($user->experiences->due_date1)->format('Y')}} </i>
			 									<p>{{ $user->experiences->achievements1 }} </p>
			 								</div>
			 							</div>

			 							<div class="edu-history style2">
			 								<i></i>
			 								<div class="edu-hisinfo">
			 									<h3>{{ $user->experiences->position2 }} <span>{{ $user->experiences->company2 }}</span></h3>
			 									<i>{{ \Carbon\Carbon::parse($user->experiences->start_date2)->format('Y')}} - 
			 										{{ \Carbon\Carbon::parse($user->experiences->due_date2)->format('Y')}} </i>
			 									<p>{{ $user->experiences->achievements2 }} </p>
			 								</div>
			 							</div>

			 							<div class="edu-history style2">
			 								<i></i>
			 								<div class="edu-hisinfo">
			 									<h3>{{ $user->experiences->position3 }} <span>{{ $user->experiences->company3 }}</span></h3>
			 									<i>{{ \Carbon\Carbon::parse($user->experiences->start_date3)->format('Y')}} - 
			 										{{ \Carbon\Carbon::parse($user->experiences->due_date3)->format('Y')}} </i>
			 									<p>{{ $user->experiences->achievements3 }} </p>
			 								</div>
			 							</div>
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
			 					<div class="col-lg-12 mt-5" id="talentos">
			 						<div class="cand-details">
			 							<h2 class="text-center pt-5">Talentos</h2>
								 		<div class="manage-jobs-sec">
								 		<!--	
									 			<div class="extra-job-info">
									 			<span><i class="la la-clock-o"></i><strong>9</strong> Job Posted</span>
									 			<span><i class="la la-file-text"></i><strong>20</strong> Application</span>
									 			<span><i class="la la-users"></i><strong>18</strong> Active Jobs</span>
									 		</div> -->
									 		<table>
									 			<thead>
									 				<tr>
									 					<td class="col-6">Descripción</td>
									 					<td class="col-2">Industria</td>
									 					<td class="col-2">Categoria</td>
									 					<td class="col-2">Experiencia</td>
									 				</tr>
									 			</thead>
									 			<tbody>

									 				@foreach($user->talents as $talent)
										 				<tr>
										 					<td>
										 						<div class="table-list-title pr-4">
										 							<h3>{{ $talent->title }}</h3>
										 							<p class="text-justify">{{ $talent->description }}</p>
										 						</div>
										 					</td>
										 					<td>
										 						<p class="applied-field text-center">{{ $talent->category->industry->name }}</p>
										 					</td>
										 					<td>
																<p class="applied-field text-center">{{ $talent->category->name }}</p>
										 					</td>
										 					<td>
									 							<!-- <div class="progress-sec with-edit"> -->
									 								@php($nivel = $talent->level*100/10)
									 								<div class="progressbar"> 
									 									<div class="progress" style="width: {{$nivel}}%;">
										 									<span>
												 								{{ $talent->level }}
												 							</span>
												 						</div>
												 					</div>
									 							<!-- </div> -->
										 					</td>
										 				</tr>
									 				@endforeach
									 			</tbody>
									 		</table>
								 		</div>
			 						</div>
		 						</div>
								@endif
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
			<h3>Contratar este talento</h3>
			<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
				<span class="close-popup"><i class="la la-close"></i></span>
			</button>
			<div class="modal-body">
				<div class="contact-edit pl-5 pr-5">
					<div class="row">
					<div class="alert alert-light" role="alert" id="alert-message">
					  El mensaje a {{ $user->name }} {{ $user->lastname }} ha sido enviado
					</div>
					<p>
						Parece que has encontrado a quien estabas buscando. ¡Enoharbuena!
					</p>
					<p>
						Con el siguiente paso, nos gustaría recabar información detallada sobre el proyecto que requieres de este talento. Por favor trata de usar lenguaje abierto e informal para poder evitar malos entendidos. En esta étapa inicial queremos conocer tus expectativas como alguien que necesita de un producto o servicio de este talento.
					</p>
					</div>

					<form id="form-trato-talento" class="pl-1">
						@csrf
						<input type="hidden" name="pay" id="pay" value="0">
						<input type="hidden" name="accept_id" id="accept_id" value="{{ $user->id }}">
						<input type="hidden" name="propose_id" id="propose_id" value="{{ auth()->user()->id }}">
						<div class="col-lg-12">
							<span class="pf-title">Nombre del proyecto</span>									
							<div class="pf-field">
								<input type="text" name="name" id="name" maxlength="100" required>
								<span class="form-error" id="e_name_pdf" hidden> Debe agregar un nombre válida</span>
							</div>
						</div>
						<div class="col-lg-12">
							<span class="pf-title">Descripción</span>									
							<div class="pf-field">
								<textarea id="description" name="description" placeholder="¿Cuál es el producto, servicio o beneficio final en su ​ mejor versión ​ que requieres de este talento?" required></textarea>
							</div>
						</div>
						<div class="col-lg-12">
							<span class="pf-title">Resultado Final Ideal (opcional)</span>									
							<div class="pf-field">
								<input type="text" name="ideal" id="ideal" maxlength="100" placeholder="¿Cuál es el producto, servicio o beneficio final en su ​ mejor versión ​ que requieres de este talento?”​ cuando lo recibas." required>
							</div>
						</div>
						<div class="col-lg-12">

							<span class="pf-title">¿Cuál es el factor crítico de calidad en este proyecto? (opcional)</span>				
							<div class="pf-field">
								<input type="text" name="plus" id="plus" maxlength="100" placeholder="Descríbenos ese “ingrediente esencial” que necesita tener este proyecto para que tu digas ​“es un éxito”​ cuando lo recibas." required>
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
	 						<span class="pf-title">¿Cuánto es tu presupuesto por 1 cantidad de este proyecto?</span>
	 						<div class="pf-field">
	 							<input type="number" name="value" id="value" required />
	 						</div>
	 					</div>
	 					<div class="col-lg-6">
	 						<span class="pf-title">Cantidad Total</span>
	 						<div class="pf-field">
	 							<input type="number" name="quantity" id="quantity" required  />
	 						</div>
	 					</div>
	 					<div class="col-lg-6">
							<div class="alert alert-light" role="alert" id="alert-trato">
								El trato fue enviado exitosamente
							</div>					
	 					</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="boton-normal">Cancelar</button>
				<button type="submit" class="boton-normal" id="boton-nuevo-trato-talento">Ofrecer Trato</button>
			</div>
		</div>
	  </div>
	</div>	
</section>


@endsection

@section('scripts')
<script>
	$(function(){
		$(".alert").hide();
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


		$('#boton-nuevo-trato-talento').click(function(event) {
			event.preventDefault();
			var dataString = $('#form-trato-talento').serialize();
			$.ajax({
				url: '/nuevo-trato-talento',
				type: 'get',
				data: dataString,
				contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
				processData: false // NEEDED, DON'T OMIT THIS
			})
			.done(function(response) {
				$("#alert-trato").fadeTo(2000, 500).slideUp(500, function(){
				    $("#alert-trato").slideUp(1000);
				    $('#modal-trato').modal('hide');
					$("#form-trato-talento")[0].reset();
				});
			});
		});
	});
</script>
@endsection

@section('footer')
	@include('includes.footer-simple')
@endsection
