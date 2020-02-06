<div class="border-title"><h3>Talentos <strong id="disponibles"></strong></h3>
	<a id="agregar-talento" data-toggle="modal" data-target="#modal-talento" title=""><i class="la la-plus"></i>
		Agregar Talento
	</a>
</div>
<div class="edu-history-sec" class="ml-5">
	<!-- <h5>Talentos agregados: {{auth()->user()->talents->count()}} </h5> -->
	@foreach(auth()->user()->talents as $talent)
	<div class="edu-history style2">
		<i></i>
		<div class="edu-hisinfo">
			<h3>{{ $talent->title }}<br><span>{{ $talent->category->industry->name }} -  {{ $talent->category->name }}</span></h3>
			<i>Nivel de experiencia: <strong>{{ $talent->level }}</strong></i>
			<p>{{ $talent->description }}</p>
		</div>
		<ul class="action_job">
			<li><span>Editar</span>
				<a class="editar-talento" 
				data-value="{{$talent->id}}"
				data-title = "{{$talent->title}}"
				data-category = "{{$talent->category_id}}"
				data-level = "{{$talent->level}}"
				data-description = "{{$talent->description}}"
				data-toggle="modal" data-target="#modal-talento" value="{{$talent->id}}" title=""><i class="la la-pencil"></i></a></li>
			<li><span>Eliminar</span><a class="eliminar-talento" value="{{$talent->id}}" title=""><i class="la la-trash-o"></i></a></li>
		</ul>
	</div>
	@endforeach
</div>
