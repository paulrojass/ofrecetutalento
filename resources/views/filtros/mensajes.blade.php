<div class="padding-left">
	<div class="manage-jobs-sec">
		<div class="container pl-4 pt-4">
			<div class="blog-single">
	 			<ul class="post-metas">
	 				<li>
	 					<a href="#" title="">
	 						<img src="{{URL::asset('images/users/default.png') }}" style="max-height: 40px; max-width: 40px" alt="" />
	 						{{ $mensajes[0]->user_from->name }} {{ $mensajes[0]->user_from->lastname }}
	 					</a>
	 				</li>
	 				<li><a class="metascomment" href="#" title=""><i class="la la-map-marker"></i>{{ $mensajes[0]->user_from->city }} / {{ $mensajes[0]->user_from->country }}</a>
	 				</li>
	 				<li><a class="metascomment" href="#" title="">
	 					<i class="la la-comments"></i>{{ $mensajes->count() }} @if($mensajes->count() == 1)Mensaje @else Mensajes @endif </a>
	 				</li>
	 				<li><a class="metascomment" href="#" title=""><i class="la la-envelope-o"></i>{{ $mensajes[0]->user_from->email }}</a></li>
	 			</ul>
		 	</div>
		</div>

		@foreach ($mensajes as $mensaje)
		@if($mensaje->user_from->id == auth()->user()->id )
		<table class="mt-0 mb-0">
		<tbody>
		<tr>
			<td class="col-9">
				<div class="table-list-title">
					<p>{{ $mensaje->body }}</p>
				</div>
			</td>
			<td class="col-3">
				<div class="table-list-title pull-right">
					<i>Yo</i><br />
					<span>
						{{ $mensaje->created_at->diffForHumans() }}
						@if($mensaje->received)
						<i class="la la-check-circle"></i>
						@endif
					</span>
				</div>
			</td>
		</tr>
		</tbody>
		</table>
		@else
		<table class="mt-0 mb-0">
		<tbody>
		<tr>
			<td class="col-3">
				<div class="table-list-title">
					<i>{{ $mensaje->user_from->name }}</i><br />
					<span>{{ $mensaje->created_at->diffForHumans() }}</span>
				</div>
			</td>
			<td class="col-9">
				<div class="table-list-title">
					<p>{{ $mensaje->body }}</p>
				</div>
			</td>
		</tr>
		</tbody>
		</table>
		@endif
		@endforeach
		<div class="container pl-4 pt-4">
			<div class="profile-form-edit">
				<form>
					@csrf
					<div class="row">
						<div class="col-lg-9">
							<div class="pf-field pt-2">
								<input type="text" id="body" name="body" />
							</div>
						</div>
						<div class="col-lg-3">
							<button id="enviar-mensaje" class="inhabilitado" data-value="{{ $mensajes[0]->user_from->id }}" type="button" disabled>enviar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>