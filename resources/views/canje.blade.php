@extends('layouts.tema')

@section('title', 'Canje')

@section('header_type', 'stick-top style3')

@section('content')
	<section class="overlape">
		<div class="block no-padding">
			@php($portada = 'images/exchanges/'.$canje->image)
			<div data-velocity="-.1" style="background: url({{URL::asset($portada)}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3>{{$canje->title}}</h3>
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
				 				<ul class="tags-jobs">
				 					<li><i class="la la-money"></i> Precio : <span>${{$canje->price}}</span></li>
				 					<li><i class="la la-calendar-o"></i> Publicado el: {{$canje->created_at->format('l d, F Y')}}</li>
				 				</ul>
				 				<span><strong>Talento</strong> : {{$canje->talent->title}}</span>
				 				<span>
				 					<strong>Industria</strong> : {{$canje->talent->category->industry->name}} /
				 					<strong>Categoria</strong> : {{$canje->talent->category->name}}
				 				</span>
				 			</div><!-- Job Head -->
				 			<div class="job-details">
				 				<h3>Descripción</h3>
				 				<p>{{$canje->description}}</p>
				 			</div>
	 						<div class="border-title"><h3>Imágenes</h3><a href="#" title=""><i class="la la-plus"></i> Agregar imagen</a></div>
	 						<div class="mini-portfolio">
	 							<div class="mp-row">
	 								@foreach(($canje->files->where('type', 'image')) as $imagen)
		 								<div class="mp-col">
		 									<div class="mportolio"><img src="{{URL::asset('files/image/'.$imagen->location)}}" style="max-width: 165px; max-height: 165px" alt="" /><a href="#" title=""><i class="la la-search"></i></a></div>
		 									<ul class="action_job">
					 							<li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
					 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
					 						</ul>
		 								</div>
	 								@endforeach
	 							</div>
	 						</div>

	 						<div class="border-title"><h3>Videos</h3><a href="#" title=""><i class="la la-plus"></i> Agregar video</a></div>
	 						<div class="mini-portfolio">
	 							<div class="mp-row">
	 								@foreach(($canje->files->where('type', 'video')) as $video)
		 								<div class="mp-col">
		 									<div class="mportolio"><img src="{{URL::asset('files/video/'.$video->location)}}" style="max-width: 165px; max-height: 165px" alt="" /><a href="#" title=""><i class="la la-search"></i></a></div>
		 									<ul class="action_job">
					 							<li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
					 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
					 						</ul>
		 								</div>
	 								@endforeach
	 							</div>
	 						</div>



	 						<div class="border-title"><h3>Videos</h3><a href="#" title=""><i class="la la-plus"></i> Agregar video</a></div>
	 						<div class="mini-portfolio">
	 							<div class="mp-row">
		 								<div class="mp-col">
		 									<div class="mportolio">
		 										<a><img class="img-fluid z-depth-1" src="https://mdbootstrap.com/img/screens/yt/screen-video-1.jpg" style="max-width: 165px; max-height: 165px" alt="video" data-toggle="modal" data-target="#modal1"/></a>
		 										<a href="#" title=""><i class="la la-search"></i>
		 										</a>
		 									</div>
		 									<ul class="action_job">
					 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
					 						</ul>
		 								</div>
	 							</div>
	 						</div>
							<!-- Seccion de comentarios-->
				 			<div class="comment-sec" id="div-comentarios">
				 			</div>

<!--
				 			<div class="job-overview">
					 			<h3>Job Overview</h3>
					 			<ul>
					 				<li><i class="la la-money"></i><h3>Offerd Salary</h3><span>£15,000 - £20,000</span></li>
					 				<li><i class="la la-mars-double"></i><h3>Gender</h3><span>Female</span></li>
					 				<li><i class="la la-thumb-tack"></i><h3>Career Level</h3><span>Executive</span></li>
					 				<li><i class="la la-puzzle-piece"></i><h3>Industry</h3><span>Management</span></li>
					 				<li><i class="la la-shield"></i><h3>Experience</h3><span>2 Years</span></li>
					 				<li><i class="la la-line-chart "></i><h3>Qualification</h3><span>Bachelor Degree</span></li>
					 			</ul>
					 		</div>
 				 			<div class="share-bar">
							<span>Share</span><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
						</div> -->
				 		</div>
				 	</div>
				 	<div class="col-lg-4 column">
				 		<div class="job-single-head style2">
			 				<div class="job-thumb"> <img src="{{URL::asset('images/users/'.$canje->talent->user->avatar)}}" style="max-width: 124px" alt="" /> </div>
			 				<div class="job-head-info">
			 					<h4>{{$canje->talent->user->name}} {{$canje->talent->user->lastname}}</h4>
			 					<span>{{$canje->talent->user->address}}</span>
			 					<p><i class="la la-map-marker"></i> {{$canje->talent->user->city}}, {{$canje->talent->user->country}}</p>
			 					<p><i class="la la-phone"></i> {{$canje->talent->user->phone}}</p>
			 					<p><i class="la la-envelope-o"></i> {{$canje->talent->user->email}}</p>
			 				</div>
			 				@auth
							@if(auth()->user() != $canje->talent->user)
			 				<a href="#" title="" class="apply-job-btn"><i class="la la-paper-plane"></i>Ofrecer trato</a>
			 				@endif
			 				@else
			 				<a href="{{url('suscripcion')}}" title="" class="apply-job-btn"><i class="la la-paper-plane"></i>Registrate para ofrecer trato</a>
			 				@endauth
			 			</div><!-- Job Head -->
				 	</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Modal Idioma -->
	<div class="modal fade" id="modal-comentario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar nuevo idioma</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-idioma">
			  <div class="modal-body">
					<div class="contact-edit pl-5 pr-5">
						@csrf
						<div class="row">
							<span class="pf-title">Idioma</span>									
							<div class="pf-field">
								<input type="text" name="language" id="language" required>
								<i class="la la-email"></i>
							</div>
							<span class="pf-title result-language">Nivel: <b></b></span>
							<input type="range" class="slider" min="0" max="10" id="level-language" name="level-language" required>
						</div>
					</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" data-dismiss="modal" class="boton-normal">Cerrar</button>
				<button type="button" class="boton-normal" id="nuevo-idioma">Agregar</button>
			  </div>
			</form>
		</div>
	  </div>
	</div>
@endsection


@section('scripts')
<script>
	$(function(){
		var id_canje = '{!! $canje->id !!}';
		var AuthUser = '{{{ (Auth::user()) ? Auth::user() : null }}}';
		cargaInicial(id_canje);

		function cargaInicial(id_canje){
			actualizarComentarios(id_canje);
			if(AuthUser){actualizarLikes(id_canje, '0');}
		}

		$('#div-comentarios').on('click', '#a-agregar-comentario', function(e){
			e.preventDefault();
			$('#comentario').slideDown('slow', function(){
				$('#textarea-comentario').focus();
				$('#a-agregar-comentario').hide();
			});
		});

		$('#div-comentarios').on('click', '.a-responder', function(e){
			e.preventDefault();
			var clickeado = $(this).data('responder');
			$('#respuesta'+clickeado).slideDown('slow', function(){
				$('#textarea-respuesta'+clickeado).focus();
			});
		});

		$('#div-comentarios').on('click', '#b-publicar-comentario', function(e){
			e.preventDefault();
			agregarComentario(id_canje);
		});

		$('#div-comentarios').on('click', '#b-publicar-respuesta', function(e){
			e.preventDefault();
			agregarComentario(id_canje);
		});

		$('.job-title2').on('click', '#a-me-gusta',function(e){
			e.preventDefault();
			actualizarLikes(id_canje, '1');
		});

		function actualizarLikes(id_canje, cambiar){
			$.ajax({
				url: '/cambiar-like',
				type: 'get',
				data: {canje_id : id_canje, cambiar:cambiar},
				dataType: 'html',
			})
			.done(function(data) {
				$('.me-gusta').html(data);
			});
		}

		function actualizarComentarios(id_canje){
			$.ajax({
				url: '/actualizar-comentarios',
				type: 'get',
				data: {canje_id : id_canje},
				dataType: 'html',
			})
			.done(function(data) {
				$('#div-comentarios').html(data);
			});			
		}

		function agregarComentario(id_canje){
			var comentario = $('#textarea-comentario').val();
			if (comentario != ''){
				$.ajax({
					url: '/agregar-comentario',
					type: 'get',
					data: {canje_id : id_canje, comment:comentario},
					dataType: 'html',
				})
				.done(function(data) {
					$('#div-comentarios').html(data);
				});				
			}
		}

		function agregarRespuesta(id_canje){
			var comentario = $('#textarea-comentario').val();
			if (comentario != ''){
				$.ajax({
					url: '/agregar-respuesta',
					type: 'get',
					data: {canje_id : id_canje, comment:comentario},
					dataType: 'html',
				})
				.done(function(data) {
					$('#div-comentarios').html(data);
				});				
			}
		}
	});
</script>
@endsection