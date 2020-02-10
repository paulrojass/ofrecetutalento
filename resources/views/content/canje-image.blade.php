@foreach($archivos as $imagen)
<div class="mp-col">
	<div class="mportolio">
		<img src="{{URL::asset('files/image/'.$imagen->location)}}" style="object-fit: cover;height: 165px" alt="" />
		<a href="#" title=""><i class="la la-search"></i></a>
	</div>
	<ul class="action_job">
		<li><span>Eliminar</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
	</ul>
</div>
@endforeach