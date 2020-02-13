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

							<!-- Imagenes -->
	 						<div class="border-title"><h3 id="titulo-image">Imágenes <strong></strong></h3>
								@if(auth()->user() == $canje->talent->user)
								<form files="true" enctype="multipart/form-data" id="form-image">
									@csrf
									<input id="image-files" name="image-files" type="file" accept="image/*" capture style="display:none">
								</form>
	 							<a id="agregar-image" title=""><i class="la la-plus"></i> Agregar imagen</a>
	 							@endif
	 						</div>

							<div class="mini-portfolio">
								<div class="mp-row" id="div-image">

								</div>
							</div>

							<!-- Videos -->
	 						<div class="border-title"><h3 id="titulo-video">Videos <strong></strong></h3>
								@if(auth()->user() == $canje->talent->user)
								<form files="true" enctype="multipart/form-data" id="form-image">
									@csrf
									<input id="video-files" name="video-files" type="file" accept="video/*" capture style="display:none">
								</form>
	 							<a id="agregar-video" title=""><i class="la la-plus"></i> Agregar video</a>
	 							@endif
	 						</div>
	 						<div class="mini-portfolio">
	 							<div class="mp-row" id="div-video">
	 							</div>
	 						</div>

							<!-- Pdfs -->
	 						<div class="border-title"><h3 id="titulo-pdf">Pdf <strong></strong></h3><a id="agregar-pdf" href="#" title=""><i class="la la-plus"></i> Agregar video</a></div>
	 						<div class="mini-portfolio">
	 							<div class="mp-row" id="div-pdf">
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
			 				<a data-toggle="modal" data-target="#modal-trato" title="" class="apply-job-btn"><i class="la la-paper-plane"></i>Ofrecer trato</a>
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

	<!-- Modal trato -->
	<div class="modal fade" id="modal-trato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ofrecer Trato</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-trato">

				<input type="hidden" id="canje_id" name="canje_id" value="{!! $canje->id !!}">
				<input type="hidden" id="auth_user" name="auth_user" value="{{{ (Auth::user()) ? Auth::user()->id : null }}}">
			  <div class="modal-body">
					<div class="contact-edit pl-5 pr-5">
						@csrf
						<div class="row">
	 						<span class="pf-title">Especificar requerimiento</span>
	 						<div class="pf-field">
	 							<textarea id="description" name="description"></textarea>
	 						</div>

							<span class="pf-title">forma de pago</span>								
							<div class="pf-field">
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="pay" id="tipo-pago" value="1" checked>
								  <label class="form-check-label" for="tipo-pago">
								    Pagar ${{$canje->price}}
								  </label>
								</div>
								<div class="form-check">
								  <input class="form-check-input" type="radio" name="pay" id="tipo-canje" value="0">
								  <label class="form-check-label" for="tipo-canje">
								    Ofrecer Canje
								  </label>
								</div>
							</div>
						</div>
						<div class="row" id="div-select-canje" style="display: none">
	 						<span class="pf-title">Mis Canjes</span>
	 						<div class="pf-field">
	 							<select id="exchange_proposal" name="exchange_proposal" data-placeholder="Selecciona tu canje" class="chosen">
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
					</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" data-dismiss="modal" class="boton-normal">cancelar</button>
				<button type="button" class="boton-normal" id="nuevo-trato">enviar</button>
			  </div>
			</form>
		</div>
	  </div>
	</div>
@endsection


@section('scripts')
<script src="{{URL::asset('js/canje-single.js')}}" type="text/javascript"></script>
@endsection