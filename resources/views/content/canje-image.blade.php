@foreach($archivos as $imagen)
<div class="mp-col">
	<div class="mportolio">
		<img src="{{URL::asset('files/image/'.$imagen->location)}}" style="object-fit: cover;height: 165px" alt="" />
		<a href="#" title=""><i class="la la-search"></i></a>
	</div>
	@if(auth()->user() == $imagen->exchange->talent->user)
	<ul class="action_job">
		<li class="boton-eliminar-imagen" value="{{ $imagen->id }}"><span>Eliminar</span><a  title=""><i class="la la-trash-o"></i></a></li>
	</ul>
	@endif
</div>
@endforeach