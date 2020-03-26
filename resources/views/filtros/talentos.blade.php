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
					<h3><a href="{{ url('perfil/'.$user->id) }}" title="">{{ $user->name}} {{ $user->lastname }} ({{ $user->email }})</a></h3>
					<span>
					<i>
						<strong> @if($user->suscription->plan_id > 1)Talento @endif {{ $user->suscription->plan->name }}</strong>, 

						{{ $user->talents->count() }} Talentos,  {{ $user->exchanges->count() }} Canjes</i><br>
 					@foreach($user->talents  as $talents)
						<i>{{$talents->title}},</i> 
					@endforeach
					</span>

					<p><i class="la la-map-marker"></i>{{ $user->city }} / {{ $user->country }}</p>
				</div>
				<div class="shortlists">
					<a href="{{ url('perfil/'.$user->id) }}" title="">Detalles <i class="la la-plus"></i></a>
				</div>
			</div><!-- Emply List -->
		@endforeach
		{{ $users->links() }}
	@endif
</div>
