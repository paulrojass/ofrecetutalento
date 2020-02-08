$(function(){
	var id_canje = $('#canje_id').val();
	var AuthUser = $('#auth_user').val();
	cargaInicial(id_canje);

	function cargaInicial(id_canje){
		//$("#tipo-pago").checked();
		actualizarComentarios(id_canje);
		if(AuthUser){actualizarLikes(id_canje, '0');}
	}

	$('#div-comentarios').on('click', '#a-agregar-comentario', function(e){
		e.preventDefault();
		$('#comentario').slideDown('slow', function(){
			$('#textarea-comentario').focus();
			$('#a-agregar-comentario').hide();
		});
	});

	$('#div-comentarios').on('click', '.a-responder', function(e){
		e.preventDefault();
		var clickeado = $(this).data('responder');
		$('#respuesta'+clickeado).slideDown('slow', function(){
			$('#textarea-respuesta'+clickeado).focus();
		});
	});

	$('#div-comentarios').on('click', '#b-publicar-comentario', function(e){
		e.preventDefault();
		agregarComentario(id_canje);
	});

	$('#div-comentarios').on('click', '.b-publicar-respuesta', function(e){
		e.preventDefault();
		var comentario = $(this).data('value');
		agregarRespuesta(id_canje, comentario);
	});

	$('.job-title2').on('click', '#a-me-gusta',function(e){
		e.preventDefault();
		actualizarLikes(id_canje, '1');
	});

	function actualizarLikes(id_canje, cambiar){
		$.ajax({
			url: '/cambiar-like',
			type: 'get',
			data: {canje_id : id_canje, cambiar:cambiar},
			dataType: 'html',
		})
		.done(function(data) {
			$('.me-gusta').html(data);
		});
	}

	function actualizarComentarios(id_canje){
		$.ajax({
			url: '/actualizar-comentarios',
			type: 'get',
			data: {canje_id : id_canje},
			dataType: 'html',
		})
		.done(function(data) {
			$('#div-comentarios').html(data);
		});			
	}

	function agregarComentario(id_canje){
		var comentario = $('#textarea-comentario').val();
		if (comentario != ''){
			$.ajax({
				url: '/agregar-comentario',
				type: 'get',
				data: {canje_id : id_canje, comment:comentario},
				dataType: 'html',
			})
			.done(function(data) {
				$('#div-comentarios').html(data);
			});				
		}
	}

	function agregarRespuesta(id_canje, comentario_id){
		var comentario = $('#textarea-respuesta'+comentario_id).val();
		if (comentario != ''){
			$.ajax({
				url: '/agregar-respuesta',
				type: 'get',
				data: {canje_id : id_canje, comment:comentario, replyto: comentario_id},
				dataType: 'html',
			})
			.done(function(data) {
				$('#div-comentarios').html(data);
			});				
		}
	}

	$('#tipo-canje').click(function () {
		$('#div-select-canje').show();
	});
	$('#tipo-pago').click(function () {
		$('#div-select-canje').hide();
	});

	$('#nuevo-trato').click(function () {
		var accept_id = '{{$canje->talent->user_id}}';
		var pay = $('input:radio[name=pay]:checked').val();
		if (pay == 1){
			var exchange_proposal = null;
		}else{
			var exchange_proposal = $('#exchange_proposal').val();
		}
		var description = $('#description').val();
		var exchange_id = '{{$canje->id}}';
		var token = '{{csrf_token()}}';
		$.ajax({
			type:'get',
			url:'/nuevo-trato',
			data:{description:description, accept_id:accept_id, pay:pay, exchange_proposal: exchange_proposal, exchange_id: exchange_id, _token: token},
			success: function (response) {
				alert(response);
			},
			error:function(response){
				alert('no funciona');
			}
		});
	});
});
