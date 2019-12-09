<div class="modrn-joblist np">
	<div class="filterbar">
		<h5>{{$exchanges->total()}} Canjes disponibles</h5>
	</div>
</div><!-- MOdern Job LIst -->
<div class="job-list-modern">
	<div class="job-listings-sec no-border">
	@foreach($exchanges as $exchange)
	<div class="job-listing wtabs">
		<div class="job-title-sec">
			<div class="c-logo"> <img src="{{URL::asset($exchange->image)}}" alt="" /> </div>
			<h3><a href="#" title="">{{$exchange->title}}</a></h3>
			<span><i class="la la-user"></i>{{$exchange->talent->user->name}} {{$exchange->talent->user->lastname}}</span>
			<div class="job-lctn"><i class="la la-map-marker"></i>{{$exchange->talent->user->city}}, {{$exchange->talent->user->country}}</div>
		</div>
		<div class="job-style-bx">
	 		<a href="#" title="">
			<span class="job-is ft">Ver detalles</span>
			</a>

			<span class="fav-job"><i class="la la-heart-o"></i></span>
			<i>
				publicado el: <strong>{{$exchange->created_at->format('d/m/Y')}}</strong>
			</i>
		</div>
	</div>
	@endforeach
	{{ $exchanges->links() }}
</div>
</div>