@extends('layouts.tema')

@section('title', 'Mi cuenta')

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
								@endif
								<li><a href="javascript:void(0)" id="a-tratos-r" onclick="mostrar('#tratos-r', '#a-tratos-r')" title=""><i class="la la-arrow-left"></i>Tratos Recibidos</a></li>
								<li><a href="javascript:void(0)" id="a-tratos-p" onclick="mostrar('#tratos-p', '#a-tratos-p')" title=""><i class="la la-arrow-right"></i>Tratos Propuestos</a></li>
								<li><a href="{{ url('mensajes') }}" id="a-mensajes" title=""><i class="la la-comments"></i>Mensajes</a></li>
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
									<span class="form-error" id="e_description_exchange" hidden> Debe agregar una descripción</span>
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


<section id="div-modal-nueva-imagen">
	<!-- Modal Idioma -->
	<div class="modal fade bd-example-modal-lg" id="modal-nueva-image" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content pt-4">
			<h3>Imagen para canje</h3>
			<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
				<span class="close-popup"><i class="la la-close"></i></span>
			</button>

                    {!! Form::open([ 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                    <div class="dz-message" style="height:200px;">
                        Drop your files here
                    </div>
                    <div class="dropzone-previews"></div>
                    <button type="submit" class="btn btn-success" id="submit">Save</button>
                    {!! Form::close() !!}



			<form id="form-new-image">
			  <div class="modal-body">
					<div class="contact-edit pl-5 pr-5">
						@csrf
						<input type="hidden" name="id_exchange" id="id_exchange">
						<div class="row">
							<div class="col-lg-12">
								<span class="pf-title">Titulo</span>									
								<div class="pf-field">
									<input type="text" name="title-image" id="title-image" maxlength="60" required>
									<span class="form-error" id="e_title_exchange" hidden> Debe agregar un titulo para la imagen</span>

								</div>
							</div>
							<div class="col-lg-12">
								<span class="pf-title">Descripción</span>									
								<div class="pf-field">
									<textarea id="description-image" name="description-image"></textarea>
									<span class="form-error" id="e_description_exchange" hidden> Debe agregar una descripción</span>
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

<section id="div-modal-nuevo-video">
	<!-- Modal Idioma -->
	<div class="modal fade bd-example-modal-lg" id="modal-nuevo-video" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content pt-4">
			<h3>Nuevo Video</h3>
			<button type="button" class="close-b" data-dismiss="modal" aria-label="Close">
				<span class="close-popup"><i class="la la-close"></i></span>
			</button>
			<form id="form-new-video" files="true" enctype="multipart/form-data">
			  <div class="modal-body">
					<div class="contact-edit pl-5 pr-5">
						@csrf
						<input type="hidden" name="id_exchange" id="id_exchange">
						<div class="row">
							<div class="col-lg-12">
								<div class="upload-img-bar">
									<div class="upload-info">
										<div id="mensaje-nuevo-video"></div>

										<input id="input-new-video" name="input-new-video" type="file" accept="video/mp4">
										<a id="button-input-new-video" title="">Agregar video</a>
										<span>Tamaño maximo 1Mb, formato: mp4</span>
									</div>
								</div>
							</div>							
							<div class="col-lg-6">
								<span class="pf-title">Titulo</span>									
								<div class="pf-field">
									<input type="text" name="title-video" id="title-video" maxlength="60" required>
									<span class="form-error" id="e_title_exchange" hidden> Debe agregar un titulo para la video</span>

								</div>
							</div>
							<div class="col-lg-6">
								<span class="pf-title">Descripción</span>									
								<div class="pf-field">
									<textarea id="description-video" name="description-video"></textarea>
									<span class="form-error" id="e_description_exchange" hidden> Debe agregar una descripción</span>
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




@endsection




@section('scripts')
<!-- <link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/bootstrap-datepicker.css')}}" />
<script src="{{URL::asset('tema/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/tag.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/bootstrap-datepicker.js')}}" type="text/javascript"></script> -->

<script src="{{URL::asset('js/dropzone.js')}}" type="text/javascript"></script>



<script src="{{URL::asset('js/mi-cuenta.js')}}" type="text/javascript"></script>
@endsection