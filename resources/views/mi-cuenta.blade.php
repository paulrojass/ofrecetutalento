@extends('layouts.tema')

@section('title', 'Mi cuenta')

@section('header_type', 'stick-top style3')


@section('content')

@csrf
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
	<div class="block remove-top">
		<div class="container">
			<div class="row no-gape">
				<aside class="col-lg-3 column border-right">
					<div class="widget">
						<div class="tree_widget-sec">
							<ul>
								<li><a id="a-perfil" onclick="mostrar('#mi-perfil','#a-perfil')" title=""><i class="la la-file-text"></i>Mi perfil</a></li>
								<li><a id="a-talentos" onclick="mostrar('#talentos','#a-talentos')" title=""><i class="la la-diamond"></i>Talentos</a></li>
								<li><a id="a-tratos" onclick="mostrar('#tratos', '#a-tratos')" title=""><i class="la la-thumbs-up"></i>Tratos</a></li>
								<li><a id="a-mensajes" onclick="mostrar('#mensajes', '#a-mensajes')" title=""><i class="la la-comments"></i>Mensajes</a></li>

								<li><a href="#" title=""><i class="la la-unlink"></i>Cerrar Sesión</a></li>
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
								<div class="border-title"><h3>Talentos</h3><a href="#" title=""><i class="la la-plus"></i> Agregar Talento</a></div>
								<div class="edu-history-sec" class="ml-5">
									<h5>Talentos agregados: {{auth()->user()->talents->count()}} </h5>
									@foreach(auth()->user()->talents as $talent)
									<div class="edu-history style2">
										<i></i>
										<div class="edu-hisinfo">
											<h3>{{ $talent->title }}<br><span>{{ $talent->category->industry->name }} -  {{ $talent->category->name }}</span></h3>
											<i>Nivel de experiencia: <strong>{{ $talent->level }}</strong></i>
											<p>{{ $talent->description }}</p>
										</div>
										<ul class="action_job">
											<li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
											<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
										</ul>
									</div>
									@endforeach
								</div>
							</div>

							<div id="tratos">
								<div class="border-title"><h3>Tratos</h3><a href="#" title=""><i class="la la-plus"></i> Agregar Trato</a></div>
								<div class="mini-portfolio">
									<div class="block">
										<div class="container">
											<div class="row">
												<div class="col-lg-12">
													<div class="filterbar">
														<h5>98 Tratos</h5>
														<div class="sortby-sec">
															<span>Sort by</span>
															<select data-placeholder="Most Recent" class="chosen">
																<option>Most Recent</option>
																<option>Most Recent</option>
																<option>Most Recent</option>
																<option>Most Recent</option>
															</select>
															<select data-placeholder="20 Per Page" class="chosen">
																<option>30 Per Page</option>
																<option>40 Per Page</option>
																<option>50 Per Page</option>
																<option>60 Per Page</option>
															</select>
														</div>
													</div>
													<div class="job-grid-sec">
														<div class="row">
															<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
																<div class="job-grid border">
																	<div class="job-title-sec">
																		<div class="c-logo"> <img src="http://placehold.it/235x115" alt="" /> </div>
																		<h3><a href="#" title="">Web Designer / Developer</a></h3>
																		<span>Massimo Artemisis</span>
																		<span class="fav-job"><i class="la la-heart-o"></i></span>
																	</div>
																	<span class="job-lctn">Sacramento, California</span>
																	<a  href="#" title="">APPLY NOW</a>
																</div><!-- JOB Grid -->
															</div>
														</div>
													</div>
													<div class="pagination">
														<ul>
															<li class="prev"><a href=""><i class="la la-long-arrow-left"></i> Prev</a></li>
															<li><a href="">1</a></li>
															<li class="active"><a href="">2</a></li>
															<li><a href="">3</a></li>
															<li><span class="delimeter">...</span></li>
															<li><a href="">14</a></li>
															<li class="next"><a href="">Next <i class="la la-long-arrow-right"></i></a></li>
														</ul>
													</div><!-- Pagination -->
												</div>
											</div>
										</div>
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


<!-- Modal -->
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
						<span class="pf-title result">Nivel: <b></b></span>
						<input type="range" class="slider" min="0" max="10" id="level" name="level" required>
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
<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/bootstrap-datepicker.css')}}" />
<script src="{{URL::asset('tema/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/tag.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>

<script>
	$(function(){
		informacionPerfil();
		mostrar('#mi-perfil', '#a-perfil');

		// Read value on page load
		$(".result b").html($("#level").val());

		// Read value on change
		$("#level").change(function(){
		    $(".result b").html($(this).val());
		});



		$('.datepicker').datepicker({
		    format: 'mm-dd-yyyy'
		});

		$('#avatar').change(function(){
			cambiarFoto();
		});

		$("#img-avatar").click(function () {
			$("#avatar").trigger('click');
			$('.alert').alert('close')
		});
		$("#button-avatar").click(function () {
			$("#avatar").trigger('click');
			$('.alert').alert('close')
		});
	});

	$('#mi-perfil-info').on('click', '#editar-perfil', function(e){
		e.preventDefault();
		editarPerfil();
	});

	$('#mi-perfil-info').on('click', '#no-editar', function(e){
		e.preventDefault();
		informacionPerfil();
	});

	$('#mi-perfil-info').on('click','.elimina-idioma',function(e){
		var id = $(this).attr("value");
		var _token = $("input[name='_token']").val();
		$.ajax({
			url: 'eliminar-idioma',
			type: 'post',
			data: {id : id, _token:_token},
		})
		.done(function(response) {
			informacionPerfil();
		});			
	});

	$('#nuevo-idioma').click( function(){
		var language = $('#language').val();
		var level = $('#level').val();
		var _token = $("input[name='_token']").val();
		$.ajax({
			url: 'cambiar-idioma',
			type: 'post',
			data: {language : language, level:level , _token:_token},
		})
		.done(function(response) {
			informacionPerfil();
			$('#modal-idioma').modal('hide');
			$("#form-idioma")[0].reset();
		});
	});

	$('#mi-perfil-info').on('click', '#button-registro', function(e){
		e.preventDefault();
		var dataString = $('#form-actualizar-usuario').serialize();
		$.ajax({
			url: 'actualizar_usuario',
			type: 'get',
			data: dataString,
			contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
			processData: false // NEEDED, DON'T OMIT THIS
		})
		.done(function(response) {
			informacionPerfil();
			$('html, body').animate({scrollTop:0}, 1250);
		});
	});



	function cambiarFoto(){
		var formData = new FormData();
		formData.append('avatar', $('#avatar')[0].files[0]);
		formData.append('_token', '{{csrf_token()}}');
		formData.append('id', '{{Auth::User()->id}}');
		$.ajax({
			url: 'cambiar-foto',
			type: 'post',
			data: formData,
			contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
			processData: false // NEEDED, DON'T OMIT THIS
		})
		.done(function(response) {
			$('#div-imagen').html(response);
			$("#ll").html('<div class="alert alert-success" role="alert">La foto ha cambiado exitosamente</div>');
		})
		.fail(function() {
			$("#ll").html('<div class="alert alert-danger" role="alert">El formato del archivo debe ser de imagen (jpg, jpeg, png)</div>');
		});
		
	}

	function mostrar(div,a){
		var divs = ['#mi-perfil', '#talentos', '#tratos', '#mensajes'];
		var as = ['#a-perfil', '#a-talentos', '#a-tratos', '#a-mensajes'];
		$.each(divs, function(index, value){
			$(value).fadeOut();
		});
		$.each(as, function(index, value){
			$(value+' i').css('color','#888888');
			$(value).css('color','#888888');
		});


		$(div).fadeIn();
		$(a+' i').css('color','#8b91dd');
		$(a).css('color','#8b91dd');
	}

	function informacionPerfil(){
		$.ajax({
			url: 'info-perfil',
			type: 'Get',
			dataType: 'html',
		})
		.done(function(data) {
			$('#mi-perfil-info').html(data);
		})	
	}

	function editarPerfil(){
		$.ajax({
			url: 'form-perfil',
			type: 'Get',
			dataType: 'html',
		})
		.done(function(data) {
			$('#mi-perfil-info').html(data);
		})	
	}
	
</script>
@endsection