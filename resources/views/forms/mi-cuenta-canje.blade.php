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

	<div class="border-title"><h3 id="titulo-image">Imágenes <strong></strong></h3>
		<a id="agregar-image" title="" data-toggle="modal" data-target="#modal-nueva-image"><i class="la la-plus"></i> Agregar imagen</a>
	</div>

	<div class="social-edit"  id="listado-image">
 		<div class="manage-jobs-sec">
 			@if ($imagenes->count() > 0)
	 		<table>
	 			<tbody>
	 				@foreach ($imagenes as $imagen)
		 				<tr>
		 					<td class="col-1">
		 						<img src="{{ 'files/image/'.$imagen->location }}" style=" object-fit: cover; max-width: 100px; max-height: 50px"alt="">
		 					</td>
		 					<td class="col-3 pr-4">
		 						<div class="table-list-title">
		 							<p><strong>{{ $imagen->name }}</strong></p>
		 						</div>
		 					</td>
		 					<td class="col-5">
		 						<span>{{ $imagen->description }}</span>
		 					</td>
		 					<td class="col-1">
		 						<ul class="action_job pull-right">
		 							<li><span>editar</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
		 							<li><span>eliminar</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
		 						</ul>
		 					</td>
		 				</tr>
	 				@endforeach
	 			</tbody>
	 		</table>
 			@else
 			<span>No ha agregado imágenes para este canje</span>
 			@endif
 		</div>
	</div>

	<div class="border-title"><h3 id="titulo-video">Videos <strong></strong></h3>
		<a id="agregar-video" title="" data-toggle="modal" data-target="#modal-nuevo-video"><i class="la la-plus"></i> Agregar video</a>
	</div>
	<div class="social-edit"  id="listado-video">
 		<div class="manage-jobs-sec">
 			@if ($videos->count() > 0)
	 		<table>
	 			<tbody>
	 				@foreach ($videos as $video)
		 				<tr>
		 					<td class="col-4 pr-4">
		 						<div class="table-list-title">
		 							<p><strong>{{ $video->name }}</strong></p>
		 						</div>
		 					</td>
		 					<td class="col-7">
		 						<span>{{ $video->description }}</span>
		 					</td>
		 					<td class="col-1">
		 						<ul class="action_job pull-right">
		 							<li><span>editar</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
		 							<li><span>eliminar</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
		 						</ul>
		 					</td>
		 				</tr>
	 				@endforeach
	 			</tbody>
	 		</table>
 			@else
 			<span>No ha agregado videos para este canje</span>
 			@endif
 		</div>
	</div>


	<div class="border-title"><h3 id="titulo-pdf">Archivos Pdf <strong></strong></h3>
		<a id="agregar-pdf" title=""><i class="la la-plus"></i> Agregar pdf</a>
	</div>
	<div class="social-edit"  id="listado-pdf">
 		<div class="manage-jobs-sec">
 			@if ($pdfs->count() > 0)
	 		<table>
	 			<tbody>
	 				@foreach ($pdfs as $pdf)
		 				<tr>
		 					<td class="col-3 pr-4">
		 						<div class="table-list-title">
		 							<p><strong>{{ $pdf->name }}</strong></p>
		 						</div>
		 					</td>
		 					<td class="col-7">
		 						<span>{{ $pdf->description }}</span>
		 					</td>
		 					<td class="col-1">
		 						<ul class="action_job pull-right">
		 							<li><span>editar</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
		 							<li><span>eliminar</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
		 						</ul>
		 					</td>
		 				</tr>
	 				@endforeach
	 			</tbody>
	 		</table>
 			@else
			<span>No ha agregado archivos para este canje</span>
 			@endif
 		</div>
	</div>
</div>