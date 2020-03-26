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
						@if($usuarios->isNotEmpty())
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
						@else
							<p>No hay mensajes</p>
						@endif
					</ul>
			 	</aside>
			 	<!-- Columna de mensajes -->
			 	<div class="col-lg-9 column" id="columna-mensajes">
			 		@if($usuarios->isNotEmpty())
						<!-- <h3> Todavía no tienes mensajes en tu buzón</h3> -->
			 		@endif
				</div>
			 </div>
		</div>
	</div>
</section>
@endsection


@section('scripts')
<script>
	$(function(){

		var auth_id = '{{ auth()->user()->id }}';

		if('{{ $from_id }}' > 0){
			console.log('{{ $from_id }}');
			cargarUsuario('{{ $from_id }}', auth_id);
		}

		$('#columna-usuarios').on('click', '.usuario-id', function (e) {
			e.preventDefault();
			var id = $(this).data('value');
			cargarUsuario(id, auth_id);
			actualizarMensajes();
		});

		function cargarUsuario(id, auth_id){
			$.ajax({
				type:'get',
				url:'/mensajes-usuario',
				data:{
					from_id:id, to_id: auth_id
				},
			})
			.done(function(data) {
				$('#columna-mensajes').html(data);
			});
		}

		$('#columna-mensajes').on('click', '#enviar-mensaje', function (e) {
			e.preventDefault();
			var to_id = $(this).data('value');
			var body = $('#body').val();
			var _token = $("input[name='_token']").val();
			var auth_id = '{{ auth()->user()->id }}';


			//console.log('to_id: '+to_id+', from_id:'+from_id+', body: '+body+', token:'+_token);

			$.ajax({
				type:'post',
				url:'/enviar-mensaje',
				data:{
					from_id:auth_id, to_id: to_id, _token: _token, body:body 
				},
			})
			.done(function(data) {
				$('#columna-mensajes').html(data);
				actualizarMensajes();
			});
		});

  $('#columna-mensajes').on('keyup','#body',function() {
    var empty = false;
    $('#body').each(function() {
        if ($(this).val().length == 0) {
            empty = true;
        }
    });                   
    if (empty) {
        $('#enviar-mensaje').attr('disabled', 'disabled');
    } else {
        $('#enviar-mensaje').removeAttr('disabled');
    }                
  });

	});
</script>
@endsection