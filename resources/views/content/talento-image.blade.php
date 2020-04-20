<div class="row">
	<div class="col-lg-12 column">
 		<div class="job-single-sec">
 			<div class="job-single-head2">
			<div class="mini-portfolio">
				<div class="job-details">
 				<h3>Imágenes</h3>
 			</div>
			@foreach($archivos as $imagen)
			<div class="mp-col">
				<div class="mportolio">
					<img src="{{URL::asset('files/image/'.$imagen->location)}}" style="object-fit: cover;height: 165px" alt="" />
					<a class="link-image" data-value="{{ $imagen->location }}" data-toggle="modal" data-target="#modal-imagenes" title=""><i class="la la-search"></i></a>
				</div>
			</div>
			@endforeach

			</div>
 			</div>
		</div>
	</div>
</div>