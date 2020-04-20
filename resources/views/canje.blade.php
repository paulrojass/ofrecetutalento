@extends('layouts.tema')

@section('title', 'Canje - '.$canje->title)

@section('header_type', 'gradient')

@section('content')
@php($portada = 'images/exchanges/'.$canje->image)

<input type="hidden" name="canje_id" id="canje_id" value="{{ $canje->id }}">
@auth
<input type="hidden" name="auth_user" id="auth_user" value="{{ auth()->user()->id }}">
@endauth

<section>
<div class="block">
	<div class="container">
		 <div class="row">
			<div class="col-lg-9 column">
		 		<div class="bloglist-sec">
		 			<div class="blogpost">
		 				<div class="blog-posthumb"> <img src="{{ URL::asset($portada) }}" style="width: 834px;height: 340px; object-fit: cover;" alt="" /> </div>
		 				<div class="blog-postdetail">
		 					<ul class="post-metas">
			 					<li><a href="#" title=""><i class="la la-money"></i> Precio : <span>${{$canje->price}}</span></a></li>

			 					@php($creado = new Date($canje->created_at))
			 						
								<li><a href="#" title=""><i class="la la-calendar-o"></i>Publicado el: {{ $creado->format('l d, F Y') }}</a></li>
		 						<li><a class="metascomment" href="#comentarios" title=""><i class="la la-comments"></i>{{ $canje->comments->count() }} comentarios</a></li>
		 					</ul>

		 					<h3>{{ $canje->title }}</h3>
			 				<div class="job-title2">
			 					@auth
				 					<div class="me-gusta">

				 					</div>
			 					@endauth
			 				</div>		 				

			 				<span><strong>Talento</strong> : {{$canje->talent->title}}</span>
			 				<span>
			 					<strong>Industria</strong> : {{$canje->talent->category->industry->name}} /
			 					<strong>Categoria</strong> : {{$canje->talent->category->name}}
			 				</span>


		 					<p>{{ $canje->description }}</p>

			 				@auth
							@if(auth()->user() != $canje->talent->user)
			 				<a href="javascript:void(0)" data-toggle="modal" data-target="#modal-trato" title="" class="bbutton"></i>Ofrecer Trato</a>
			 				@endif
			 				@else
			 				<a href="{{url('suscripcion')}}" title="" class="bbutton"></i>Registrate para ofrecer Trato</a>
							@endauth
		 				</div>
		 			</div>
		 		</div>
			</div>
			<div class="col-lg-3 column">
		 		<div class="job-single-head style2">
	 				<div class="job-thumb"> <img src="{{URL::asset('images/users/'.$canje->talent->user->avatar)}}" style="max-width: 124px" alt="" /> </div>
	 				<div class="job-head-info">
	 					<h4>{{$canje->talent->user->name}} {{$canje->talent->user->lastname}}</h4>
	 					<!-- <span style="line-height: 21px">{{$canje->talent->user->address}}</span> -->
	 					<p><i class="la la-map-marker"></i> {{$canje->talent->user->city}}, {{$canje->talent->user->country}}</p>
	 				</div>
	 			</div><!-- Job Head -->
			</div>
		</div>
	</div>
</div>	
</section>

<section id="comentarios">
<div class="block pt-0">
	<div class="container">
		<div class="row">
		 	<!-- <div class="col-lg-8 column"> -->
		 		<div class="job-single-sec">
					<!-- Seccion de comentarios-->
		 			<div class="comment-sec" id="div-comentarios">
		 				
		 			</div>
		 		</div>
		 	<!-- </div> -->
		</div>
	</div>
</div>
</section>

<!-- Modal trato -->
<div class="modal fade bd-example-modal" id="modal-trato" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
	<div class="modal-content pt-4">
		<!-- 		<div class="modal-header"> -->
					<!-- <h5 class="modal-title" id="exampleModalLabel">Ofrecer Trato</h5> -->
		<h3>Ofrecer un trato</h3>

		<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
			<span class="close-popup"><i class="la la-close"></i></span>
		</button>
		<!-- 		</div> -->

		<form id="form-trato">
			<input type="hidden" id="propose_id" name="propose_id" value="{{  (Auth::user()) ? Auth::user()->id : null }}">
			<input type="hidden" id="accept_id" name="accept_id" value="{{  $canje->talent->user_id }}">
			<input type="hidden" id="exchange_id" name="exchange_id" value="{{ $canje->id }}">
			<div class="modal-body">
				<div class="contact-edit pl-5 pr-5">
					@csrf
					<div class="row">
						<span class="pf-title">Especificar requerimiento</span>
						<div class="pf-field">
							<textarea id="description" name="description"></textarea>
						</div>

						<span class="pf-title">Días aproximados que espero recibir su canje</span>
						<div class="pf-field">
							<input type="number" name="exchange_days" id="exchange_days" required>
						</div>

						<span class="pf-title">forma de pago</span>								
						<div class="pf-field">
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="pay" id="tipo-pago" value="1" checked>
							  <label class="form-check-label" for="tipo-pago">
							    Pagar ${{$canje->price}}
							  </label>
							</div>
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
						</div>
					</div>
					<div class="row" id="div-canje" style="display: none">
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

					<div class="row" id="div-propuesta" style="display: none;">
						<span class="pf-title">Nombre de su propuesta</span>									
						<div class="pf-field">
							<input type="text" name="name_proposal" id="name_proposal" maxlength="100" required>
							<span class="form-error" id="e_name_proposal" hidden> Debe agregar un nombre válido</span>
						</div>

						<span class="pf-title">¿Cuál es el producto, servicio o beneficio final en su ​ mejor versión ​ que propones a este talento?</span>									
						<div class="pf-field">
							<textarea id="description_proposal" name="description_proposal" placeholder="" required></textarea>
						</div>
					</div>

					<div class="row" id="div-tiempo" style="display: none;">
						<span class="pf-title">Días para culminar mi propuesta</span>
						<div class="pf-field">
							<input type="number" name="proposal_days" id="proposal_days" required>
						</div>
					</div>

					<div class="alert alert-success" role="alert" id="alert-trato">
					 	Se ha propuesto un trato para este canje
					</div>
					<div class="alert alert-danger" role="alert" id="alert-trato-fail">
						No se pudo realizar la propuesta, intente de nuevo
					</div>	
					<div class="alert alert-danger mt-4" role="alert" id="alert-error">
						Revise el formato de los campos, todos son obligatorios
					</div>
					<div class="col-lg-12">
						<div class="float-right">
							<button type="button" data-dismiss="modal" class="bbutton ml-4">Cancelar</button>
							<button type="submit" class="bbutton  ml-4" id="nuevo-trato">Ofrecer Trato</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{URL::asset('js/canje-single.js')}}" type="text/javascript"></script>
@endsection

@section('footer')
	@include('includes.footer')
@endsection