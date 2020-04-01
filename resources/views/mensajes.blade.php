@extends('layouts.tema')

@section('title', 'Mensajes')

@section('messages', '')

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
						@else
						<li>
							<div class="job-listing">
								<div class="job-title-sec">
									<div class="my-profiles-message">
										<img src="{{URL::asset('images/users/'.$usuario->user_to->avatar) }}" style="max-height: 54px; max-width: 54px" alt="" />
									</div>
									<h3><a class="usuario-id" data-value="{{ $usuario->user_to->id }}" title="">{{ $usuario->user_to->name}} {{ $usuario->user_to->lastname}}</a></h3>
									<span>{{ $usuario->created_at->diffForHumans()}}</span>
								</div>
							</div>
						</li>
						@endif
						@endforeach
					</ul>
			 	</aside>
			 	{{-- ============================================== COLUMNA DONDE VAN LOS MENSAJES --}}
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

		var auth_id = '{{ auth()->user()->id }}';

		if('{{ $primero }}' > 0){
			cargarUsuario('{{ $primero }}', auth_id);
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

  $('#columna-mensajes').on('keyup','#body',function(e) {
   	e.preventDefault();
    var empty = false;
    $('#body').each(function() {
    	if(e.keyCode == 13){
    		$('#enviar-mensaje').trigger('click');
    	}
    	else if ($(this).val().length == 0) {
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