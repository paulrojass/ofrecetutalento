<div class="emply-resume-sec">
	@if($users->count() == 0)
		<p> La busqueda no arrojó resultados </p>
	@else
		@foreach($users as $user)
			<div class="emply-resume-list square">
				<div class="emply-resume-thumb">
					<!-- <img src="http://placehold.it/90x90" alt="" /> -->
					<img src="{{URL::asset('images/users/'.$user->avatar)}}" alt="" />
				</div>
				<div class="emply-resume-info">
					<h3><a href="{{ url('perfil/'.$user->id) }}" title="">{{ $user->name}} {{ $user->lastname }}</a></h3>
					<p><i class="la la-map-marker"></i>{{ $user->city }} / {{ $user->country }}</p>
					<span>
					<i>
						<strong> @if($user->suscription->plan_id > 1)Talento @endif {{ $user->suscription->plan->name }}</strong>, 
						

						{{ $user->talents->count() }} Talentos

						{{--<span class="tooltip tooltip-effect-5">
							<span class="tooltip-item">{{ $user->talents->count() }} Talentos<</span>
							<span class="tooltip-content clearfix">
								<span class="tooltip-text">
									@foreach($user->talents  as $talents)
										{{$talents->title}}, 
									@endforeach
								</span>
							</span>
						</span>--}}
						,  {{ $user->exchanges->count() }} Canjes
						,  {{ $user->recommended->count() }} Recomendaciones</i>


						<br>
					</span>
				</div>
				<div class="shortlists">
					<a href="{{ url('perfil/'.$user->id) }}" title="">Detalles <i class="la la-plus"></i></a>
				</div>
			</div><!-- Emply List -->
		@endforeach
		{{ $users->links() }}
	@endif
</div>
