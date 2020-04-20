<div class="job-single-sec">
	<div class="job-details">
		<h3>Videos</h3>
	</div>
	<div class="job-single-head2">
		<div class="row">
			@foreach($archivos as $video)
			<div class="col-lg-3 column">
				<div class="mini-portfolio">
					<div class="mportolio">
						<div class="embed-responsive embed-responsive-16by9">
							@if (Str::contains($video->location, 'https://'))
							{!!$video->location!!}
							@else
							<video class="embed-responsive-item" controls>
								<source src="{{URL::asset('files/video/'.$video->location)}}" >
									Sorry, your browser doesn't support embedded videos.
								</video>
								<!-- <iframe class="embed-responsive-item" src="{{URL::asset('files/video/'.$video->location)}}" allowfullscreen></iframe> -->
							@endif
						</div>
						<div class="job-details pt-1">
							<p class="text-center mb-2"><strong>{{ $video->name }}</strong></p>
							<p class="text-justify">{{ $video->description }}</p>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>