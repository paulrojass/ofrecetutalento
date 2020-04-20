<div class="border-title">
	<h3>{{$comments->count()}} Comentarios</h3>
	{{--
 	<a id="a-agregar-comentario" title=""><i class="la la-plus"></i> Agregar comentario</a>
	@endauth--}}
</div>

<div class="commentform-sec mb-3" id="comentario" style="display: none">
	<h3>Dejar comentario</h3>
	<form id="form-comentario">
		<div class="row">
			<div class="col-lg-10">
				<!-- <span class="pf-title">Comentario</span> -->
				<div class="pf-field">
					<textarea id="textarea-comentario" required></textarea>
				</div>
			</div>
			<div class="col-lg-2">
				<button type="button" id="b-publicar-comentario">publicar</button>
			</div>
		</div>
	</form>
</div>
<ul>
	@foreach($comments->sortByDesc('created_at') as $comment)
	@php
		$date = new Date($comment->created_at);
	@endphp
	<li>
		<div class="comment">
			<div class="comment-avatar"> <img src="{{URL::asset('images/users/'.$comment->evaluator->avatar)}}" style="max-width: 90px" alt="" /> </div>
			<div class="comment-detail">
				<h3>{{$comment->evaluator->name}} {{$comment->evaluator->lastname}}</h3>
				<div class="date-comment"><i class="la la-calendar-o"></i> {{$date->format('l, d-m-Y H:i a')}}</div>
				<p>{{$comment->comment}}</p>
				@auth
				@if(auth()->user() == $comment->evaluated)
						<a class="a-responder" data-responder="{{$comment->id}}" title=""><i class="la la-reply"></i>Responder</a>
					@endif
				@endauth
				<div class="star-rating pull-right">
					<!-- 					
					<span class="la la-star-o" data-rating="1" style="color:#ff9200"></span>
					<span class="la la-star-o" data-rating="2" style="color:#ff9200"></span>
					<span class="la la-star-o" data-rating="3" style="color:#ff9200"></span>
					<span class="la la-star-o" data-rating="4" style="color:#ff9200"></span> -->
					<span style="font-size: 13px; color:#888888">{{ $comment->value }}</span>
					<span class="la la-star-o" data-rating="5" style="color:#ff9200"></span>
					<input type="hidden" name="whatever1" id="rating" class="rating-value" value="{{ $comment->value }}">
				</div>
			</div>
		</div>
		<ul class="comment-child">
			<li class="respuesta" id="respuesta{{$comment->id}}" style="display: none">
 			<div class="commentform-sec mb-3" >
 				<h3>Responder</h3>
 				<form>
 					<div class="row">
 						<div class="col-lg-10">
	 						<!-- <span class="pf-title">Comentario</span> -->
	 						<div class="pf-field">
	 							<textarea id="textarea-respuesta{{$comment->id}}"></textarea>
	 						</div>
	 					</div>
	 					<div class="col-lg-2">
							<button type="button" data-evaluado="{{ $comment->evaluated_id }}" data-value="{{$comment->id}}" class="b-publicar-respuesta">publicar</button>
	 					</div>
 					</div>
 				</form>
 			</div>
			</li>
			@foreach($replys->where('replyto', $comment->id) as $reply)
				@php
					$date = new Date($reply->created_at);
				@endphp
			<li>
				<div class="comment">
					<div class="comment-avatar"> <img src="{{URL::asset('images/users/'.$reply->evaluated->avatar)}}" style="max-width: 90px" alt="" /> </div>
					<div class="comment-detail">
						<h3>{{$reply->evaluated->name}} {{$reply->evaluated->lastname}}</h3>
						<div class="date-comment"><i class="la la-calendar-o"></i> {{$reply->created_at->format('l, d-m-Y H:i a')}}</div>
						<p>{{$reply->comment}}</p>	
					</div>							 							
				</div>
			</li>
			@endforeach
		</ul>
	</li>
	@endforeach
</ul>
<!-- {{ $comments->links() }} -->
