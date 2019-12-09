
	<div class="emply-resume-sec">
		@if($users->count() == 0)
			<p> La busqueda no arrojó resultados </p>
		@else
			@foreach($users as $user)
				<div class="emply-resume-list square">
					<div class="emply-resume-thumb">
						<!-- <img src="http://placehold.it/90x90" alt="" /> -->
						<img src="{{URL::asset($user->avatar)}}" alt="" />
					</div>
					<div class="emply-resume-info">
						<h3><a href="#" title="">{{ $user->name}} {{ $user->lastname }}</a></h3>
						<span>
						@foreach($user->talents  as $talents)
							<i>{{$talents->title}}</i> ({{$talents->category->name}}), 
						@endforeach
						</span>

						<p><i class="la la-map-marker"></i>{{ $user->city }} / {{ $user->country }}</p>
					</div>
					<div class="shortlists">
						<a href="{{ url('perfil/'.$user->id) }}" title="">Shortlist <i class="la la-plus"></i></a>
					</div>
				</div><!-- Emply List -->
			@endforeach
			{{ $users->links() }}
		@endif
	</div>
