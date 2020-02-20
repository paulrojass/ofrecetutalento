@foreach($archivos as $imagen)
<div class="mp-col">
	<div class="mportolio">
		<img src="{{URL::asset('files/image/'.$imagen->location)}}" style="object-fit: cover;height: 165px" alt="" />
		<a class="link-image" data-value="{{ $imagen->location }}" data-toggle="modal" data-target="#modal-imagenes" title=""><i class="la la-search"></i></a>
	</div>
</div>
@endforeach