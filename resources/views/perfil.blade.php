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
				 		<ul class="cand-extralink">
				 			<li><a href="#abilities" title="">habilidades</a></li>
				 			<li><a href="#talentos" title="">Talentos</a></li>
				 			@auth
				 				<li><a href="#mensaje" title="">Enviar Mensaje</a></li>
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

				 				<div class="col-lg-4 column" id="mensaje">
				 				<!-- 	
						 			<div class="job-overview">
							 			<h3>Resumen del usuario</h3>
							 			<ul>
							 				<li><i class="la la-money"></i><h3>Offerd Salary</h3><span>£15,000 - £20,000</span></li>
							 				<li><i class="la la-mars-double"></i><h3>Gender</h3><span>Female</span></li>
							 				<li><i class="la la-thumb-tack"></i><h3>Career Level</h3><span>Executive</span></li>
							 				<li><i class="la la-puzzle-piece"></i><h3>Industry</h3><span>Management</span></li>
							 				<li><i class="la la-shield"></i><h3>Experience</h3><span>2 Years</span></li>
							 				<li><i class="la la-line-chart "></i><h3>Qualification</h3><span>Bachelor Degree</span></li>
							 			</ul>
							 		</div> --><!-- Job Overview -->
									@auth
							 		<div class="quick-form-job" >
							 			<h3>Enviar Mensaje</h3>
							 			<form>
							 				<textarea placeholder="Envia un mensaje directo a {{ $user->name }} {{ $user->lastname }}"></textarea>
							 				<button class="submit">enviar</button>
							 			</form>
							 		</div>
									@endauth
						 		</div>

				 			</div>
				 		</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection