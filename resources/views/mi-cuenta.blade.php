@extends('layouts.tema')

@section('title', 'Mi cuenta')

@section('no-user-link', '')

@section('header_type', 'gradient')

@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/dropzone.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/input-tel/intlTelInput.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/input-tel/demo.css') }}">
@endsection

@section('content')
<section>
	<input type="hidden" name="auth_user" id=auth_user value="{{ auth()->user()->id }}">
	<div class="block remove-top">
		<div class="container">
			<div class="row no-gape">
				<aside class="col-lg-2 column border-right">
					<div class="widget">
						<div class="tree_widget-sec">
							<ul>
								<li><a  href="javascript:void(0)" id="a-perfil" onclick="mostrar('#mi-perfil','#a-perfil')" title=""><i class="la la-user"></i>Mi perfil</a></li>
								@if(auth()->user()->suscription->plan_id > 1)
									<li><a href="javascript:void(0)" id="a-talentos" onclick="mostrar('#talentos','#a-talentos')" title=""><i class="la la-diamond"></i>Talentos</a></li>
									@if(auth()->user()->suscription->plan_id > 2)
									<li><a href="javascript:void(0)" id="a-canjes" onclick="mostrar('#canjes', '#a-canjes')" title=""><i class="la la-lightbulb-o"></i>Canjes</a></li>
									@endif
									<li><a href="javascript:void(0)" id="a-tratos-r" onclick="mostrar('#tratos-r', '#a-tratos-r')" title=""><i class="la la-arrow-left"></i>Tratos Recibidos</a></li>
								@endif
								<li><a href="javascript:void(0)" id="a-tratos-p" onclick="mostrar('#tratos-p', '#a-tratos-p')" title=""><i class="la la-arrow-right"></i>Tratos Propuestos</a></li>
								@if(auth()->user()->suscription->plan_id > 2)
								<li><a href="{{ url('mensajes') }}" id="a-mensajes" title=""><i class="la la-comments"></i>Mensajes</a></li>
								@endif
								<li><a href="{{route('logout')}}" title=""><i class="la la-unlink"></i>Cerrar Sesión</a></li>
							</ul>
						</div>
					</div>
				</aside>

				<div class="col-lg-10 column">

					<div id="mi-perfil">
						<div class="padding-left">
							<div class="manage-jobs-sec">
								<form files="true" enctype="multipart/form-data" id="form-avatar">
									@csrf
									<div class="upload-img-bar">
										<span class="round" id="div-imagen">
											<img id="img-avatar" src="{{URL::asset('images/users/'.auth()->User()->avatar)}}" style="cursor:pointer" alt="" />
										</span>
										<div class="upload-info">
											<div id="ll"></div>

											<input id="avatar" name="avatar" type="file" accept="image/*" capture style="display:none">
											<a id="button-avatar" title="">Cambiar foto del perfil</a>
											<span>Tamaño maximo 1Mb, archivos permitidos: .jpg & .png</span>
										</div>
									</div>
								</form>
								<div id="mi-perfil-info"></div>
							</div>
						</div>
					</div>

					<div id="talentos"> </div>

					<div id="canjes"> </div>	

					<div id="tratos-r"> </div>

					<div id="tratos-p">	</div>
				</div>
				<!-- AQUI TERMINA LA COLUMNA 2 -->
			</div>
		</div>
	</div>
</section>

<!--================================   MODAL DE EDITAR PERFIL -->
<section id="section-modal-edit-perfil">
	<div class="modal fade bd-example-modal-lg" id="modal-edit-perfil" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content pt-4">
				<h3>Información del perfil</h3>
				<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
					<span class="close-popup"><i class="la la-close"></i></span>
				</button>
				<form id="form-edit-perfil">
					@csrf
					
			 		<div class="profile-form-edit pl-5 pr-5">
		 				<div class="row">
		 					<div class="col-lg-6">
		 						<span class="pf-title">Nombres</span>
		 						<div class="pf-field">
									<input type="text" name="name" id="name" value="{{ auth()->user()->name }}" required />
	                                @error('name')
	                                	<span>{{ $message }}</span>
	                                @enderror 
		 						</div>
		 					</div>
		 					<div class="col-lg-6">
		 						<span class="pf-title">Apellidos</span>
		 						<div class="pf-field">
									<input type="text" name="lastname" id="lastname" value="{{ auth()->user()->lastname }}" required />
	                                @error('lastname')
	                                	<span>{{ $message }}</span>
	                                @enderror 
		 						</div>
		 					</div>

		 					<div class="col-lg-6">
		 						<span class="pf-title">Documento de Identidad</span>
		 						<div class="pf-field">
									<input type="text" name="document" id="document" value="{{ auth()->user()->document }}" required />
	                                @error('document')
	                                	<span>{{ $message }}</span>
	                                @enderror 
		 						</div>
		 					</div>
		 					<div class="col-lg-6">
		 						<span class="pf-title">Nacionalidad</span>
		 						<div class="pf-field">
									<input type="text" name="nationality" id="nationality" value="{{ auth()->user()->nationality }}" required />
	                                @error('nationality')
	                                	<span>{{ $message }}</span>
	                                @enderror 
		 						</div>
		 					</div>

		 					<div class="col-lg-6">
		 						<span class="pf-title">Ciudad</span>
		 						<div class="pf-field">
									<input type="text" name="city" id="city" value="{{ auth()->user()->city }}" required />
	                                @error('city')
	                                	<span>{{ $message }}</span>
	                                @enderror 
		 						</div>
		 					</div>

		 					<div class="col-lg-6">
		 						<span class="pf-title">País</span>
		 						<div class="pf-field">
		 							<select data-placeholder="Por favor seleccione su país" class="chosen" name="country" id="country" required >
										<option value="">-- Seleccione --</option>
										@foreach ($paises as $pais)
											<option value="{{$pais}}" @if(auth()->user()->country == $pais) selected @endif>{{$pais}}</option>
										@endforeach
									</select>
		 						</div>
		 					</div>

		 					<div class="col-lg-6">
		 						<span class="pf-title">Teléfono</span>
		 						<div class="pf-field">
									<input type="text" name="phone" id="phone" value="{{ auth()->user()->phone }}" required />
	                                @error('phone')
	                                	<span>{{ $message }}</span>
	                                @enderror 
		 						</div>
		 					</div>

		 					<div class="col-lg-12">
		 						<span class="pf-title">Cuéntanos cómo tus habilidades y destrezas aportan una solución o beneficio real a tus clientes</span>
		 						<div class="pf-field">
		 							<textarea name="abilities" id="abilities">{{ auth()->user()->abilities }}</textarea>
		 						</div>
		 					</div>
		 				</div>
			 		</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="bbutton">Cancelar</button>
						<button type="button" class="bbutton" id="boton-editar-perfil">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>	
</section>


<!--================================   MODAL DE EDITAR EXPERIENCIA -->
<section id="section-modal-edit-experiencia">
@php($year = \Carbon\Carbon::now()->year)
	<div class="modal fade bd-example-modal-lg" id="modal-edit-experiencia" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content pt-4">
				<h3>Experiencias Laborales</h3>
				<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
					<span class="close-popup"><i class="la la-close"></i></span>
				</button>
				<form id="form-actualizar-experiencia">
					@csrf
			 		<div class="profile-form-edit pl-5 pr-5">
		 				<div class="row">

							<div class="col-lg-12 mt-5">
								<p class="mt-3">Experiencia 1:</p>
							</div>
							<div class="col-lg-6">
								<span class="pf-title">Compañia</span>
								<div class="pf-field">
									<input type="text" name="company1" id="company1" value="{{auth()->User()->experiences->company1}}" />
								</div>
							</div>
							<div class="col-lg-6">
								<span class="pf-title">Cargo</span>
								<div class="pf-field">
									<input type="text" name="position1" id="position1" value="{{auth()->User()->experiences->position1}}" />
								</div>
							</div>

							<div class="col-lg-3">
								<span class="pf-title">Año de entrada</span>
								<div class="pf-field">
		 							<select data-placeholder="-- Seleccione --" name="start_date1" id="start_date1" class="chosen" >
										<option value="" >seleccione</option>
										@for ($i = $year; $i >= 1900 ; $i--)
											<option value="{{ $i }}" @if(auth()->User()->experiences->start_date1 == $i) selected @endif >{{ $i }}</option>
										@endfor
									</select>
								</div>
							</div>

							<div class="col-lg-3">
								<span class="pf-title">Año de salida</span>
								<div class="pf-field">
		 							<select data-placeholder="-- Seleccione --" name="due_date1" id="due_date1" class="chosen" >
										<option value="" >seleccione</option>
										@for ($i = $year; $i >= 1900 ; $i--)
											<option value="{{ $i }}" @if(auth()->User()->experiences->due_date1 == $i) selected @endif >{{ $i }}</option>
										@endfor
									</select>									
								</div>
							</div>

							<div class="col-lg-12">
								<span class="pf-title">Logros alcanzados</span>
								<div class="pf-field">
									<input type="text" name="achievements1" id="achievements1" value="{{auth()->User()->experiences->achievements1}}" />
								</div>
							</div>


							<div class="col-lg-12 mt-5">
								<p class="mt-3">Experiencia 2:</p>
							</div>
							<div class="col-lg-6">
								<span class="pf-title">Compañia</span>
								<div class="pf-field">
									<input type="text" name="company2" id="company2" value="{{auth()->User()->experiences->company2}}" />
								</div>
							</div>
							<div class="col-lg-6">
								<span class="pf-title">Cargo</span>
								<div class="pf-field">
									<input type="text" name="position2" id="position2" value="{{auth()->User()->experiences->position2}}" />
								</div>
							</div>

							<div class="col-lg-3">
								<span class="pf-title">Año de entrada</span>
								<div class="pf-field">
		 							<select data-placeholder="-- Seleccione --" name="start_date2" id="start_date2" class="chosen" >
										<option value="" >seleccione</option>
										@for ($i = $year; $i >= 1900 ; $i--)
											<option value="{{ $i }}" @if(auth()->User()->experiences->start_date2 == $i) selected @endif >{{ $i }}</option>
										@endfor
									</select>
								</div>
							</div>

							<div class="col-lg-3">
								<span class="pf-title">Año de salida</span>
								<div class="pf-field">
		 							<select data-placeholder="-- Seleccione --" name="due_date2" id="due_date2" class="chosen" >
										<option value="" >seleccione</option>
										@for ($i = $year; $i >= 1900 ; $i--)
											<option value="{{ $i }}" @if(auth()->User()->experiences->due_date2 == $i) selected @endif >{{ $i }}</option>
										@endfor
									</select>									
								</div>
							</div>

							<div class="col-lg-12">
								<span class="pf-title">Logros alcanzados</span>
								<div class="pf-field">
									<input type="text" name="achievements2" id="achievements2" value="{{auth()->User()->experiences->achievements2}}" />
								</div>
							</div>



							<div class="col-lg-12 mt-5">
								<p class="mt-3">Experiencia 3:</p>
							</div>
							<div class="col-lg-6">
								<span class="pf-title">Compañia</span>
								<div class="pf-field">
									<input type="text" name="company3" id="company3" value="{{auth()->User()->experiences->company3}}" />
								</div>
							</div>
							<div class="col-lg-6">
								<span class="pf-title">Cargo</span>
								<div class="pf-field">
									<input type="text" name="position3" id="position3" value="{{auth()->User()->experiences->position3}}" />
								</div>
							</div>

							<div class="col-lg-3">
								<span class="pf-title">Año de entrada</span>
								<div class="pf-field">
		 							<select data-placeholder="-- Seleccione --" name="start_date3" id="start_date3" class="chosen" >
										<option value="" >seleccione</option>
										@for ($i = $year; $i >= 1900 ; $i--)
											<option value="{{ $i }}" @if(auth()->User()->experiences->start_date3 == $i) selected @endif >{{ $i }}</option>
										@endfor
									</select>
								</div>
							</div>

							<div class="col-lg-3">
								<span class="pf-title">Año de salida</span>
								<div class="pf-field">
		 							<select data-placeholder="-- Seleccione --" name="due_date3" id="due_date3" class="chosen" >
										<option value="" >seleccione</option>
										@for ($i = $year; $i >= 1900 ; $i--)
											<option value="{{ $i }}" @if(auth()->User()->experiences->due_date3 == $i) selected @endif >{{ $i }}</option>
										@endfor
									</select>									
								</div>
							</div>

							<div class="col-lg-12">
								<span class="pf-title">Logros alcanzados</span>
								<div class="pf-field">
									<input type="text" name="achievements3" id="achievements3" value="{{auth()->User()->experiences->achievements3}}" />
								</div>
							</div>
		 				</div>
			 		</div>
					<div class="modal-footer">
						<button type="button" data-dismiss="modal" class="bbutton">Cancelar</button>
						<button type="button" class="bbutton" id="boton-actualizar-experiencia">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>	
</section>




<!--=================================  MODAL DE IDIOMA  -->
<div class="modal fade" id="modal-idioma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content pt-4">
		<h3>Nuevo Idioma</h3>
		<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
			<span class="close-popup"><i class="la la-close"></i></span>
		</button>
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
			<button type="button" data-dismiss="modal" class="bbutton">Cerrar</button>
			<button type="button" class="bbutton" id="nuevo-idioma">Agregar</button>
		  </div>
		</form>
	</div>
  </div>
</div>



<!--=================================  MODALS PARA AGREGAR TALENTO -->
<div class="modal fade" id="modal-talento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="modal-content pt-4">
		<h3>Talento</h3>
		<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
			<span class="close-popup"><i class="la la-close"></i></span>
		</button>
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
						<input type="text" name="title" id="title" maxlength="60" required>
						<span class="form-error" id="e_title" hidden> Debe agregar un titulo del talento</span>
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
						<span class="form-error" id="e_category" hidden> Selecciona una categoía</span>
					</div>

					<span class="pf-title result-talent">Nivel de experiencia <strong class="required">*</strong> <b></b></span>
					<input type="range" class="slider" min="0" max="10" id="level-talent" name="level-talent" required>

					<span class="pf-title">Descripción <strong class="required">*</strong></span>
					<div class="pf-field">
						<input type="text" name="description" id="description" required value="{{old('description')}}">
						<span class="form-error" id="e_description" hidden>Describe el talento</span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="bbutton" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="bbutton" data-tipo="agregar" id="nuevo-talento">Agregar</button>
				<button type="submit" class="bbutton" data-tipo="actualizar" id="actualizar-talento">Actualizar</button>
			</div>
		</form>
	</div>
  </div>
</div>



<section id="section-modal-canjes">
	<div class="modal fade bd-example-modal-lg" id="modal-canje" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content pt-4">
			<h3>Canjes</h3>
			<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
				<span class="close-popup"><i class="la la-close"></i></span>
			</button>
			<form id="form-canje">
			  <div class="modal-body">
					<div class="contact-edit pl-5 pr-5">
						@csrf
						<input type="hidden" name="id_exchange" id="id_exchange">
						<div class="row">
							<div class="col-lg-12">
								<span class="pf-title">Titulo</span>									
								<div class="pf-field">
									<input type="text" name="title-exchange" id="title-exchange" maxlength="60" required>
									<span class="form-error" id="e_title_exchange" hidden> Debe agregar un titulo del talento</span>

								</div>
							</div>
							<div class="col-lg-6">
								<span class="pf-title">Precio</span>									
								<div class="pf-field">
									<input type="number" name="price-exchange" id="price-exchange" required>
									<span class="form-error" id="e_price_exchange" hidden> Debe agregar una cantidad válida</span>
								</div>
							</div>
							<div class="col-lg-6">
								<span class="pf-title">Talento</span>
								<div class="pf-field">
									<select name="talent-exchange" id="talent-exchange" class="chosen" required>
										<option value = "">Selecciona un talento</option>
										@foreach($talents as $talent)
										<option value="{{$talent->id}}">{{$talent->title}}</option>
										@endforeach
									</select>
									<span class="form-error" id="e_talent_exchange" hidden> Debe seleccionar un talento</span>
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
				<button type="button" data-dismiss="modal" class="bbutton">Cerrar</button>
				<button type="button" class="bbutton" id="nuevo-canje">Agregar</button>
			  </div>
			</form>
		</div>
	  </div>
	</div>	
</section>





<!-- ================================== MODAL ACTUALIZAR CANJE ============================================================= -->
<section id="section-modal-acutalizar-canjes">
	<div class="modal fade bd-example-modal-lg" id="modal-acutalizar-canje" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content pt-4">
			<h3>Actualizar Canje</h3>
			<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
				<span class="close-popup"><i class="la la-close"></i></span>
			</button>




			{{-- en esta zona se agrega --}}




		</div>
	  </div>
	</div>	
</section>
<!-- ================================== MODAL ACTUALIZAR CANJE ============================================================= -->

















<!--=================================  MODALS PARA AGREGAR Y EDITAR INFORMACION DE IMAGENES -->
<section id="div-modal-nueva-imagen">
	<div class="modal fade bd-example-modal-lg" id="modal-nueva-image" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content pt-4">
			<h3>Imagen para canje</h3>
			<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
				<span class="close-popup"><i class="la la-close"></i></span>
			</button>
			<div class="modal-body">
				<div class="contact-edit pl-5 pr-5">
					<div class="row">
						<div class="col-lg-6">
						<span class="pf-title">Imagen</span>									
							<div class="pf-field">
								<form action="{{route('new-image')}}"
								      class="dropzone"
								      id="dropimage"
								      enctype="multipart/form-data"
								      method="POST">
								      @csrf
								      <div class="dz-message" data-dz-message><span>Arrastra la imagen aqui para cargarla, puedes agregar una descripción, formato permitido: .jpeg, .jpg, .png</span></div>
								</form>
							</div>
						</div>
						<div class="col-lg-6">
							<form id="information-image" class="pl-1">
								@csrf
								<input type="hidden" id="talento_id_image" name="talento_id_image">
								<span class="pf-title">Descripción</span>									
								<div class="pf-field">
									<textarea id="description-image" name="description-image"></textarea>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="bbutton">Cerrar</button>
				<button type="button" class="bbutton" id="enviar-imagen">Agregar</button>
			</div>
		</div>
	  </div>
	</div>	
</section>



<!--=================================  MODALS PARA AGREGAR Y EDITAR INFORMACION DE IMAGENES -->
<section id="div-modal-edit-imagen">
	<div class="modal fade bd-example-modal" id="modal-edit-image" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content pt-4">
			<h3>Cambiar información de la imagen</h3>
			<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
				<span class="close-popup"><i class="la la-close"></i></span>
			</button>
			<div class="modal-body">
				<div class="contact-edit pl-5 pr-5">
					<div class="row">
						<div class="col-lg-12">
							<form id="form-information-image-edit" class="pl-1">
								@csrf
								<input type="hidden" id="talento_id_image_edit" name="talento_id_image_edit">
								<span class="pf-title">Descripción</span>									
								<div class="pf-field">
									<textarea id="description-image-edit" name="description-image-edit" required></textarea>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="bbutton" data-dismiss="modal">Cerrar</button>
				<button type="button" class="bbutton" id="b-editar-imagen">Guardar</button>
			</div>
		</div>
	  </div>
	</div>	
</section>


<!--=================================  MODALS PARA AGREGAR Y EDITAR INFORMACION DE VIDEOS -->
<section id="div-modal-nuevo-video">
	<div class="modal fade bd-example-modal-lg" id="modal-nuevo-video" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content pt-4">
			<h3>Video para el canje</h3>
			<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
				<span class="close-popup"><i class="la la-close"></i></span>
			</button>
			<div class="modal-body">
				<div class="contact-edit pl-5 pr-5">
					<div class="row">
						<div class="col-lg-6">
						<span class="pf-title">Video</span>									
							<div class="pf-field">
								<form action="{{route('new-video')}}"
								      class="dropzone"
								      id="dropvideo"
								      enctype="multipart/form-data"
								      method="POST">
								      @csrf
								      <div class="dz-message" data-dz-message><span>Arrastra el video aqui para cargarlo, puedes agregar una descripción, formato permitido: .mp4, tamaño maximo: 20Mb</span></div>
								</form>
							</div>
						</div>
						<div class="col-lg-6">
							<form id="information-video" class="pl-1">
								@csrf
								<input type="hidden" id="talento_id_video" name="talento_id_video">
								<span class="pf-title">Descripción</span>									
								<div class="pf-field">
									<textarea id="description-video" name="description-video"></textarea>
									<span class="form-error" id="e_description_talento" hidden> Debe agregar una descripción</span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="bbutton">Cerrar</button>
				<button type="button" class="bbutton" id="enviar-video">Agregar</button>
			</div>
		</div>
	  </div>
	</div>	
</section>



<!--=================================  MODALS PARA AGREGAR Y EDITAR INFORMACION DE PDF -->
<section id="div-modal-nuevo-pdf">
	<div class="modal fade bd-example-modal-lg" id="modal-nuevo-pdf" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content pt-4">
			<h3>Archivo Pdf para el canje</h3>
			<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
				<span class="close-popup"><i class="la la-close"></i></span>
			</button>
			<div class="modal-body">
				<div class="contact-edit pl-5 pr-5">
					<div class="row">
						<div class="col-lg-6">
						<span class="pf-title">Archivo PDF</span>									
							<div class="pf-field">
								<form action="{{route('new-pdf')}}"
								      class="dropzone"
								      id="droppdf"
								      enctype="multipart/form-data"
								      method="POST">
								      @csrf
								      <div class="dz-message" data-dz-message><span>Arrastra el archivo pdf aqui para cargarlo, puedes agregar una descripción, formato permitido: .pdf, tamaño maximo: {{ auth()->user()->suscription->plan->pdf_size }}Mb</span></div>
								</form>
							</div>
						</div>
						<form id="information-pdf" class="pl-1">
							@csrf
							<input type="hidden" id="talento_id_pdf" name="talento_id_pdf">
							<input type="hidden" id="input_pdf_size" name="input_pdf_size" value="{{ auth()->user()->suscription->plan->pdf_size }}">
							<div class="col-lg-12">
								<span class="pf-title">Nombre</span>									
								<div class="pf-field">
									<input type="text" name="name_pdf" id="name_pdf" maxlength="50" required>
									<span class="form-error" id="e_name_pdf" hidden> Debe agregar una cantidad válida</span>
								</div>
							</div>
							<div class="col-lg-12">
								<span class="pf-title">Descripción</span>									
								<div class="pf-field">
									<textarea id="description-pdf" name="description-pdf"></textarea>
								</div>

							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="bbutton">Cerrar</button>
				<button type="button" class="bbutton" id="enviar-pdf">Agregar</button>
			</div>
		</div>
	  </div>
	</div>	
</section>
<section id="div-modal-edit-pdf">

	<div class="modal fade bd-example-modal" id="modal-edit-pdf" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content pt-4">
			<h3>Cambiar información del Pdf</h3>
			<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
				<span class="close-popup"><i class="la la-close"></i></span>
			</button>
			<div class="modal-body">
				<div class="contact-edit pl-5 pr-5">
					<div class="row">
						<div class="col-lg-12">
							<form id="form-information-pdf-edit" class="pl-1">
								@csrf
								<span class="pf-title">Nombre</span>									
								<div class="pf-field">
									<input type="text" name="name_pdf_edit" id="name_pdf_edit" maxlength="50" required>
									<span class="form-error" id="e_name_pdf" hidden> Debe agregar una cantidad válida</span>
								</div>

								<input type="hidden" id="talento_id_pdf_edit" name="talento_id_pdf_edit">
								<span class="pf-title">Descripción</span>									
								<div class="pf-field">
									<textarea id="description-pdf-edit" name="description-pdf-edit" required></textarea>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="bbutton">Cerrar</button>
				<button type="button" class="bbutton" id="b-editar-pdf">Guardar</button>
			</div>
		</div>
	  </div>
	</div>	
</section>
<!--=================================  MODALS PARA AGREGAR Y EDITAR INFORMACION DE PDF -->



<!--=================================  MODALS PARA TRATOS -->
<section id="div-modal-trato">
	<div class="modal fade bd-example-modal-lg" id="modal-trato" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content pt-4">
				<!-- <h3>Información del trato</h3> -->
				<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
					<span class="close-popup"><i class="la la-close"></i></span>
				</button>
				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="blog-sec">
									<div class="row" id="masonry">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="my-blog div-boton-trato" id="div-solicitado-canje">
												<div class="blog-thumb" id="imagen-solicitado-canje">
												</div>
												<div class="blog-details">
													<h3>Canje Solicitado</h3>
													<p id="solicitado-nombre-canje"></p>
												</div>
											</div>

											<div class="my-blog div-boton-trato" id="div-solicitado-no-canje">
												<div class="blog-thumb">
													<a href="#" title=""><img class="canje-img" src="{{ asset('images/exchanges/default.jpg') }}" alt="" />
													</a>
												</div>
												<div class="blog-details">
													<h3>Solicitud</h3>
													<p id="solicitado-nombre-no-canje"></p>
												</div>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="my-blog div-boton-trato" id="div-propuesto-canje" > 
												<div class="blog-thumb" id="imagen-propuesto-canje">
													
												</div>
												<div class="blog-details">
													<h3>Canje Propuesto</h3>
													<p id="propuesto-nombre-canje"></p>
												</div>
											</div>

											<div class="my-blog div-boton-trato" id="div-propuesto-no-canje" > 
												<div class="blog-thumb">
													<a href="#" title=""><img class="canje-img" src="{{ asset('images/exchanges/default.jpg') }}" alt="" /></a>
												</div>
												<div class="blog-details">
													<h3>Propuesta</h3>
													<p id="propuesto-nombre-no-canje"></p>
												</div>
											</div>
											<div class="my-blog div-boton-trato" id="div-propuesto-pago" > 
												<div class="blog-thumb">
													<img class="canje-img" src="{{ asset('images/exchanges/default.jpg') }}" alt="" />
												</div>
												<div class="blog-details">
													<h3>Pago por unidad</h3>
													<p id="propuesto-nombre-pago"></p>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div  class="contact-edit pl-5 pr-5 mb-2">
				 		<div class="bloglist-sec">
				 			<div class="blogpost">
				 				<div class="blog-postdetail div-boton-trato" id="div-info-canje-solicitado">
									<h3>
										Detalles de requerimientos de solicitud
									</h3>
									<div id="descripcion-canje-solicitado">
										
									</div>
				 				</div>
				 				<div class="blog-postdetail div-boton-trato" id="div-info-no-canje-solicitado">
									<h3>
										Detalles de requerimientos de solicitud
									</h3>
									<div id="descripcion-no-canje-solicitado">
										
									</div>
				 				</div>
				 			</div>
				 		</div>
					</div>

					<div  class="contact-edit pl-5 pr-5 mb-2" >
				 		<div class="bloglist-sec">
				 			<div class="blogpost">
				 				<div class="blog-postdetail div-boton-trato" id="div-info-canje-propuesto">
									<h3>
										Detalles de propuesta
									</h3>
									<div id="descripcion-canje-propuesto">
										
									</div>
				 				</div>
				 				<div class="blog-postdetail div-boton-trato" id="div-info-no-canje-propuesto">
									<h3>
										Detalles de propuesta
									</h3>
									<div id="descripcion-no-canje-propuesto">
										
									</div>
				 				</div>
				 			</div>
				 		</div>
					</div>

					<div  class="contact-edit pl-5 pr-5 mb-2">			
						<div class="alert alert-success" role="alert" id="alert-trato-aceptado">
						 	El trato ha sido aprobado
						</div>
						<div class="alert alert-success" role="alert" id="alert-trato-rechazado">
							El trato fue rechazado
						</div>

						<div class="alert alert-success" role="alert" id="alert-trato-p-recibido">
							El trato o pago propuesto se ha marcado como recibido
						</div>

						<div class="alert alert-success" role="alert" id="alert-trato-s-recibido">
							El trato solicitado se ha marcado como recibido
						</div>

						<div class="alert alert-success" role="alert" id="alert-comentario">
							La valoración y el comentario han sido enviados
						</div>
					</div>

					<div  class="contact-edit pl-5 pr-5 mb-2 div-boton-trato" id="div-espera-recibido">
		 				<div class="job-overview divide">
				 			<!-- <h3>Estatus del Trato</h3> -->
				 			<p class="text-center">Para activar el trato haz clic en Aprobar</p>
				 			<ul>
				 				<li><i class="la la-clock-o"></i><h3>Estatus </h3><span>En espera</span></li>
				 				<li> <a class="bbutton mt-0" id="aprobar-trato" href="javascript:void(0)" title="">Aprobar</a></li>
				 				<li> <a class="bbutton mt-0" id="omitir-trato" href="javascript:void(0)" title="">Omitir</a></li>
				 			</ul>
				 		</div>
				 	</div>

					<div  class="contact-edit pl-5 pr-5 mb-2 div-boton-trato" id="div-espera-propuesto">
		 				<div class="job-overview divide">
				 			<!-- <h3>Estatus del Trato</h3> -->
				 			<ul>
				 				<li><i class="la la-clock-o"></i><h3>Estatus </h3><span>En espera</span></li>
				 			</ul>
				 			<p class="text-center">Debes esperar a que el trato sea aprobado u omtido</p>
				 		</div>
				 	</div>


					<div  class="contact-edit pl-5 pr-5 mb-2 div-boton-trato" id="div-aprobado">
		 				<div class="job-overview divide">
				 			<!-- <h3>Estatus del Trato</h3> -->
				 			<p class="ya-aprobado">Haz clic en Recibido cuando obtengas tu beneficio del trato</p>
				 			<ul>
				 				<li><i class="la la-thumbs-up"></i><h3>Estatus </h3><span>Aprobado</span></li>

				 				<li id="datos-usuario" class="pl-0">

				 				</li>
				 				<li> <a class="bbutton mt-0 ya-aprobado" id="b-recibido" href="#" title="">Recibido</a></li>
				 			</ul>
				 		</div>
				 	</div>

					<div  class="contact-edit pl-5 pr-5 mb-2 div-boton-trato" id="div-omtido">
		 				<div class="job-overview divide">
				 			<!-- <h3>Estatus del Trato</h3> -->
				 			<ul>
				 				<li><i class="la la-thumbs-down"></i><h3>Estatus </h3><span>Omitido</span></li>
				 			</ul>
				 		</div>
				 	</div>

					<div  class="contact-edit pl-5 pr-5 mb-2 div-boton-trato" id="div-evaluado">				
		 				<div class="job-overview divide">
				 			<!-- <h3>Estatus del Trato</h3> -->
				 			<ul>
				 				<li><i class="la la-check"></i><h3>Estatus </h3><span>Aprobado y evaluado</span></li>
				 			</ul>
				 		</div>
				 	</div>

					<div class="contact-edit pl-5 pr-5 mb-2 div-boton-trato" id="div-comentario">				
						<div class="row">
							<div class="col-lg-12">
								<span class="pf-title">Deja tu comentario u opinión por el servicio recibido</span>		
								<div class="pf-field">
									<textarea id="comment" name="comment" rows="2"></textarea>
								</div>
							</div>
							<div class="col-lg-12">
								<span>Haz tu valoración </span>
								<div class="star-rating">
									<span class="la la-star-o" data-rating="1" style="color: #ff9200"></span>
									<span class="la la-star-o" data-rating="2" style="color: #ff9200"></span>
									<span class="la la-star-o" data-rating="3" style="color: #ff9200"></span>
									<span class="la la-star-o" data-rating="4" style="color: #ff9200"></span>
									<span class="la la-star-o" data-rating="5" style="color: #ff9200"></span>
									<input type="hidden" name="whatever1" id="rating" class="rating-value" value="0">
								</div>

								<div class="upload-info pull-right">
									<a href="javascript:void(0)" id="boton-valorar">Enviar valoración</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>

<!--=================================  MODALS PARA ELIMINAR TALENTO-->
<section id="div-modal-nuevo-pdf">
	<div class="modal fade bd-example" id="modal-eliminar-talento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content pt-4">
				<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
					<span class="close-popup"><i class="la la-close"></i></span>
				</button>
				<div class="modal-body text-center">
					<input type="hidden" id="m-eliminar-talento">
					<p>¿Deseas eliminar el Talento <strong id="t-talento">Talento</strong>?</p>
					<div>
						<button type="button" class="bbutton ml-4 mr-4" data-dismiss="modal">Cancelar</button>
						<button type="button" class="bbutton ml-4 mr-4" id="eliminar-talento" >Si, eliminar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection


@section('footer')
	@include('includes.footer')
@endsection


@section('scripts')
<!-- <script src="https://code.jquery.com/jquery-latest.min.js"></script> -->
<script src="{{URL::asset('js/input-tel/intlTelInput-jquery.min.js') }}"></script>
<script src="{{URL::asset('js/dropzone.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/mi-cuenta.js')}}" type="text/javascript"></script>
@endsection
