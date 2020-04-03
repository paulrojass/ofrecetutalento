@extends('layouts.tema')

@section('title', 'Mi cuenta')

@section('no-user-link', '')

@section('header_type', 'gradient')

@section('css')
	<link rel="stylesheet" href="{{ URL::asset('css/dropzone.css') }}">
@endsection

@section('content')
<section>
	<input type="hidden" name="auth_user" id=auth_user value="{{ auth()->user()->id }}">
	<div class="block remove-top">
		<div class="container">
			<div class="row no-gape">
				<aside class="col-lg-3 column border-right">
					<div class="widget">
						<div class="tree_widget-sec">
							<ul>
								<li><a  href="javascript:void(0)" id="a-perfil" onclick="mostrar('#mi-perfil','#a-perfil')" title=""><i class="la la-user"></i>Mi perfil</a></li>
								@if(auth()->user()->suscription->plan_id > 1)
									<li><a href="javascript:void(0)" id="a-talentos" onclick="mostrar('#talentos','#a-talentos')" title=""><i class="la la-diamond"></i>Talentos</a></li>
									<li><a href="javascript:void(0)" id="a-canjes" onclick="mostrar('#canjes', '#a-canjes')" title=""><i class="la la-lightbulb-o"></i>Canjes</a></li>
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

				<div class="col-lg-9 column">

					<div id="mi-perfil">
						<div class="padding-left">
							<div class="manage-jobs-sec">
								<form files="true" enctype="multipart/form-data" id="form-avatar">
									@csrf
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

<!-- Modal Idioma -->
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
				<button type="button" data-dismiss="modal" class="boton-normal">Cerrar</button>
				<button type="button" class="boton-normal" id="nuevo-canje">Agregar</button>
			  </div>
			</form>
		</div>
	  </div>
	</div>	
</section>

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
								<input type="hidden" id="canje_id_image" name="canje_id_image">
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
				<button type="button" data-dismiss="modal" class="boton-normal">Cerrar</button>
				<button type="button" class="boton-normal" id="enviar-imagen">Agregar</button>
			</div>
		</div>
	  </div>
	</div>	
</section>
<!-- Editar Inf de imagenes videos y pdf -->
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
								<input type="hidden" id="canje_id_image_edit" name="canje_id_image_edit">
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
				<button type="button" data-dismiss="modal" class="boton-normal">Cerrar</button>
				<button type="button" class="boton-normal" id="b-editar-imagen">Guardar</button>
			</div>
		</div>
	  </div>
	</div>	
</section>
<!--=================================  MODALS PARA AGREGAR Y EDITAR INFORMACION DE IMAGENES -->

<!--=================================  MODALS PARA AGREGAR Y EDITAR INFORMACION DE VIDEOS -->
<section id="div-modal-nuevo-video">
	<!-- Modal Idioma -->
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
								<input type="hidden" id="canje_id_video" name="canje_id_video">
								<span class="pf-title">Descripción</span>									
								<div class="pf-field">
									<textarea id="description-video" name="description-video"></textarea>
									<span class="form-error" id="e_description_exchange" hidden> Debe agregar una descripción</span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="boton-normal">Cerrar</button>
				<button type="button" class="boton-normal" id="enviar-video">Agregar</button>
			</div>
		</div>
	  </div>
	</div>	
</section>
<!--=================================  MODALS PARA AGREGAR Y EDITAR INFORMACION DE VIDEOS -->
<!--=================================  MODALS PARA AGREGAR Y EDITAR INFORMACION DE PDF -->
<section id="div-modal-nuevo-pdf">
	<!-- Modal Idioma -->
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
							<input type="hidden" id="canje_id_pdf" name="canje_id_pdf">
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
				<button type="button" data-dismiss="modal" class="boton-normal">Cerrar</button>
				<button type="button" class="boton-normal" id="enviar-pdf">Agregar</button>
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

								<input type="hidden" id="canje_id_pdf_edit" name="canje_id_pdf_edit">
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
				<button type="button" data-dismiss="modal" class="boton-normal">Cerrar</button>
				<button type="button" class="boton-normal" id="b-editar-pdf">Guardar</button>
			</div>
		</div>
	  </div>
	</div>	
</section>
<!--=================================  MODALS PARA AGREGAR Y EDITAR INFORMACION DE PDF -->



<!--=================================  MODALS PARA TRATOS -->
<section id="div-modal-nuevo-pdf">
	<!-- Modal Idioma -->
	<div class="modal fade bd-example-modal-lg" id="modal-trato" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content pt-4">
			<h3>Información del trato</h3>
			<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
				<span class="close-popup"><i class="la la-close"></i></span>
			</button>
			<div class="modal-body">
				<div id="info-trato-talento" class="contact-edit pl-5 pr-5 mb-2">
					{{-- Si se solicita un talento --}}
				</div>
				<div id="info-trato-canje-pago" class="contact-edit pl-5 pr-5 mb-2">
					{{-- Pagar precio de canje o con otro canje --}}
				</div>







				<div  class="contact-edit pl-5 pr-5 mb-2">
					<div class="row" id="aprobar">
						<div class="col-sm">
							<p id="info-trato-aprobar">

							</p>
						</div>
						<div class="col-sm" id="div-boton-aprobar">

			 			</div>
					</div>

					<div class="alert alert-light" role="alert" id="alert-trato-aceptado">
					 	El trato ha sido aprobado
					</div>
					<div class="alert alert-light" role="alert" id="alert-trato-rechazado">
						El trato fue rechazado
					</div>

					<div class="alert alert-light" role="alert" id="alert-trato-p-recibido">
						El trato o pago propuesto se ha marcado como recibido
					</div>

					<div class="alert alert-light" role="alert" id="alert-trato-s-recibido">
						El trato solicitado se ha marcado como recibido
					</div>

					<div class="alert alert-light" role="alert" id="alert-comentario">
						La valoración y el comentario han sido enviados
					</div>

				</div>

				<div id="valoracion" class="contact-edit pl-5 pr-5 mb-2">
					<div class="row">
						<div class="col-lg-12">
							<span class="pf-title">Deja tu comentario u opinión por el servicio recibido</span>		
							<div class="pf-field">
								<textarea id="comment" name="comment" rows="2"></textarea>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="star-rating">
								<span class="la la-star-o" data-rating="1"></span>
								<span class="la la-star-o" data-rating="2"></span>
								<span class="la la-star-o" data-rating="3"></span>
								<span class="la la-star-o" data-rating="4"></span>
								<span class="la la-star-o" data-rating="5"></span>
								<input type="hidden" name="whatever1" id="rating" class="rating-value" value="0">
							</div>

							<div class="upload-info pull-right">
								<a href="javascript:void(0)" data-canje="" data-tipo="" id="boton-valorar">Enviar valoración</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>	
</section>
<!--=================================  MODALS PARA TRATOS -->

@endsection

@section('scripts')
<!-- <link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/bootstrap-datepicker.css')}}" />
<script src="{{URL::asset('tema/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/tag.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/bootstrap-datepicker.js')}}" type="text/javascript"></script> -->
<script src="{{URL::asset('js/dropzone.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/mi-cuenta.js')}}" type="text/javascript"></script>



@endsection