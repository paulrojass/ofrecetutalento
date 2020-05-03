<div class="padding-left">
	<div class="manage-jobs-sec">
		<div class="border-title"><h3>Talentos <strong id="disponibles"></strong></h3>
			<a id="agregar-talento" data-toggle="modal" data-target="#modal-talento" title=""><i class="la la-plus"></i>
				Agregar Talento
			</a>
		</div>

		<div class="job-listings-sec">
			@foreach(auth()->user()->talents as $talent)
			<div class="job-listing pl-4">
				<div class="job-title-sec">
					<!-- <div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div> -->
					<h3><a class="color-link" href="{{ url('talento/'.$talent->id) }}" title="">{{ $talent->title }}</a></h3>
					<span style="color:#888888">{{ $talent->description }}</span>
				</div>
				<span class="fav-job" >
			 		<div class="action-tags d-flex justify-content-center">
						<a href="{{ url('talento/'.$talent->id) }}" title=""><i class="la la-eye"></i> Ver</a>
						<a class="editar-talento" 
							data-value="{{$talent->id}}"
							data-title = "{{$talent->title}}"
							data-category = "{{$talent->category_id}}"
							data-level = "{{$talent->level}}"
							data-description = "{{$talent->description}}"
							data-toggle="modal" data-target="#modal-talento" value="{{$talent->id}}" title="">
							<i class="la la-pencil"></i> Editar
						</a>
					</div>
				</span>
				<span class="fav-job" >
			 		<div class="action-tags d-flex justify-content-center">
						<a class="abrir-archivos" data-value="{{$talent->id}}" title=""><i class="la la-file-movie-o"></i> Agregar medios</a>
						@if($talent->exchanges->count()>0)
						@foreach ($talent->exchanges as $exchange)
						@if ($exchange->dealings->count() > 0  || $exchange->proposals->count() > 0)
							@php($tratos = true)
						@else
							@php($tratos = false)
						@endif
						@endforeach
						@else
							@php($tratos = false)
						@endif

						@if($tratos == false)
						<a class="eliminar-talento"
							data-value="{{$talent->id}}"
							data-title = "{{$talent->title}}"
							data-toggle="modal" data-target="#modal-eliminar-talento"
							title=""><i class="la la-trash-o"></i> Eliminar
						</a>
						@endif
			 		</div>
					</ul>
				</span>
			</div><!-- Job -->
			@endforeach
		</div>
	</div>
</div>
