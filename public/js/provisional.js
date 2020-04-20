/* ========================= TRATOS  ========================== */

	/* Aprobar Trato */
/*	$('#tratos-r').on('click', '.aprobar', function(e){
		e.preventDefault();
		var trato_id = $(this).data('value');
		aprobarTrato(trato_id, 1);
	});

	 Rechazar Trato 
	$('#tratos-r').on('click', '.rechazar', function(e){
		e.preventDefault();
		var trato_id = $(this).data('value');
		aprobarTrato(trato_id, 0);
	});

	function aprobarTrato(id, valor){
		var _token = $("input[name='_token']").val();
		$.ajax({
			url: '/aprobar-trato',
			type: 'post',
			data: {dealing_id:id, aprobar:valor, _token:_token},
		})
		.done(function(response) {
			recibidosPerfil();
		});	
	}
*/
/*=== Agregar informacion a modal*/

$('#modal-trato').on('show.bs.modal', function (event) {
	
	var button = $(event.relatedTarget);
	var date = button.data('date');
	var type = button.data('type');
	var trato_id = button.data('trato');
	var canje_solicitado = button.data('canjer');
	var canje_propuesto = button.data('canjep');
	var name = button.data('name');
	var description = button.data('description');
	var ideal = button.data('ideal');
	var plus = button.data('plus');
	var value = button.data('value');
	var quantity = button.data('quantity');
	var approved = button.data('approved');
	var dealingready = button.data('dealingready');
	var proposalready = button.data('proposalready');
	var exchangeid = button.data('exchangeid');
	var exchangeprice = button.data('exchangeprice');
	var proposalid = button.data('proposalid');
	var exchangedays = button.data('exchangedays');
	var proposaldays = button.data('proposaldays');
	var pay = button.data('pay');
	var created = button.data('created');
	var acceptid = button.data('acceptid');
	var proposeid = button.data('proposeid');

	var modal = $(this);

	limpiarModal(modal);

	if (exchangeid === '') {
	//NO ES UN CANJE, ES UN TRATO
		modal.find('#info-trato-talento').html(
			'<div class="row">'+
			'	<div class="col-sm">'+
			'		<p> <strong>Fecha de propuesta: </strong>'+date+'</p>'+
			'	</div>'+
			'</div>'+
			'<div class="row">'+
			'	<div class="col-sm">'+
			'		<p> <strong>Nombre del trato: </strong>'+name+'</p>'+
			'	</div>'+
			'</div>'+
			'<div class="row">'+
			'	<div class="col-sm">'+
			'		<p><strong>Descripción: </strong>'+description+'</p>'+
			'	</div>'+
			'</div>'+
			'<div class="row">'+
			'	<div class="col-sm">'+
			'		<p><strong>Resultado Final ideal: </strong>'+ideal+'</p>'+
			'	</div>'+
			'</div>'+
			'<div class="row">'+
			'	<div class="col-sm">'+
			'		<p><strong>Factor crítico de calidad en el proyecto: </strong>'+plus+'</p>'+
			'	</div>'+
			'</div>'+
			'<div class="row">'+
			'	<div class="col-sm">'+
			'		<p><strong>Presupuesto por unidad: </strong> '+value+'</p>'+
			'	</div>'+
			'	<div class="col-sm">'+
			'		<p><strong>Cantidad solicitada: </strong>'+quantity+'</p>'+
			'	</div>'+
			'</div>'+
			'<div class="row">'+			
			'	<div class="col-sm">'+
			'		<p><strong>Días aproximados para culminar proyecto: </strong>'+exchangedays+'</p>'+
			'	</div>'+
			'</div>'
		);
	}
	else
	{
		//ES UN CANJE:
		modal.find('#info-trato-talento').html(
			'<div class="row">'+
			'	<div class="col-sm">'+
			'		<p> <strong>Fecha de propuesta: </strong>'+date+'</p>'+
			'	</div>'+
			'</div>'+
			'<div class="row">'+
			'	<div class="col-sm">'+
			'		<p> <strong>Canje solicitado: </strong><a class="link-canje" href="/canjes/'+canje_solicitado+'">'+exchangeid+'</a></p>'+
			'	</div>'+
			'</div>'+
			'<div class="row">'+
			'	<div class="col-sm">'+
			'		<p><strong>Descripción: </strong>'+description+'</p>'+
			'	</div>'+
			'</div>'+
			'<div class="row">'+
			'	<div class="col-sm">'+
			'		<p><strong>Días aproximados para entregar el canje solictiado: </strong>'+exchangedays+'</p>'+
			'	</div>'+
			'</div>'
		);
		if(pay === 0){
			//EL TRATO SE PAGA AL PRECIO DEL CANJE
			modal.find('#info-trato-canje-pago').html(
				'<div class="pago-canje">'+
				'	<div class="row">'+
				'		<div class="col-sm">'+
				'			<p> <strong>Canje propuesto: </strong> <a class="link-canje" href="/canjes/'+canje_propuesto+'">'+proposalid+'</a></p>'+
				'		</div>'+
				'	</div>'+
				'	<div class="row">'+
				'		<div class="col-sm">'+
				'			<p><strong>Días aproximados para entregar el canje propuesto: </strong>'+proposaldays+'</p>'+
				'		</div>'+
				'	</div>'+
				'</div>'
			);
		}
		else{
			// EL TRATO SE CAMBIA POR OTRO CANJE
			modal.find('#info-trato-canje-pago').html(
				'<div class="pago-precio">'+
				'	<div class="row">'+
				'		<div class="col-sm">'+
				'			<p><strong>Pago al precio del canje:</strong> '+exchangeprice+'</p>'+
				'		</div>'+
				'	</div>'+
				'</div>'
			);
		}
	}


	if( approved === ''){modal.find('#info-trato-aprobar').html('<p><strong>Estado del canje:</strong> Pendiente por aprobación </p>');}
	else if( approved === 0){modal.find('#info-trato-aprobar').html('<p><strong>Estado del canje:</strong> Omitido </p>');}
	else{modal.find('#info-trato-aprobar').html('<p><strong>Estado del canje:</strong> Aprobado </p>');}
	

	if( (type == 'recibido')){
	/*        SI EL TIPO DE TRATO ES RECIBIDO*/
		if(approved === ''){ 
		/*   SI EL TRATO RECIBIDO NOOO HA SIDO APROBADO*/
			modal.find('#div-boton-aprobar').html(
				'<div class="upload-info">'+
					'<a href="javascript:void(0)" data-trato="'+trato_id+'" id="boton-aprobar-trato">Aceptar</a>'+
				'</div>'+
				'<div class="upload-info">'+
					'<a href="javascript:void(0)" data-trato="'+trato_id+'" id="boton-rechazar-trato">Omitir</a>'+
				'</div>'
			);
		}else if(approved === 1){ /*SI EL TRATO RECIBIDO FUE APROBADO*/

			if(proposalready ===0){
				/*TRATO RECIBIDO, APROBADO Y LO QUE SE PROPUSO NOOOOO SE HA ENTREGADO */
				modal.find('#div-boton-aprobar').html(
					'<div class="upload-info">'+
						'<a href="javascript:void(0)" data-canje="'+canje_propuesto+'" data-trato="'+trato_id+'" id="boton-trato-p-recibido">Canje o Pago recibido</a>'+
					'</div>'
				);				
			}else if(proposalready === 1){
				/*TRATO RECIBIDO, APROBADO Y LO QUE SE PROPUSO SE ENTREGO*/
				if(pay == 0){
					if(exchangeid != ''){
						$('#valoracion').show();

					}
					$('#boton-valorar').data('canje', canje_propuesto);
					$('#boton-valorar').data('tipo', 'propuesto');
					$('#boton-valorar').data('proposeid', 'propuesto');
				}
				modal.find('#div-boton-aprobar').html(
				'		<div class="col-sm">'+
				'			<p>Pago o Canje propuesto se ha recibido</p>'+
				'		</div>'
				);


			}else{
					$('#valoracion').hide();
				modal.find('#div-boton-aprobar').html(
				'		<div class="col-sm">'+
				'			<p>Pago o Canje propuesto se ha recibido y valorado</p>'+
				'		</div>'
				);
			}
		}else{

			modal.find('#div-boton-aprobar').html('')
		}
	}else{	
	 /*      SI EL TRATO ES PROPUESTO POR EL AUTH*/
		if(approved === 1){
			/*TRATO PROPUSTO POR AUTH FUE APROBADO*/
			if(dealingready === 0){
				/*TRATO PROPUESTO POR AUTH, APROBADO Y LO QUE SE PROPUSO NO SE HA ENTREGADO */
				modal.find('#div-boton-aprobar').html(
					'<div class="upload-info">'+
						'<a href="javascript:void(0)" data-canje="'+canje_solicitado+'" data-trato="'+trato_id+'" id="boton-trato-s-recibido">Trato o Canje RECIBIDO</a>'+
					'</div>'
				);
			}else if(dealingready === 1){
				/*TRATO PROPUESTO POR AUTH, APROBADO Y LO QUE SE PROPUSO SE ENTREGO */
				$('#valoracion').show();
				$('#boton-valorar').data('canje', canje_solicitado);
				$('#boton-valorar').data('tipo', 'solicitado');
				modal.find('#div-boton-aprobar').html(
				'		<div class="col-sm">'+
				'			<p>Trato o Canje solicitado se ha recibido</p>'+
				'		</div>'
				);	
			}else if(dealingready === 2) {
				$('#valoracion').hide();
				modal.find('#div-boton-aprobar').html(
				'		<div class="col-sm">'+
				'			<p>Trato o Canje solicitado se ha recibido y valorado</p>'+
				'		</div>'
				);	
			}
		}
	}
	$('#boton-valorar').on('click', function(event) {
		/*event.stopPropagation();*/
		event.stopImmediatePropagation();

		var rating = $('#rating').val();
		var comentario = $('#comment').val();
		var canje_id = $(this).data('canje');
		var tipo = $(this).data('tipo');
		console.log(tipo);
		if(tipo == 'solicitado') evaluado = $(this).data('acceptid');
		if(tipo == 'propuesto') evaluado = $(this).data('proposeid');
		console.log(evaluado);
		valorar(canje_id, trato_id, comentario, rating, tipo, evaluado); 
	});	
});

$('#div-boton-aprobar').on('click', '#boton-aprobar-trato', function(event) {
	event.preventDefault();
	var trato = $(this).data('trato');
	aprobar(trato, 1);
});
$('#div-boton-aprobar').on('click', '#boton-rechazar-trato', function(event) {
	event.preventDefault();
	var trato = $(this).data('trato');
	aprobar(trato, 0);
});
$('#div-boton-aprobar').on('click', '#boton-trato-p-recibido', function(event) {
	event.preventDefault();
	var trato = $(this).data('trato');
	var canje = $(this).data('canje');
	recibido(trato, canje, 'propuesto');
});
$('#div-boton-aprobar').on('click', '#boton-trato-s-recibido', function(event) {
	event.preventDefault();
	var trato = $(this).data('trato');
	var canje = $(this).data('canje');
	recibido(trato, canje, 'solicitado');
});





function aprobar(trato, tipo){
	var _token = $("input[name='_token']").val();
	var modal = $('#modal-trato');
	$.ajax({
		url: '/aprobar-trato',
		type: 'post',
		data: {dealing_id: trato, aprobar:tipo, _token:_token},
	})
	.done(function() {
		recibidosPerfil();
		propuestosPerfil();
		$('#info-trato-aprobar').html('');
		$('#div-boton-aprobar').html('');
		if(tipo == 0){
			$("#alert-trato-rechazado").fadeTo(2000, 500).slideUp(500, function(){
			    $("#alert-trato-rechazado").slideUp(1000);
	    		$('#modal-trato').modal('toggle');
			});
		}else{
			$("#alert-trato-aceptado").fadeTo(2000, 500).slideUp(500, function(){
			    $("#alert-trato-aceptado").slideUp(1000);
	    		$('#modal-trato').modal('toggle');			    
			});
		}
	})
	.fail(function() {
		console.log("error");
	});
}

function recibido(trato, canje,  tipo){
	var _token = $("input[name='_token']").val();
	var modal = $('#modal-trato');
	$.ajax({
		url: '/trato-recibido',
		type: 'post',
		data: {dealing_id: trato, recibido:tipo, _token:_token},
	})
	.done(function(data) {
		recibidosPerfil();
		propuestosPerfil();
		$('#info-trato-aprobar').html('');
		$('#div-boton-aprobar').html('');
		if(tipo === 'propuesto'){
			$("#alert-trato-p-recibido").fadeTo(2000, 500).slideUp(500, function(){
			    $("#alert-trato-p-recibido").slideUp(1000);
			    if(data==''){
				   	modal.modal('toggle');
			    }else{
			    	$('#valoracion').show();
					$('#boton-valorar').data('canje', canje);
				}
			});
		}
		if(tipo ==='solicitado'){
			$("#alert-trato-s-recibido").fadeTo(2000, 500).slideUp(500, function(){
			    $("#alert-trato-s-recibido").slideUp(1000);
			    if(data==''){
				   	modal.modal('toggle');
			    }else{
			    	$('#valoracion').show();
					$('#boton-valorar').data('canje', canje);
				}
			});
		}

	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}

function valorar(exchange_id, trato_id, comment, rating, type, evaluado){
	var modal = $('#modal-trato');
	var _token = $("input[name='_token']").val();
	/*alert('canje: '+exchange_id+', comentario: '+comment+', rating: '+rating);*/
	$.ajax({
		url: '/valorar',
		type: 'post',
		data: {canje_id: exchange_id, trato_id:trato_id, comment:comment, rating:rating, _token:_token, type: type, evaluated_id: evaluado},
	})
	.done(function() {
		recibidosPerfil();
		propuestosPerfil();
		$("#alert-comentario").fadeTo(2000, 500).slideUp(500, function(){
		    $("#alert-comentario").slideUp(1000);
		    modal.modal('toggle');
		});
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}

function limpiarModal(modal){
	$('#valoracion').hide();
	modal.find('#info-trato-talento').html('')
	modal.find('#info-trato-canje-pago').html('')
	modal.find('#boton-aprobar').html('')
		$('#info-trato-aprobar').html('');
		$('#div-boton-aprobar').html('');
}



/* ================ TRATOS*/