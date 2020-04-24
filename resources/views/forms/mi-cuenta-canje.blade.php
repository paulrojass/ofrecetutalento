<div id="d-no-editar-canje" class="border-title"><h3>{{ $canje->title }} (editar)</h3>
	<a id="no-editar-canje" title="">
		<i class="la la-edit"></i> Cancelar
	</a>
</div>
<!-- <div class="edu-history-sec">--> 


<div class="padding-left">

	<div class="profile-title" id="imagen-canje">
		<form files="true" enctype="multipart/form-data" id="form-imagen-canje">
			@csrf
			<input type="hidden" name="input-image-canje" id="input-image-canje" value="{{ $canje->id }}">
			<div class="upload-img-bar">
				<span>
					<img id="img-canje" src="{{ 'images/exchanges/'.$canje->image }}" style="object-fit: cover; width: 160px; height: 80px; cursor:pointer" alt="" />
				</span>
				<div class="upload-info">
					<div id="ll-canje"></div>
					<input id="img-canje-file" name="img-canje-file" type="file" accept="image/*" capture style="display:none">
					<a id="button-image-canje" title="">Cambiar imagen</a>
					<span><strong>Portada de Canje. </strong>Dimensiones minimas: 800x600 y formatos permitidos: .jpg & .png</span>
				</div>
			</div>
		</form>
	</div>

	<div class="profile-form-edit">
		<form id="formulario-canje">
			<div class="row">
				@csrf
				<input type="hidden" name="a-form-canje-id" id="a-form-canje-id" value="{{ $canje->id }}">
				<div class="col-lg-12">
					<span class="pf-title">Titulo</span>
					<div class="pf-field">
						<input type="text" placeholder="Indique un título para el canje" value="{{ $canje->title }}" id="a-title-exchange" name="a-title-exchange" required/>
						<span class="form-error" id="e_a_title_exchange" hidden> Debe agregar un título al canje</span>
					</div>
				</div>
				<div class="col-lg-6">
					<span class="pf-title">Precio</span>									
					<div class="pf-field">
						<input type="number" name="a-price-exchange" id="a-price-exchange" value="{{ $canje->price }}" required>
						<span class="form-error" id="e_a_price_exchange" hidden> Debe agregar una cantidad válida</span>
					</div>
				</div>
				<div class="col-lg-6">
					<span class="pf-title">Talento</span>
					<div class="pf-field">
						<select name="a-talent-exchange" id="a-talent-exchange" class="chosen" required value={{ $canje->talent_id }}>
							<option value = "">Selecciona un talento</option>
							@foreach(auth()->user()->talents as $talent)
							<option value="{{$talent->id}}">{{$talent->title}}</option>
							@endforeach
						</select>
						<span class="form-error" id="e_a_talent_exchange" hidden> Debe seleccionar un talento</span>
					</div>
					
				</div>
				<div class="col-lg-12">
					<span class="pf-title">Descripcion</span>
					<div class="pf-field">
						<textarea id="a-description-exchange" name="a-description-exchange" required>{{ $canje->description }}</textarea>
						<span class="form-error" id="e_a_description_exchange" hidden> Debe agregar una descripción</span>
					</div>
				</div>
				<div class="col-lg-12">
					<button type="submit" id="actualizar-canje">Actualizar</button>
				</div>
			</div>
		</form>
	</div>

{{--	<div class="border-title"><h3 id="titulo-image">Imágenes <span class="message-file"></span></h3>
		<a id="agregar-image" data-value="{{ $canje->id }}" data-toggle="modal" data-target="#modal-nueva-image"><i class="la la-plus"></i> Agregar imagen</a>
	</div>

	<div class="social-edit"  id="listado-image">
 		<div class="manage-jobs-sec">
 			@if ($imagenes->count() > 0)
	 		<table class="mt-2">
	 			<tbody>
	 				@foreach ($imagenes as $imagen)
		 				<tr>
		 					<td class="col-2">
		 						<img src="{{ 'files/image/'.$imagen->location }}" style=" object-fit: cover; max-width: 100px; max-height: 50px"alt="">
		 					</td>
		 					<td class="col-9">
		 						<span>{{ $imagen->description }}</span>
		 					</td>
		 					<td class="col-1">
		 						<ul class="action_job pull-right">
		 							<li><span>editar información</span><a class="editar_inf_image" data-value="{{ $imagen->id }}" data-description="{{ $imagen->description }}" data-toggle="modal" data-target="#modal-edit-image" href="#" title=""><i class="la la-pencil"></i></a></li>
		 							<li><span>eliminar</span><a class="eliminar_imagen_canje" data-value="{{ $imagen->id }}" data-canje="{{ $canje->id }}" href="javascript:void(0)" title=""><i class="la la-trash-o"></i></a></li>
		 						</ul>
		 					</td>
		 				</tr>
	 				@endforeach
	 			</tbody>
	 		</table>
 			@else
	 		<table class="mt-2">
	 			<tbody>
		 			<tr>
		 				<td><span>No ha agregado imágenes para este canje</span></td>
		 			</tr>
		 		</tbody>
		 	</table>
 			@endif
 		</div>
	</div>

	<div class="border-title"><h3 id="titulo-video">Videos <span class="message-file"></span></h3>
		<a id="agregar-video" title="" data-toggle="modal" data-target="#modal-nuevo-video"><i class="la la-plus"></i> Agregar video</a>
	</div>
	<div class="social-edit"  id="listado-video">
 		<div class="manage-jobs-sec">
 			@if ($videos->count() > 0)
	 		<table class="mt-2">
	 			<tbody>
	 				@foreach ($videos as $video)
		 				<tr>
		 					<td class="col-2 pr-4">
								<div class="embed-responsive embed-responsive-16by9">
									@if (Str::contains($video->location, 'https://'))
									 {!!$video->location!!}
									@else
									<video class="embed-responsive-item" controls>
									    <source src="{{URL::asset('files/video/'.$video->location)}}" >
									    Sorry, your browser doesn't support embedded videos.
									</video>
									<!-- <iframe class="embed-responsive-item" src="{{URL::asset('files/video/'.$video->location)}}" allowfullscreen></iframe> -->
									@endif
								</div>
		 					</td>
		 					<td class="col-9">
		 						<span>{{ $video->description }}</span>
		 					</td>
		 					<td class="col-1">
		 						<ul class="action_job pull-right">
		 							<li><span>editar información</span><a class="editar_inf_image" data-value="{{ $video->id }}" data-description="{{ $video->description }}" data-toggle="modal" data-target="#modal-edit-image" href="#" title=""><i class="la la-pencil"></i></a></li>
		 							<li><span>eliminar</span><a class="eliminar_imagen_canje" data-value="{{ $video->id }}" data-canje="{{ $canje->id }}" href="javascript:void(0)" title=""><i class="la la-trash-o"></i></a></li>
		 						</ul>
		 					</td>
		 				</tr>
	 				@endforeach
	 			</tbody>
	 		</table>
 			@else
	 		<table class="mt-2">
	 			<tbody>
		 			<tr>
		 				<td><span>No ha agregado videos para este canje</span></td>
		 			</tr>
		 		</tbody>
		 	</table>
 			@endif
 		</div>
	</div>


	<div class="border-title"><h3 id="titulo-pdf">Archivos Pdf <span class="message-file"></span></h3>
		<a id="agregar-pdf" title="" data-toggle="modal" data-target="#modal-nuevo-pdf"><i class="la la-plus"></i> Agregar PDF</a>
	</div>
	<div class="social-edit"  id="listado-pdf">
 		<div class="manage-jobs-sec">
 			@if ($pdfs->count() > 0)
	 		<table class="mt-2">
	 			<tbody>
	 				@foreach ($pdfs as $pdf)
		 				<tr>
		 					<td class="col-3 pr-4">
								<div class="table-list-title">
									<h3><a href="{{ URL::asset('files/pdf/'.$pdf->location) }}" download="{{ $pdf->name.'.pdf' }}" title="">{{ $pdf->name }}</a></h3>
								</div>
		 					</td>
		 					<td class="col-7">
		 						<span>{{ $pdf->description }}</span>
		 					</td>
		 					<td class="col-1">
		 						<ul class="action_job pull-right">
		 							<li><span>editar información</span><a class="editar_inf_pdf" data-value="{{ $pdf->id }}" data-name="{{ $pdf->name }}" data-description="{{ $pdf->description }}" data-toggle="modal" data-target="#modal-edit-pdf" href="#" title=""><i class="la la-pencil"></i></a></li>
		 							<li><span>eliminar</span><a class="eliminar_imagen_canje" data-value="{{ $pdf->id }}" data-canje="{{ $canje->id }}" href="javascript:void(0)" title=""><i class="la la-trash-o"></i></a></li>
		 						</ul>
		 					</td>
		 				</tr>
	 				@endforeach
	 			</tbody>
	 		</table>
 			@else
	 		<table class="mt-2">
	 			<tbody>
		 			<tr>
		 				<td><span>No ha agregado archivos pdf para este canje</span></td>
		 			</tr>
		 		</tbody>
		 	</table>
 			@endif
 		</div>
	</div>--}}
</div>