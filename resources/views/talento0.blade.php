@extends('layouts.tema')

@section('title', 'Talento')

@section('header_type', 'stick-top style3')

@section('content')
<section class="overlape">
	<div class="block no-padding">
		@php($portada = 'images/exchanges/'.$talent->image)
		<div data-velocity="-.1" style="background: url({{URL::asset($portada)}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner-header">
						<h3>{{$talent->title}}</h3>
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
			 					<li><i class="la la-money"></i> Precio : <span>${{$talent->price}}</span></li>
			 					<li><i class="la la-calendar-o"></i> Publicado el: {{$talent->created_at->format('l d, F Y')}}</li>
			 				</ul>
			 				<span><strong>Talento</strong> : {{$talent->talent->title}}</span>
			 				<span>
			 					<strong>Industria</strong> : {{$talent->talent->category->industry->name}} /
			 					<strong>Categoria</strong> : {{$talent->talent->category->name}}
			 				</span>

					 		<div class="job-single-head style2 mt-5 pb-0">
				 				@auth
								@if(auth()->user() != $talent->talent->user)
				 				<a href="javascript:void(0)" data-toggle="modal" data-target="#modal-trato" title="" class="apply-job-btn"></i>Ofrecer trato</a>
				 				@endif
				 				@else
				 				<a href="{{url('suscripcion')}}" title="" class="apply-job-btn"></i>Registrate para ofrecer trato</a>
				 				@endauth
				 			</div>

			 			</div><!-- Job Head -->
			 			<div class="job-details">
			 				<h3>Descripción</h3>
			 				<p>{{$talent->description}}</p>
			 			</div>

						<!-- Imagenes -->
						@if($imagenes->count() > 0)
						<div class="mini-portfolio">
 						<div class="job-details">
			 				<h3>Imágenes</h3>
			 			</div>
							<div class="" id="div-image">

							</div>
						</div>
						@endif

						<!-- Videos -->
						@if($videos->count() > 0)
 						<div class="mini-portfolio">
	 						<div class="job-details">
				 				<h3>Videos</h3>
				 			</div>
 							<div class="mp-row" id="div-video">
 							</div>
 						</div>
 						@endif

						<!-- Pdfs -->
						@if($pdfs->count() > 0)
 						<div class="mini-portfolio">
	 						<div class="job-details">
				 				<h3>Archivos Pdf</h3>
				 			</div> 							
 							<div class="mp-row" id="div-pdf">
 							</div>
 						</div>
						@endif
			 		</div>
			 	</div>
			 	<div class="col-lg-4 column">
			 		<div class="job-single-head style2">
		 				<div class="job-thumb"> <img src="{{URL::asset('images/users/'.$talent->user->avatar)}}" style="max-width: 124px" alt="" /> </div>
		 				<div class="job-head-info">
		 					<h4>{{$talent->user->name}} {{$talent->user->lastname}}</h4>
		 					<span>{{$talent->user->address}}</span>
		 					<p><i class="la la-map-marker"></i> {{$talent->user->city}}, {{$talent->user->country}}</p>
		 					<p><i class="la la-phone"></i> {{$talent->user->phone}}</p>
		 					<p><i class="la la-envelope-o"></i> {{$talent->user->email}}</p>
		 				</div>
		 			</div><!-- Job Head -->
			 	</div>
			</div>
		</div>
	</div>
</section>


@section('scripts')
<script src="{{URL::asset('js/talent-single.js')}}" type="text/javascript"></script>
@endsection

@section('footer')
	@include('includes.footer')
@endsection