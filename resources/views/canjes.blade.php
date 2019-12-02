@extends('layouts.tema')

@section('title', 'Inicio')

@section('header_type', 'stick-top style3')

@section('content')
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header wform">
							<div class="job-search-sec">
								<div class="job-search">
									<h4>Explora todos lo canjes disponibles con una simple búsqueda...</h4>
									<form>
										<div class="row">
											<div class="col-lg-7">
												<div class="job-field">
													<input type="text" placeholder="" />
													<i class="la la-keyboard-o"></i>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="job-field">
													<input type="text" placeholder="Ubicación" />
													<i class="la la-map-marker"></i>
												</div>
											</div>
											<div class="col-lg-1">
												<button type="submit"><i class="la la-search"></i></button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block remove-top">
			<div class="container">
				 <div class="row no-gape">
				 	<aside class="col-lg-3 column">
				 		<div class="widget border">
				 			<h3 class="sb-title open">Fecha de publicación</h3>
				 			<div class="posted_widget">
								<input type="radio" name="choose" id="hora"><label for="hora">Última hora</label><br />
								<input type="radio" name="choose" id="dia"><label for="dia">Últimas 24 horas</label><br />
								<input type="radio" name="choose" id="semana"><label for="semana">Últimos 7 días</label><br />
								<input type="radio" name="choose" id="quincena"><label for="quincena">Últimos 14 días</label><br />
								<input type="radio" name="choose" id="mes"><label for="mes">Últimos 30 días</label><br />
								<input type="radio" name="choose" id="todos"><label class="nm" for="todos">Todos</label><br />
				 			</div>
				 		</div>
				 		<div class="widget border">
				 			<h3 class="sb-title open">Industria</h3>
				 			<div class="posted_widget">
								@foreach($industries as $industry)
				 					<div class="simple-checkbox">
										<p>
											<input type="checkbox" name="smplechk" id="{{ $industry->id }}">
											<label for="{{ $industry->id }}">{{ $industry->name }}</label>
										</p>
				 					</div>
								@endforeach
				 			</div>
				 		</div>
				 		<div class="widget border">
					 		<h3 class="sb-title open">Precio</h3>
					 		<div class="type_widget">
					 			<div class="row">				 			
				 					<div class="col-lg-6">
				 						<span class="pf-title">min.</span>
				 						<div class="pf-field">
				 							<input type="text" name="min" id="min"/>
				 						</div>
				 					</div>
				 					<div class="col-lg-6">
				 						<span class="pf-title">max.</span>
				 						<div class="pf-field">
				 							<input type="text" name="max" id="max" />
				 						</div>
				 					</div>
				 				</div>
					 		</div>
				 		</div>
				 		<div class="pull-right">
					 		<button type="submit" class="post-job-btn btn-filtrar"><i class="la la-filter"></i>Filtrar</button>
				 		</div>
				 	</aside>
				 	<div class="col-lg-9 column">
				 		<div class="modrn-joblist np">
					 		<div class="filterbar">
					 			<h5>{{$exchanges->total()}} Canjes disponibles</h5>
					 		</div>
						 </div><!-- MOdern Job LIst -->
						 <div class="job-list-modern">
						 	<div class="job-listings-sec no-border">
								@foreach($exchanges as $exchange)
								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="{{URL::asset($exchange->image)}}" alt="" /> </div>
										<h3><a href="#" title="">{{$exchange->title}}</a></h3>
										<span><i class="la la-user"></i>{{$exchange->talent->user->name}} {{$exchange->talent->user->lastname}}</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>{{$exchange->talent->user->city}}, {{$exchange->talent->user->country}}</div>
									</div>
									<div class="job-style-bx">
								 		<a href="#" title="">
										<span class="job-is ft">Ver detalles</span>
										</a>

										<span class="fav-job"><i class="la la-heart-o"></i></span>
										<i>
											publicado el: <strong>{{$exchange->created_at->format('d/m/Y')}}</strong>
										</i>
									</div>
								</div>
								@endforeach
								{{ $exchanges->links() }}
							</div>
						 </div>
					 </div>
				 </div>
			</div>
		</div>
	</section>
@endsection