<div class="modrn-joblist np">
	<div class="filterbar">
		<h5>{{$exchanges->total()}} Canjes disponibles</h5>
	</div>
</div><!-- MOdern Job LIst -->
<div class="blog-sec">
	<div class="row" id="masonry">
	@foreach($exchanges->sortByDesc('created_at') as $exchange)

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="my-blog">
				<div class="blog-thumb">
					<a href="{{url('canjes/'.$exchange->id)}}" title=""><img src="{{URL::asset('images/exchanges/'.$exchange->image)}}" style="object-fit: cover; height: 200px;" alt="" /></a>
					<div class="blog-metas">
						<a href="javascript:void(0)" title="">{{ $exchange->created_at->diffForHumans() }}</a>
						<a href="javascript:void(0)" title=""><i class="la la-heart-o"></i> {{$exchange->likes->count()}} Me gusta</a>
					</div>
				</div>
				<div class="blog-details">
					<h3 class="text-truncate"><a href="{{url('canjes/'.$exchange->id)}}" title="">{{$exchange->title}}</a></h3>
					<p class="text-truncate">{{$exchange->description}} </p>
					<p class="text-truncate">
						<i class="la la-money"></i> ${{$exchange->price}} | 
						<i class="la la-user"></i> {{$exchange->talent->user->name}} {{$exchange->talent->user->lastname}} | 
						<i class="la la-map-marker"></i> {{$exchange->talent->user->city}}, {{$exchange->talent->user->country}}
					</p>
					<a href="{{url('canjes/'.$exchange->id)}}" title="">Ver Canje <i class="la la-long-arrow-right"></i></a>
				</div>
			</div>
		</div>
	@endforeach
	</div>
	{{ $exchanges->links() }}
</div>
