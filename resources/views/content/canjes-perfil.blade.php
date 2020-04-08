<div class="cand-details">
	<h2 class="text-center pt-5 mb-2">{{ $canjes->total() }} Canjes</h2>
	<div class="manage-jobs-sec">
		<div class="job-grid-sec">
			<div class="row">
				@foreach ($canjes as $canje)
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<div class="job-grid border">
						<div class="job-title-sec">
							<div class="c-logo"> <img src="{{URL::asset('images/exchanges/'.$canje->image)}}" style="width: 235px; height: 115px" alt="" /> </div>
							<h3><a href="#" title="">{{ $canje->title }}</a></h3>
							<span>{{ ($canje->talent->title)}}</span>
							<!-- <span class="fav-job"><i class="la la-heart-o"></i></span> -->
						</div>
						<span class="job-lctn">Precio: {{ $canje->price }}</span>
						<a  href="{{ url('canjes/'.$canje->id) }}" title="">VER</a>
					</div><!-- JOB Grid -->
				</div>
				@endforeach
			</div>
		</div>
		{{ $canjes->links() }}
	</div>
</div>