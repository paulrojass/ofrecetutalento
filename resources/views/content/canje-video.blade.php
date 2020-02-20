@foreach($archivos as $video)
 <!-- <div class="mp-col"> -->
<div class="mportolio">
		<div class="embed-responsive embed-responsive-16by9">
			@if (Str::contains($video->location, 'https://'))
			 {!!$video->location!!}
			@else
		  	<iframe class="embed-responsive-item" src="{{URL::asset('files/video/'.$video->location)}}" allowfullscreen></iframe>
			@endif
		</div>
		<div class="job-details pt-1">
			<p class="pl-5 pr-5 text-center mb-2"><strong>{{ $video->name }}</strong></p>
			<p class="pl-5 pr-5">{{ $video->description }}</p>
		</div>


<!-- 	</div> -->
</div>
@endforeach
