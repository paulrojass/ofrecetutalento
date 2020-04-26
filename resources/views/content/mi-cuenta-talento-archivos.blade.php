<div id="d-no-editar-archivos-talento" class="border-title">
	<h3>Archivos de Talento: {{ $talento->title }}</h3>
	<a id="no-editar-archivos-talento" title="">
		<i class="la la-arrow-left"></i> Volver a talentos
	</a>
</div>
<!-- <div class="edu-history-sec">--> 


<div class="padding-left">
	<div class="border-title"><h3 id="titulo-image">Imágenes <span class="message-file"></span></h3>
		<a id="agregar-image" data-value="{{ $talento->id }}" data-toggle="modal" data-target="#modal-nueva-image"><i class="la la-plus"></i> Agregar imagen</a>
	</div>

	<div class="social-edit"  id="listado-image">
 		<div class="manage-jobs-sec  addscroll">
 			@if ($imagenes->count() > 0)
	 		<table class="mt-2">
	 			<tbody>
	 				@foreach ($imagenes as $imagen)
		 				<tr>
		 					<td style="width: 20%">
		 						<img src="{{ 'files/image/'.$imagen->location }}" style=" object-fit: cover; max-width: 100px; max-height: 50px"alt="">
		 					</td>
		 					<td style="width: 60%">
		 						<span>{{ $imagen->description }}</span>
		 					</td>
		 					<td style="width: 20%">
		 						<ul class="action_job pull-right">
		 							<li><span>editar información</span><a class="editar_inf_image" data-value="{{ $imagen->id }}" data-description="{{ $imagen->description }}" data-toggle="modal" data-target="#modal-edit-image" href="#" title=""><i class="la la-pencil"></i></a></li>
		 							<li><span>eliminar</span><a class="eliminar_imagen_talento" data-value="{{ $imagen->id }}" data-talento="{{ $talento->id }}" href="javascript:void(0)" title=""><i class="la la-trash-o"></i></a></li>
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
		 				<td><span>No ha agregado imágenes para este talento</span></td>
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
 		<div class="manage-jobs-sec addscroll">
 			@if ($videos->count() > 0)
	 		<table class="mt-2">
	 			<tbody>
	 				@foreach ($videos as $video)
		 				<tr>
		 					<td style="width: 20%" class="pr-4">
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
		 					<td style="width: 60%">
		 						<span>{{ $video->description }}</span>
		 					</td>
		 					<td style="width: 20%">
		 						<ul class="action_job pull-right">
		 							<li><span>editar información</span><a class="editar_inf_image" data-value="{{ $video->id }}" data-description="{{ $video->description }}" data-toggle="modal" data-target="#modal-edit-image" href="#" title=""><i class="la la-pencil"></i></a></li>
		 							<li><span>eliminar</span><a class="eliminar_imagen_talento" data-value="{{ $video->id }}" data-talento="{{ $talento->id }}" href="javascript:void(0)" title=""><i class="la la-trash-o"></i></a></li>
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
		 				<td><span>No ha agregado videos para este talento</span></td>
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
 		<div class="manage-jobs-sec addscroll">
 			@if ($pdfs->count() > 0)
	 		<table class="mt-2">
	 			<tbody>
	 				@foreach ($pdfs as $pdf)
		 				<tr>
		 					<td style="width: 20%">
								<div class="table-list-title">
									<h3><a href="{{ URL::asset('files/pdf/'.$pdf->location) }}" download="{{ $pdf->name.'.pdf' }}" title="">{{ $pdf->name }}</a></h3>
								</div>
		 					</td style="width: 20%" >
		 					<td class="col-7">
		 						<span>{{ $pdf->description }}</span>
		 					</td>
		 					<td style="width: 20%">
		 						<ul class="action_job pull-right">
		 							<li><span>editar información</span><a class="editar_inf_pdf" data-value="{{ $pdf->id }}" data-name="{{ $pdf->name }}" data-description="{{ $pdf->description }}" data-toggle="modal" data-target="#modal-edit-pdf" href="#" title=""><i class="la la-pencil"></i></a></li>
		 							<li><span>eliminar</span><a class="eliminar_imagen_talento" data-value="{{ $pdf->id }}" data-talento="{{ $talento->id }}" href="javascript:void(0)" title=""><i class="la la-trash-o"></i></a></li>
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
		 				<td><span>No ha agregado archivos pdf para este talento</span></td>
		 			</tr>
		 		</tbody>
		 	</table>
 			@endif
 		</div>
	</div>
</div>