$(function(){
	$(".alert").hide();
	var id_canje = $('#canje_id').val();
	var user_id = $('#auth_user').val();
	var user_dealing = $('#user_dealing').val();
	cargaInicial(id_canje);

	function cargaInicial(id_canje){
		//$("#tipo-pago").checked();
		/*actualizarArchivos('image');
		actualizarArchivos('video');
		actualizarArchivos('pdf');*/
		actualizarComentarios(id_canje);
		if(user_id){actualizarLikes(id_canje, '0', 'canje');}
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
		var responde = $(this).data('evaluado');
		agregarRespuesta(id_canje, comentario, responde);
	});

	$('.job-title2').on('click', '#a-me-gusta',function(e){
		e.preventDefault();
		actualizarLikes(id_canje, '1', 'canje');
	});


	function actualizarLikes(id_canje, cambiar, tipo){
		$.ajax({
			url: '/cambiar-like',
			type: 'get',
			data: {canje_id : id_canje, cambiar:cambiar, tipo:tipo},
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

	function agregarRespuesta(id_canje, comentario_id, responde){
		var comentario = $('#textarea-respuesta'+comentario_id).val();
		if (comentario != ''){
			$.ajax({
				url: '/agregar-respuesta',
				type: 'get',
				data: {canje_id : id_canje, comment:comentario, replyto:comentario_id, evaluated_id:responde},
				dataType: 'html',
			})
			.done(function(data) {
				$('#div-comentarios').html(data);
			});				
		}
	}

	$('#modal-trato').on('show.bs.modal', function (e) {
		$('#form-trato')[0].reset();

		$('#div-canje').hide();
		$('#div-propuesta').hide();
		$('#div-tiempo').hide();
	});

	$('#tipo-pago').click(function () {
		$('#div-canje').hide();
		$('#div-propuesta').hide();
		$('#div-tiempo').hide();
		$('#proposal_id').val('');
	});
	$('#tipo-canje').click(function () {
		$('#div-canje').show();
		$('#div-propuesta').hide();
		$('#div-tiempo').show();
	});
	$('#tipo-propuesta').click(function(){
		$('#div-canje').hide();
		$('#div-propuesta').show();
		$('#div-tiempo').show();
		$('#proposal_id').val('');
	});


	$('#nuevo-trato').click(function () {
		event.preventDefault();
		var dataString = $('#form-trato').serialize();
		$.ajax({
			url: '/nuevo-trato',
			type: 'get',
			data: dataString,
			contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
			processData: false, // NEEDED, DON'T OMIT THIS
			
			success: function (response) {
				if(response.errors){
					$("#alert-error").fadeTo(2000, 500).slideUp(500, function(){
					    $("#alert-error").slideUp(1000);
					});
          		}else{
          			$('.alert-danger').hide();
          			$("#alert-trato").fadeTo(2000, 500).slideUp(500, function(){
					    $("#alert-trato").slideUp(1000);
					    $('#modal-trato').modal('hide');
						$("#form-trato")[0].reset();
					});
				}
			},
			error:function(response){
				$("#alert-trato-fail").fadeTo(2000, 500).slideUp(500, function(){
				    $("#alert-trato-fail").slideUp(1000);
				});
			}
		});
	});

	/*================================== RATING ==========================*/

	var $star_rating = $('#div-comentarios .star-rating .la');

	var SetRatingStar = function() {
	  return $star_rating.each(function() {
	    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
	      return $(this).removeClass('la-star-o').addClass('la-star');
	    } else {
	      return $(this).removeClass('la-star').addClass('la-star-o');
	    }
	  });
	};

	/*$('#valoracion').on('click', '.star-rating .la', function() {*/
/*		$star_rating.on('click', function() {
	  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
	  return SetRatingStar();
	});
*/
	SetRatingStar();

	/*================================== RATING ==========================*/




/*	function verificarArchivos(tipo){
		var _token = $("input[name='_token']").val();
		$.ajax({
			type: 'POST',
			url:'/verificar-archivos',
			data:{user_id:user_id, canje_id:id_canje, _token:_token, type:tipo},
			success:function(data){
				if(data.disponibles == null){
					$('#titulo-'+tipo+' strong').html('(ilimitadas)');
				}else if(data.disponibles > 0){
					$('#titulo-'+tipo+' strong').html('('+data.disponibles+' disponibles)');
				}else{
					$('#agregar-'+tipo).hide();
					$('#titulo-'+tipo+' strong').html('(Para agregar mas '+tipo+' puede cambiar su plan)');
				}
			}
		});
	}*/

/*	function actualizarArchivos(tipo){
		$.ajax({
			url: '/actualizar-archivos',
			type: 'get',
			data:{type: tipo, canje_id: id_canje},
			dataType: 'html',
		})
		.done(function(data) {
			$('#div-'+tipo).html(data);
		})	
	}
*/
});
