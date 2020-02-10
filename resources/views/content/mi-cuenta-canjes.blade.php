<div class="border-title"><h3>{{$exchanges->count()}} Canjes</h3>
	<a id="agregar-canje" data-toggle="modal" data-target="#modal-canje" title=""><i class="la la-plus"></i>
		Agregar canje
	</a>
</div>

<div class="job-list-modern">
	<div class="job-listings-sec">
		@foreach($exchanges->sortByDesc('created_at') as $exchange)
		<div class="job-listing wtabs">
			<div class="job-title-sec">
				<div class="c-logo"> <img src="{{URL::asset('images/exchanges/'.$exchange->image)}}" style="object-fit: cover; height: 51px; width: 98px"  alt="" /> </div>
				<h3><a href="{{url('canjes/'.$exchange->id)}}" title="">{{$exchange->title}}</a></h3>
				<span>
					 <strong> Talento:</strong>  {{$exchange->talent->title}} - <i class="la la-heart-o"></i> {{ $exchange->likes->count() }} 
				</span>
			</div>
	 		<div class="action-tags">
	 			<a href="{{url('canjes/'.$exchange->id)}}" title=""><i class="la la-eye"></i>Ver</a>
	 			<a class="editar-canje" 
						data-value="{{$exchange->id}}"
						data-title = "{{$exchange->title}}"
						data-price = "{{$exchange->price}}"
						data-talent = "{{$exchange->talent_id}}"
						data-description = "{{$exchange->description}}"
						data-toggle="modal" data-target="#modal-canje" value="{{$exchange->id}}" title="">
						<i class="la la-pencil"></i> Editar</a>
	 			<a class="eliminar-canje" value="{{$exchange->id}}" title=""><i class="la la-trash-o"></i>Eliminar</a>
	 		</div>
		</div>
		@endforeach
	</div>
</div>
