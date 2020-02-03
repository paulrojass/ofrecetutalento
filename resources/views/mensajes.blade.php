@extends('layouts.tema')

@section('title', 'Mensajes')

@section('header_type', 'gradient')

@section('content')
<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<aside class="col-lg-3 column border-right no-pad" id="columna-usuarios">
						<ul class="scrollbar"> 
							@foreach($usuarios as $usuario)
							@if($usuario->user_from->id != auth()->user()->id)
							<li>
								<div class="job-listing">
									<div class="job-title-sec">
										<div class="my-profiles-message">
											<img src="{{URL::asset('images/users/'.$usuario->user_from->avatar) }}" style="max-height: 54px; max-width: 54px" alt="" />
										</div>
										<h3><a class="usuario-id" data-value="{{ $usuario->user_from->id }}" title="">{{ $usuario->user_from->name}} {{ $usuario->user_from->lastname}}</a></h3>
										<span>{{ $usuario->created_at->diffForHumans()}}</span>
									</div>
								</div>
							</li>
							@endif
							@endforeach
						</ul>
				 	</aside>
				 	<!-- Columna de mensajes -->
				 	<div class="col-lg-9 column" id="columna-mensajes">

					</div>
				 </div>
			</div>
		</div>
	</section>
@endsection


@section('scripts')
<script>
	$(function(){

		$('#columna-usuarios').on('click', '.usuario-id', function (e) {
			e.preventDefault();
			var id = $(this).data('value');


			$.ajax({
				type:'get',
				url:'/mensajes-usuario',
				data:{
					from_id:id
				},
			})
			.done(function(data) {
				$('#columna-mensajes').html(data);
			});






		});




	});
</script>
@endsection