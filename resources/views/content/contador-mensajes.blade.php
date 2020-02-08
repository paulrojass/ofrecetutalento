@auth()
@php($recibidos = App\Message::where('to_id', auth()->user()->id)->where('received', 0)->get())
@if($recibidos->count() > 0)
<div class="wishlist-dropsec">
	<span><i class="la la-comment"></i>
		<strong>{!!$recibidos->count()!!}</strong>
	</span>
	<div class="wishlist-dropdown">
		<ul class="scrollbar">
			@foreach($recibidos->sortByDesc('created_at') as $recibido)
			<li>
				<div class="job-listing">
					<div class="job-title-sec">
						<div class="my-profiles-message"> <img src="{{URL::asset('images/users/'.$recibido->user_from->avatar) }}" style="max-height: 54px; max-width: 54px" alt="" /> </div>
						<h3><a href="{{ url('mensajes/'.$recibido->user_from->id) }}" title="">{{ $recibido->user_from->name}} {{ $recibido->user_from->lastname}}</a></h3>
						<span>{{ $recibido->created_at->diffForHumans()}}</span>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
</div>
@else
<div class="wishlist-dropsec">
	<span>
		<a href="{{ url('mensajes') }}" title="">
		<i class="la la-comment"></i>
		</a>
	</span>
</div>
@endif
@endauth
