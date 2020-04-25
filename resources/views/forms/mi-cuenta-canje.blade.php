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
						<select name="a-talent-exchange" id="a-talent-exchange" class="chosen" required>
							<option value = "">Selecciona un talento</option>
							@foreach(auth()->user()->talents as $talent)
							<option value="{{$talent->id}}" @if($canje->talent_id == $talent->id) selected @endif>{{$talent->title}}</option>
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
</div>