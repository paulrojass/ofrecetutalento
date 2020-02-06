@extends('layouts.tema')

@section('title', 'Mi cuenta')

@section('header_type', 'stick-top style3')

@section('content')
<section class="overlape">
	<div class="block no-padding">
		<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner-header">
						<h3>Bienvenido {{auth()->user()->name}} {{auth()->user()->lastname}}</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<input type="hidden" name="auth_user" id=auth_user value="{{ auth()->user()->id }}">
	<div class="block remove-top">
		<div class="container">
			<div class="row no-gape">
				<aside class="col-lg-3 column border-right">
					<div class="widget">
						<div class="tree_widget-sec">
							<ul>
								<li><a id="a-perfil" onclick="mostrar('#mi-perfil','#a-perfil')" title=""><i class="la la-user"></i>Mi perfil</a></li>
								@if(auth()->user()->suscription->plan_id > 1)
									<li><a id="a-talentos" onclick="mostrar('#talentos','#a-talentos')" title=""><i class="la la-diamond"></i>Talentos</a></li>
									<li><a id="a-canjes" onclick="mostrar('#canjes', '#a-canjes')" title=""><i class="la la-lightbulb-o"></i>Canjes</a></li>
								@endif
								<li><a id="a-tratos" onclick="mostrar('#tratos', '#a-tratos')" title=""><i class="la la-exchange"></i>Tratos</a></li>
								<li><a id="a-mensajes" onclick="mostrar('#mensajes', '#a-mensajes')" title=""><i class="la la-comments"></i>Mensajes</a></li>
								<li><a href="{{route('logout')}}" title=""><i class="la la-unlink"></i>Cerrar Sesión</a></li>
							</ul>
						</div>
					</div>
<!-- 					<div class="widget">
	<div class="skill-perc">
		<h3>Skills Percentage </h3>
		<p>Put value for "Cover Image" field to increase your skill up to "15%"</p>
		<div class="skills-bar">
			<span>85%</span>
			<div class="second circle" 
				data-size="155"
				data-thickness="60">
			</div>
		</div>
	</div>
</div> -->
				</aside>

				<div class="col-lg-9 column">
					<div class="padding-left">
						<div class="manage-jobs-sec">
							<div id="mi-perfil">
								<form files="true" enctype="multipart/form-data" id="form-avatar">
									<div class="upload-img-bar">
										<span class="round" id="div-imagen">
											<img id="img-avatar" src="{{URL::asset('images/users/'.Auth::User()->avatar)}}" style="cursor:pointer" alt="" />
										</span>
										<div class="upload-info">
											<div id="ll"></div>

											<input id="avatar" name="avatar" type="file" accept="image/*" capture style="display:none">
											<a id="button-avatar" title="">Cambiar foto</a>
											<span>Tamaño maximo 1Mb, archivos permitidos: .jpg & .png</span>
										</div>
									</div>
								</form>
								<div id="mi-perfil-info"></div>		 					
							</div>

							<div id="talentos">
							</div>


							<div id="canjes">

							</div>	



							<div id="tratos">
								<div class="border-title"><h3>Tratos</h3><a href="#" title=""><i class="la la-plus"></i> Agregar Trato</a></div>
								<div class="mini-portfolio">
							 		<div class="manage-jobs-sec">
							 			<div class="extra-job-info">
								 			<span><i class="la la-clock-o"></i><strong>9</strong> Job Posted</span>
								 			<span><i class="la la-file-text"></i><strong>20</strong> Application</span>
								 		</div>
								 		<table>
								 			<thead>
								 				<tr>
								 					<td>Requerimiento</td>
								 					<td>Canje Propuesto</td>
								 					<td>Canje Solicitado</td>
								 					<td>Estado</td>
								 					<td>Acciones</td>
								 				</tr>
								 			</thead>
								 			<tbody>
								 				<tr>
								 					<td>
								 						<div class="table-list-title">
								 							<h3><a href="#" title="">Web Designer / Developer</a></h3>
								 							<span><i class="la la-map-marker"></i>Sacramento, California</span>
								 						</div>
								 					</td>
								 					<td>
								 						<span class="applied-field">3+ Applied</span>
								 					</td>
								 					<td>
								 						<span>October 27, 2017</span><br />
								 						<span>April 25, 2011</span>
								 					</td>
								 					<td>
								 						<span class="status active">Active</span>
								 					</td>
								 					<td>
								 						<ul class="action_job">
								 							<li><span>View Job</span><a href="#" title=""><i class="la la-eye"></i></a></li>
								 							<li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
								 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
								 						</ul>
								 					</td>
								 				</tr>
								 			</tbody>
								 		</table>
							 		</div>

								</div>
							</div>								

							<div id="mensajes">
								<div class="border-title"><h3>Mensajes</h3><a href="#" title=""><i class="la la-comment"></i> Enviar Mensaje</a></div>
								<div class="progress-sec">
									<div class="manage-jobs-sec">
										<table class="alrt-table">
											<thead>
												<tr>
													<td>Alert Details</td>
													<td class="text-right">Email Frequency</td>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<div class="table-list-title">
															<h3><a href="#" title="">Test Title</a></h3>
															<span>Search Keywords: 2, 60, Crawley RH10 8XH, United Kingdom</span>
														</div>
													</td>
													<td>
														<ul class="action_job">
															<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
														</ul>
														<span>Never</span>
													</td>
												</tr>
											</tbody>
										</table>
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

<!-- Modal Idioma -->
<div class="modal fade" id="modal-idioma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<!-- Modal Talento -->
<div class="modal fade" id="modal-talento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Nuevo Talento</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="alert alert-danger print-error-msg" style="display:none">
			<ul></ul>
		</div>
		<form id="form-talento">
			<div class="modal-body">
				<div class="contact-edit pl-5 pr-5">
					<input type="hidden" name="_token" value="{{csrf_token() }}">
					<input type="hidden" name="id_talent">
					<span class="pf-title">Talento <strong class="required">*</strong></span>									
					<div class="pf-field">
						<input type="text" name="title" id="title" maxlength="100" required>
						<span id="e_title" hidden> Debe agregar un titulo del talento</span>
					</div>

					<span class="pf-title">Industria y Categoría <strong class="required">*</strong></span>
					<div class="pf-field">
						<select name="categories" id="categories" class="chosen">
							<option value = "">Selecciona una categoría</option>
							@php($industria = "")
							@foreach($categories as $category)
							@if($category->industry->name != $industria)
								@php($industria = $category->industry->name)
									@if(!$loop->first)
										</optgroup>
									@endif
									<optgroup label="{{$industria}}">
										<option value="{{$category->id}}">{{$category->name}}</option>
							@else
								<option value="{{$category->id}}">{{$category->name}}</option>
								@if($loop->last)
									</optgroup>
								@endif
							@endif
							@endforeach
						</select>
						<span id="e_category" hidden> Selecciona una categoía</span>
					</div>

					<span class="pf-title result-talent">Nivel de experiencia <strong class="required">*</strong> <b></b></span>
					<input type="range" class="slider" min="0" max="10" id="level-talent" name="level-talent" required>

					<span class="pf-title">Descripción <strong class="required">*</strong></span>
					<div class="pf-field">
						<input type="text" name="description" id="description" required value="{{old('description')}}">
						<span id="e_description" hidden>Describe el talento</span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="boton-normal">Cerrar</button>
				<button type="submit" class="boton-normal" data-tipo="agregar" id="nuevo-talento">Agregar</button>
				<button type="submit" class="boton-normal" data-tipo="actualizar" id="actualizar-talento">Actualizar</button>
			</div>
		</form>
	</div>
  </div>
</div>

<section id="section-modal-canjes">
	<!-- Modal Idioma -->
	<div class="modal fade bd-example-modal-lg" id="modal-canje" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar nuevo canje</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="form-canje">
			  <div class="modal-body">
					<div class="contact-edit pl-5 pr-5">
						@csrf
						<div class="row">
							<div class="col-lg-12">
								<span class="pf-title">Titulo</span>									
								<div class="pf-field">
									<input type="text" name="title-exchange" id="title-exchange" required>
								</div>
							</div>
							<div class="col-lg-6">
								<span class="pf-title">Precio</span>									
								<div class="pf-field">
									<input type="number" name="title-price" id="title-price" required>
								</div>
							</div>
							<div class="col-lg-6">
								<span class="pf-title">Talento</span>
								<div class="pf-field">
									<select name="talents-exchange" id="talents-exchange" class="chosen" required>
										<option value = "">Selecciona un talento</option>
										@foreach($talents as $talent)
										<option value="{{$talent->id}}">{{$talent->title}}</option>
										@endforeach
									</select>
								</div>
								
							</div>
							<div class="col-lg-12">
								<span class="pf-title">Descripción</span>									
								<div class="pf-field">
									<textarea id="description-exchange" name="description-exchange"></textarea>
								</div>
							</div>
						</div>
					</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" data-dismiss="modal" class="boton-normal">Cerrar</button>
				<button type="button" class="boton-normal" id="nuevo-canje">Agregar</button>
				<button type="button" class="boton-normal" id="actualizar-canje">Agregar</button>
			  </div>
			</form>
		</div>
	  </div>
	</div>	
</section>


@endsection


@section('scripts')
<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/bootstrap-datepicker.css')}}" />
<script src="{{URL::asset('tema/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/tag.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>

<script src="{{URL::asset('js/mi-cuenta.js')}}" type="text/javascript">
</script>
@endsection