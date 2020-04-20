$(function(){
	$(".alert").hide();
	var id_talento = $('#talento_id').val();
	var user_id = $('#auth_user').val();

	cargaInicial(id_talento);

	function cargaInicial(id_canje){
		//$("#tipo-pago").checked();
		actualizarArchivos('image');
		actualizarArchivos('video');
		actualizarArchivos('pdf');
		if(user_id){actualizarLikes(id_talento, '0', 'talento');}
	}

	$('.job-title2').on('click', '#a-me-gusta',function(e){
		e.preventDefault();
		actualizarLikes(id_talento, '1', 'talento');
	});

	function actualizarLikes(id_talent, cambiar, tipo){
		$.ajax({
			url: '/cambiar-like',
			type: 'get',
			data: {talent_id : id_talent, cambiar:cambiar, tipo:tipo},
			dataType: 'html',
		})
		.done(function(data) {
			$('.me-gusta').html(data);
		});
	}


/*MOODAL PARA TRATOS*/
	$('#boton-nuevo-trato-talento').click(function(event) {
		event.preventDefault();
		var dataString = $('#form-trato-talento').serialize();
		$.ajax({
			url: '/nuevo-trato-talento',
			type: 'get',
			data: dataString,
			contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
			processData: false // NEEDED, DON'T OMIT THIS
		})
		.done(function(response) {
			if(response.errors){
				$("#alert-error").fadeTo(2000, 500).slideUp(500, function(){
				    $("#alert-error").slideUp(1000);
				});
      		}else{
      			$('.alert-danger').hide();

				$("#alert-trato").fadeTo(2000, 500).slideUp(500, function(){
				    $("#alert-trato").slideUp(1000);
				    $('#modal-trato').modal('hide');
					$("#form-trato-talento")[0].reset();
				});
      		}
		});
	});



	$('#modal-trato').on('show.bs.modal', function (e) {
		$('#form-trato-talento')[0].reset();
		$('#div-pago').show();
		$('#div-canje').hide();
		$('#div-propuesta').hide();
		$('#div-tiempo').hide();
	});

	$('#tipo-pago').click(function () {
		$('#div-pago').show();
		$('#div-canje').hide();
		$('#div-propuesta').hide();
		$('#div-tiempo').hide();
		$('#proposal_id').val('');
	});
	$('#tipo-canje').click(function () {
		$('#div-pago').hide();
		$('#div-canje').show();
		$('#div-propuesta').hide();
		$('#div-tiempo').show();
	});
	$('#tipo-propuesta').click(function(){
		$('#div-pago').hide();
		$('#div-canje').hide();
		$('#div-propuesta').show();
		$('#div-tiempo').show();
		$('#proposal_id').val('');
	});
/*FIN MODAL PARA TRATOS*/
	function actualizarArchivos(tipo){
		$.ajax({
			url: '/actualizar-archivos',
			type: 'get',
			data:{type: tipo, talent_id: id_talento},
			dataType: 'html',
		})
		.done(function(data) {
			$('#div-'+tipo).html(data);
		})	
	}
})

