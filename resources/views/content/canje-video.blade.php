@foreach($archivos as $video)
<div class="mp-col">
	<div class="mportolio">
		<img src="{{URL::asset('files/video/'.$video->location)}}" style="object-fit: cover;height: 165px" alt="" />
		<a href="#" title=""><i class="la la-search"></i></a>
	</div>
	@if(auth()->user() == $video->exchange->talent->user)
	<ul class="action_job">
		<li class="boton-eliminar-imagen" value="{{ $video->id }}"><span>Eliminar</span><a  title=""><i class="la la-trash-o"></i></a></li>
	</ul>
	@endif
</div>
@endforeach