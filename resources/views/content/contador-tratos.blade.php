@auth()
@php($nuevos_tratos = App\Dealing::where('accept_id', auth()->user()->id)->where('received', 0)->get())

<div class="wishlist-dropsec">
	<span>
		<a href="{{ url('mi-cuenta?acceso=trato') }}" title="">
		<i class="la la-exchange"></i>
		@if($nuevos_tratos->count() > 0)
			<strong>{!!$nuevos_tratos->count()!!}</strong>
		@endif
	</span>
</div>
@endauth
