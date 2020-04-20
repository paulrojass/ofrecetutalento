@if($tipo == 'canje')

<a id="a-me-gusta">
	@if(($canje->likes->where('user_id', auth()->user()->id))->count() > 0)
	<i class="la la-heart"></i>
	@else
	<i class="la la-heart-o"></i>
	@endif
</a>
<span class="font-likes">
	<strong>
		{{$canje->likes->count()}}
	</strong> Me gusta
</span>
@else
<a id="a-me-gusta">
	@if(($talent->likes->where('user_id', auth()->user()->id))->count() > 0)
	<i class="la la-heart"></i>
	@else
	<i class="la la-heart-o"></i>
	@endif
</a>
<span class="font-likes">
	<strong>
		{{$talent->likes->count()}}
	</strong> Me gusta
</span>
@endif