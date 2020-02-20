@php($comments = ($canje->comments->where('replyto', null)))
@php($replys = ($canje->comments->where('replyto', !null)) )
<div class="border-title">
	<h3>{{$canje->comments->count()}} Comentarios</h3>
	@auth
	<a id="a-agregar-comentario" title=""><i class="la la-plus"></i> Agregar comentario</a>
	@endauth
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
	<li>
		<div class="comment">
			<div class="comment-avatar"> <img src="{{URL::asset('images/users/'.$comment->user->avatar)}}" style="max-width: 90px" alt="" /> </div>
			<div class="comment-detail">
				<h3>{{$comment->user->name}} {{$comment->user->lastname}}</h3>
				<div class="date-comment"><a href="#" title=""><i class="la la-calendar-o"></i>{{$comment->created_at->format('l d, F Y')}}</a></div>
				<p>{{$comment->comment}}</p>
				@auth
				@if(auth()->user() == $canje->talent->user)
						<a class="a-responder" data-responder="{{$comment->id}}" title=""><i class="la la-reply"></i>Responder</a>
					@endif
				@endauth
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
							<button type="button" data-value="{{$comment->id}}" class="b-publicar-respuesta">publicar</button>
	 					</div>
 					</div>
 				</form>
 			</div>
			</li>
			@foreach($replys->where('replyto', $comment->id) as $reply)
			<li>
				<div class="comment">
					<div class="comment-avatar"> <img src="{{URL::asset('images/users/'.$reply->user->avatar)}}" style="max-width: 90px" alt="" /> </div>
					<div class="comment-detail">
						<h3>{{$reply->user->name}} {{$reply->user->lastname}}</h3>
						<div class="date-comment"><a href="#" title=""><i class="la la-calendar-o"></i>{{$reply->created_at->format('l d, F Y')}}</a></div>
						<p>{{$reply->comment}}</p>	
					</div>							 							
				</div>
			</li>
			@endforeach
		</ul>
	</li>
	@endforeach
</ul>
