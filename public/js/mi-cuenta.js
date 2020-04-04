id_user = $('#auth_user').val();

$(function(){
	informacionPerfil();
	talentosPerfil();
	canjesPerfil();
	recibidosPerfil();
	propuestosPerfil();
	mostrar('#mi-perfil', '#a-perfil');

	$('.alert').hide();


	// Read value on page load
	$(".result-language b").html($("#level-language").val());

	// Read value on change
	$("#level-language").change(function(){
		$(".result-language b").html($(this).val());
	});

	// Read value on page load
	$(".result-talent b").html($("#level-talent").val());

	// Read value on change
	$("#level-talent").change(function(){
		$(".result-talent b").html($(this).val());
	});

	$("#title").on('keypress', function(){$('#e_title').hide()});
	$("#category").on('change', function(){$('#e_category').hide()});
	$("#description").on('keypress', function(){$('#e_description').hide()});

/*	$('.datepicker').datepicker({
		format: 'mm-dd-yyyy'
	});
*/

/*$('#datepicker').datepicker({
  uiLibrary: 'bootstrap4',
  locale: 'es-es',
});
*/


	$('#avatar').change(function(){
		cambiarFoto();
	});

	$("#img-avatar").click(function () {
		$("#avatar").trigger('click');
		$('.alert').alert('close')
	});
	$("#button-avatar").click(function () {
		$("#avatar").trigger('click');
		$('.alert').alert('close')
	});

	/*imagen de canje*/
	$('#canjes').on('change','#img-canje-file',function(){
		canje_id = $('#input-image-canje').val();
		cambiarImagenCanje(canje_id);
	});

	$("#canjes").on('click', '#img-canje', function () {
		$("#img-canje-file").trigger('click');
		$('.alert').alert('close')
	});
	$("#canjes").on('click', '#button-image-canje', function () {
		$("#img-canje-file").trigger('click');
		$('.alert').alert('close')
	});
	/*fin imagen de canje*/
});

$('#talentos').on('click', '#agregar-talento', function(event){
	event.preventDefault();
	resetForm();
});

$('#canjes').on('click', '#agregar-canje', function(event){
	event.preventDefault();
	resetForm();
});

$('#mi-perfil-info').on('click', '#editar-perfil', function(e){
	e.preventDefault();
	editarPerfil();
});

$('#talentos').on('click', '.editar-talento', function(e){
	e.preventDefault();
	resetForm();
	$('#nuevo-talento').hide();
	$('#actualizar-talento').show();
	var id = $(this).data("value");
	var title = $(this).data("title");
	var category = $(this).data("category");
	var description = $(this).data("description");
	var level = $(this).data("level");
	var _token = $("input[name='_token']").val();

	$("input[name='id_talent']").val(id);
	$("input[name='title']").val(title);
	$("#categories").val(category);
	$("input[name='level-talent']").val(level);
	$("input[name='description']").val(description);
	$(".result-talent b").html(level);
	$('#categories').change();
});


$('#canjes').on('click', '.editar-canje', function(e){
	e.preventDefault();
	canje_id = $(this).data('value');
	editarCanje(canje_id);
	
});



$('#talentos').on('click', '.eliminar-talento', function(e){
	e.preventDefault();
	var id = $(this).attr("value");
	var _token = $("input[name='_token']").val();
	$.ajax({
		url: '/eliminar-talento',
		type: 'post',
		data: {id : id, _token:_token},
	})
	.done(function(response) {
		talentosPerfil();
	});	
});

$('#canjes').on('click', '.eliminar-canje', function(e){
	e.preventDefault();
	var id = $(this).attr("value");
	var _token = $("input[name='_token']").val();
	$.ajax({
		url: '/eliminar-canje',
		type: 'post',
		data: {id : id, _token:_token},
	})
	.done(function(response) {
		canjesPerfil();
	});	
});

$('#mi-perfil-info').on('click','.elimina-idioma',function(e){
	var id = $(this).attr("value");
	var _token = $("input[name='_token']").val();
	$.ajax({
		url: 'eliminar-idioma',
		type: 'post',
		data: {id : id, _token:_token},
	})
	.done(function(response) {
		informacionPerfil();
	});			
});

$('#nuevo-idioma').click( function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	var language = $('#language').val();
	var level = $('#level-language').val();
	var _token = $("input[name='_token']").val();
	$.ajax({
		url: 'cambiar-idioma',
		type: 'post',
		data: {language : language, level:level , _token:_token},
	})
	.done(function(response) {
		informacionPerfil();
		$('#modal-idioma').modal('hide');
		$("#form-idioma")[0].reset();
	});
});

$('#mi-perfil-info').on('click', '#button-registro', function(e){
	e.preventDefault();
	var dataString = $('#form-actualizar-usuario').serialize();
	$.ajax({
		url: 'actualizar_usuario',
		type: 'get',
		data: dataString,
		contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
		processData: false // NEEDED, DON'T OMIT THIS
	})
	.done(function(response) {
		informacionPerfil();
		$('html, body').animate({scrollTop:0}, 1250);
	});
});

$('#actualizar-talento').click(function(e){
	e.preventDefault();
	var _token = $("input[name='_token']").val();
	var title = $("input[name='title']").val();
	var category = $("#categories").val();
	var level = $("input[name='level-talent']").val();
	var description = $("input[name='description']").val();
	var id_talent = $("input[name='id_talent']").val();

	if(title == "" || category == "" || description ==""){
		if(title == "") $('#e_title').removeAttr('hidden'); else $('#e_title').attr({hidden: 'hidden'});
		if(category == "") $('#e_category').removeAttr('hidden'); else $('#e_category').attr({hidden: 'hidden'});
		if(description == "") $('#e_description').removeAttr('hidden'); else $('#e_description').attr({hidden: 'hidden'});
	}
	else
	{
		$.ajax({
			type:'POST',
			url:'actualizar_talento',
			data:{
				id_user: id_user,
				id: id_talent,
				title:title,
				category:category,
				level:level,
				description:description,
				_token:_token
			},
		})
		.done(function(data) {
			if($.isEmptyObject(data.error)){
				verificarTalentos(id_user);
				talentosPerfil();
				$('#modal-talento').modal('hide');
				resetForm();
			}else{
				printErrorMsg(data.error);
			}
		})
		.fail(function(data) {
			printErrorMsg(data.error);
		});
	}
});

$('#actualizar-canje').click(function(e){
	e.preventDefault();
	var _token = $("input[name='_token']").val();
	var exchange_id = $("input[name='id_exchange']").val();
	var title = $("input[name='title-exchange']").val();
	var price = $("input[name='price-exchange']").val();
	var description = $("#description-exchange").val();
	var talent_id = $("#talent-exchange").val();

	if(title == "" || price == "" || description =="" || talent_id ==""){
		if(title == "") $('#e_title_exchange').removeAttr('hidden'); else $('#e_title_exchange').attr({hidden: 'hidden'});
		if(price == "") $('#e_price_exchange').removeAttr('hidden'); else $('#e_price_exchange').attr({hidden: 'hidden'});
		if(description == "") $('#e_description_description').removeAttr('hidden'); else $('#e_description_description').attr({hidden: 'hidden'});
		if(talent_id == "") $('#e_talent_exchange').removeAttr('hidden'); else $('#e_talent_exchange').attr({hidden: 'hidden'});
	}
	else
	{
		$.ajax({
			type:'POST',
			url:'actualizar_canje',
			data:{
				id: exchange_id,
				title:title,
				price:price,
				talent_id:talent_id,
				description:description,
				_token:_token
			},
		})
		.done(function(data) {
			canjesPerfil();
			$('#modal-canje').modal('hide');
			resetForm();
		});
	}
});

$('#nuevo-canje').click(function(e){
	e.preventDefault();
	var _token = $("input[name='_token']").val();
	var title = $("input[name='title-exchange']").val();
	var price = $("input[name='price-exchange']").val();
	var talent_id = $("#talent-exchange").val();
	var description = $("#description-exchange").val();

	if(title == "" || price == "" || description =="" || talent_id ==""){
		if(title == "") $('#e_title_exchange').removeAttr('hidden'); else $('#e_title_exchange').attr({hidden: 'hidden'});
		if(price == "") $('#e_price_exchange').removeAttr('hidden'); else $('#e_price_exchange').attr({hidden: 'hidden'});
		if(talent_id == "") $('#e_talent_exchange').removeAttr('hidden'); else $('#e_talent_exchange').attr({hidden: 'hidden'});
		if(description == "") $('#e_description_exchange').removeAttr('hidden'); else $('#e_description_exchange').attr({hidden: 'hidden'});
	}
	else
	{
		$.ajax({
			type:'get',
			url:'/guardar-canje',
			data:{
				id_user: id_user,
				title:title,
				talent_id:talent_id,
				price:price,
				description:description,
				_token:_token
			}
		})
		.done(function(data) {
			$('#canjes').html(data);
			$('#modal-canje').modal('hide');
			verificarTalentos(id_user);
		});
	}
});



$('#canjes').on('click', '#no-editar-canje', function(e){
	e.preventDefault();
	canjesPerfil();
});

$('#mi-perfil-info').on('click', '#no-editar', function(e){
	e.preventDefault();
	informacionPerfil();
});




$('#nuevo-talento').click(function(e){
	e.preventDefault();
	var _token = $("input[name='_token']").val();
	var title = $("input[name='title']").val();
	var category = $("#categories").val();
	var level = $("input[name='level-talent']").val();
	var description = $("input[name='description']").val();

	if(title == "" || category == "" || description ==""){
		if(title == "") $('#e_title').removeAttr('hidden'); else $('#e_title').attr({hidden: 'hidden'});
		if(category == "") $('#e_category').removeAttr('hidden'); else $('#e_category').attr({hidden: 'hidden'});
		if(description == "") $('#e_description').removeAttr('hidden'); else $('#e_description').attr({hidden: 'hidden'});
	}
	else
	{
		$.ajax({
			type:'POST',
			url:'guardar_talento',
			data:{
				id_user: id_user,
				title:title,
				category:category,
				level:level,
				description:description,
				_token:_token
			},
		})
		.done(function(data) {
			if($.isEmptyObject(data.error)){
				verificarTalentos(id_user);
				talentosPerfil();
				$('#modal-talento').modal('hide');
				resetForm();
			}else{
				printErrorMsg(data.error);
			}
		})
		.fail(function(data) {
			printErrorMsg(data.error);
		});
	}
});

function printErrorMsg (msg) {
	$(".print-error-msg").find("ul").html('');
	$(".print-error-msg").css('display','block');
	$.each( msg, function( key, value ) {
		console.log(value);
	});
}


function verificarTalentos(id_user){
	var _token = $("input[name='_token']").val();
	$.ajax({
		type: 'POST',
		url:'verificar_talentos',
		data:{user_id : id_user, _token:_token},
		success:function(data){
			if(data.disponibles == null){
				$('#disponibles').html('(ilimitados)');
			}else if(data.disponibles > 0){
				$('#disponibles').html('('+data.disponibles+' disponibles)');
			}else{
				$('#agregar-talento').hide();
				$('#disponibles').html('(Para agregar mas talentos puede cambiar su plan)');
			}
		}
	});
}

function cambiarFoto(){
	var formData = new FormData();
	formData.append('avatar', $('#avatar')[0].files[0]);
	formData.append('_token', $("input[name='_token']").val());
	formData.append('id', id_user);
	$.ajax({
		url: '/cambiar-foto',
		type: 'post',
		data: formData,
		contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
		processData: false // NEEDED, DON'T OMIT THIS
	})
	.done(function(response) {
		$("#ll").html('<div class="alert alert-success" role="alert">La foto ha cambiado exitosamente</div>');
		$('#div-imagen').html(response);
	})
	.fail(function() {
		$("#ll").html('<div class="alert alert-danger" role="alert">El formato del archivo debe ser de imagen (jpg, jpeg, png)</div>');
	});
	
}






/* ================================== MENU MENU */
function mostrar(div,a){
	var divs = ['#mi-perfil', '#talentos', '#canjes', '#tratos-r', '#tratos-p'];
	var as = ['#a-perfil', '#a-talentos', '#a-canjes', '#a-tratos-r', '#a-tratos-p'];
	$.each(divs, function(index, value){
		$(value).fadeOut();
	});
	$.each(as, function(index, value){
		$(value+' i').css('color','#888888');
		$(value).css('color','#888888');
	});


	$(div).fadeIn();
	$(a+' i').css('color','#8b91dd');
	$(a).css('color','#8b91dd');
}

function informacionPerfil(){
	$.ajax({
		url: '/info-perfil',
		type: 'Get',
		dataType: 'html',
	})
	.done(function(data) {
		$('#mi-perfil-info').html(data);
	})	
}

function talentosPerfil(){
	$.ajax({
		url: '/talentos-perfil',
		type: 'Get',
		dataType: 'html',
	})
	.done(function(data) {
		$('#talentos').html(data);
		verificarTalentos(id_user);
	})	
}

function canjesPerfil(){
	$.ajax({
		url: '/canjes-perfil',
		type: 'Get',
		dataType: 'html',
	})
	.done(function(data) {
		$('#canjes').html(data);
		verificarArchivos
	})	
}

function recibidosPerfil(){
	$.ajax({
		url: '/recibidos-perfil',
		type: 'get',
		dataType: 'html',
	})
	.done(function(data) {
		$('#tratos-r').html(data);
	})	
}

function propuestosPerfil(){
	$.ajax({
		url: '/propuestos-perfil',
		type: 'Get',
		dataType: 'html',
	})
	.done(function(data) {
		$('#tratos-p').html(data);
	})	
}

function editarPerfil(){
	$.ajax({
		url: '/form-perfil',
		type: 'Get',
		dataType: 'html',
	})
	.done(function(data) {
		$('#mi-perfil-info').html(data);
	})
}

function editarCanje(id){
	$.ajax({
		url: '/form-canje',
		type: 'get',
		data: {id:id},
		dataType: 'html',
	})
	.done(function(data) {
		$('#canjes').html(data);
		$('#canje_id_image').val(id);
		$('#canje_id_video').val(id);
		$('#canje_id_pdf').val(id);
		cargaInicial(id);
	});
}
/* ================================== MENU MENU */

function resetForm() {
	$('form .form-error').attr({hidden: 'hidden'});
	$("form select").each(function() { this.selectedIndex = 0 });
	$("form input[type=text], form input[type=number] , form textarea").each(function() { this.value = '' });
}


/* ================ CANJES  */
/*Canje Formulario*/
$('#canjes').on('click', '#actualizar-canje', function(e){
	e.preventDefault();
	var _token = $("input[name='_token']").val();
	var id = $('#a-form-canje-id').val();
	var title = $('#a-title-exchange').val();
	var price = $('#a-price-exchange').val();
	var talent_id = $('#a-talent-exchange').val();
	var description = $('#a-description-exchange').val();
	if(title == "" || price == "" || description =="" || talent_id ==""){
		if(title == "") $('#e_a_title_exchange').removeAttr('hidden'); else $('#e_a_title_exchange').attr({hidden: 'hidden'});
		if(price == "") $('#e_a_price_exchange').removeAttr('hidden'); else $('#e_a_price_exchange').attr({hidden: 'hidden'});
		if(talent_id == "") $('#e_a_talent_exchange').removeAttr('hidden'); else $('#e_talent_a_exchange').attr({hidden: 'hidden'});
		if(description == "") $('#e_a_description_exchange').removeAttr('hidden'); else $('#e_a_description_exchange').attr({hidden: 'hidden'});
	}
	else
	{
		$.ajax({
			url: '/actualizar-datos-canje',
			type: 'get',
			data: {id: id, title: title, price:price, talent_id:talent_id, description:description, _token:_token}
		})
		.done(function(response) {
			$('#canjes').html(response);
		});
	}
});
function cambiarImagenCanje(id){
	var formData = new FormData();
	formData.append('img-canje-file', $('#img-canje-file')[0].files[0]);
	formData.append('_token', $("input[name='_token']").val());
	formData.append('id', id);
	$.ajax({
		url: '/cambiar-imagen-canje',
		type: 'post',
		data: formData,
		contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
		processData: false // NEEDED, DON'T OMIT THIS
	})
	.done(function(response) {
		$("#ll-canje").html('<div class="alert alert-success" role="alert">La foto ha cambiado exitosamente</div>');
		$('#canjes').html(response);
	})
	.fail(function() {
		$("#ll-canje").html('<div class="alert alert-danger" role="alert">Por favor revisar formato y dimensines minimas</div>');
	});
	
}
/* ================ CANJES  */

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
		//ES UN TRATO:
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
		valorar(canje_id, trato_id, comentario, rating, tipo);
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

function valorar(exchange_id, trato_id, comment, rating, type){
	var modal = $('#modal-trato');
	var _token = $("input[name='_token']").val();
	/*alert('canje: '+exchange_id+', comentario: '+comment+', rating: '+rating);*/
	$.ajax({
		url: '/valorar',
		type: 'post',
		data: {canje_id: exchange_id, trato_id:trato_id, comment:comment, rating:rating, _token:_token, type: type},
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


//================================== MANIPULACION DE ARCHIVOS
	function cargaInicial(canje_id){
		verificarArchivos('image', canje_id);
		//actualizarArchivos('image', canje_id);
		verificarArchivos('video', canje_id);
		//actualizarArchivos('video', canje_id);
		verificarArchivos('pdf', canje_id);
		//actualizarArchivos('pdf', canje_id);
	}

	function verificarArchivos(tipo, canje_id){
		var _token = $("input[name='_token']").val();
		$.ajax({
			type: 'POST',
			url:'/verificar-archivos',
			data:{user_id : id_user, exchange_id: canje_id, _token:_token, type: tipo},
			success:function(data){
				if(data.disponibles == null){
					$('#titulo-'+tipo+' span').html('(sin limite)');
				}else if(data.disponibles > 0){
					if(tipo == 'pdf'){
						$('#titulo-'+tipo+' span').html('('+data.disponibles+' disponibles de '+data.pdfmax+'Mb máximo)');
					}else{
						$('#titulo-'+tipo+' span').html('('+data.disponibles+' disponibles)');
					}
				}else{
					$('#agregar-'+tipo).hide();				}
			}
		});
	}

	$('#input-new-image').change(function(){
		verificarImagen();
	});

	$("#button-input-new-image").click(function () {
		$("#input-new-image").trigger('click');
		$('.alert').alert('close')
	});


	function verificarImagen(){
		alert('verificando');
	}

	$("#button-input-new-video").click(function () {
		$("#input-new-video").trigger('click');
		$('.alert').alert('close')
	});

	$('#input-new-video').change(function(){
		verificarVideo();
	});

	function verificarVideo(){
		var formData = new FormData();
		formData.append('video_file', $('#input-new-video')[0].files[0]);
		formData.append('_token', $("input[name='_token']").val());
		$.ajax({
			url: '/es-video',
			type: 'post',
			data: formData,
			contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
			processData: false // NEEDED, DON'T OMIT THIS
		})
		.done(function(response) {
			if(response.success){
				$("#mensaje-nuevo-video").html('<div class="alert alert-success" role="alert">Video aceptado</div>');
			}else{
				$("#mensaje-nuevo-video").html('<div class="alert alert-warning" role="alert">Formato invalido, intente de nuevo</div>');
			}
		});	
	}

/*Dropzone Image*/
    Dropzone.options.dropimage =
    {
    	autoProcessQueue: false,
        maxFilesize: 1,
        maxFiles: 1,
        acceptedFiles: ".jpeg,.jpg,.png",
        timeout: 5000,
       	init: function(formData) {
            var submitBtnImage = document.querySelector("#enviar-imagen");
            myDropzoneImage = this;
            
            submitBtnImage.addEventListener("click", function(e){
                e.preventDefault();
                e.stopPropagation();
                myDropzoneImage.processQueue();
            });
            this.on("addedfile", function(file) {
                //alert("file uploaded");
            });
		    this.on("sending", function(file, xhr, formData) {
		      formData.append("description", $('#description-image').val());
		      formData.append("canje_id", $('#canje_id_image').val());
		    });

            this.on("complete", function(file) {
                myDropzoneImage.removeFile(file);
	            $('#modal-nueva-image').modal('toggle');
	            $('#information-image')[0].reset();
            });
            this.on("success", function(file, response){
                myDropzoneImage.processQueue.bind(myDropzoneImage);
	            editarCanje(response);
            }
            );
        }
    };
/*Dropzone Image*/
    Dropzone.options.dropvideo =
    {
    	autoProcessQueue: false,
        maxFilesize: 20,
        maxFiles: 1,
        acceptedFiles: ".mp4",
        timeout: 5000,
       	init: function(formData) {
            var submitBtnVideo = document.querySelector("#enviar-video");
            myDropzoneVideo = this;
            
            submitBtnVideo.addEventListener("click", function(e){
                e.preventDefault();
                e.stopPropagation();
                myDropzoneVideo.processQueue();
            });
            this.on("addedfile", function(file) {
                //alert("file uploaded");
            });
		    this.on("sending", function(file, xhr, formData) {
		      formData.append("description", $('#description-video').val());
		      formData.append("canje_id", $('#canje_id_video').val());
		    });

            this.on("complete", function(file) {
                myDropzoneVideo.removeFile(file);
	            $('#modal-nuevo-video').modal('toggle');
	            $('#information-video')[0].reset();
            });
            this.on("success", function(file, response){
                myDropzoneVideo.processQueue.bind(myDropzoneVideo);
	            editarCanje(response);
            }
            );
        }
    };

    Dropzone.options.droppdf =
    {
    	autoProcessQueue: false,
        maxFilesize: $('#input_pdf_size').val(),
        maxFiles: 1,
        acceptedFiles: ".pdf",
        timeout: 5000,
       	init: function(formData) {
            var submitBtnPdf = document.querySelector("#enviar-pdf");
            myDropzonePdf = this;
            
            submitBtnPdf.addEventListener("click", function(e){
                e.preventDefault();
                e.stopPropagation();
                myDropzonePdf.processQueue();
            });
            this.on("addedfile", function(file) {
                //alert("file uploaded");
            });
		    this.on("sending", function(file, xhr, formData) {
		      formData.append("description", $('#description-pdf').val());
		      formData.append("name", $('#name_pdf').val());
		      formData.append("canje_id", $('#canje_id_pdf').val());
		    });

            this.on("complete", function(file) {
                myDropzonePdf.removeFile(file);
	            $('#modal-nuevo-pdf').modal('toggle');
	            $('#information-pdf')[0].reset();
            });
            this.on("success", function(file, response){
                myDropzonePdf.processQueue.bind(myDropzonePdf);
	            editarCanje(response);
            }
            );
        }
    };

/*Dropzone*/

$('#canjes').on('click', '.eliminar_imagen_canje', function (e) {
	e.preventDefault()
	archivo = $(this).data('value');
	canje = $(this).data('canje');
	eliminarArchivo(archivo);
});

$('#canjes').on('click', '.editar_inf_image', function (e) {
	e.preventDefault()
	$('#canje_id_image_edit').val($(this).data('value'));
	$("#description-image-edit").val($(this).data('description'));
});

$('#canjes').on('click', '.editar_inf_pdf', function (e) {
	e.preventDefault()
	$('#canje_id_pdf_edit').val($(this).data('value'));
	$("#description-pdf-edit").val($(this).data('description'));
	$("#name_pdf_edit").val($(this).data('name'));
});

$('#b-editar-imagen').click(function (e) {
	e.preventDefault();
	var canje = $('#canje_id_image_edit').val();
	actualizarArchivo(canje);
});

$('#b-editar-pdf').click(function (e) {
	e.preventDefault();
	var canje = $('#canje_id_pdf_edit').val();
	actualizarArchivoPDF(canje);
});

function eliminarArchivo(id)
{
	var _token = $("input[name='_token']").val();
	$.ajax({
		url: '/eliminar-archivo',
		type: 'post',
		data: {id: id, _token: _token},
	})
	.done(function(response) {
		editarCanje(response);
/*		$('#canjes').html(response);*/
	});
}

function actualizarArchivo(id)
{
	var _token = $("input[name='_token']").val();
	var description = $("#description-image-edit").val();
	$.ajax({
		url: '/editar-archivo',
		type: 'post',
		data: {id: id, description:description, _token: _token},
	})
	.done(function(response) {
		$('#modal-edit-image').modal('hide');
		$('#form-information-image-edit')[0].reset();		
		editarCanje(response);
/*		$('#canjes').html(response);*/
	});
}

function actualizarArchivoPDF(id)
{
	var _token = $("input[name='_token']").val();
	var name = $("#name_pdf_edit").val();
	var description = $("#description-pdf-edit").val();
	$.ajax({
		url: '/editar-archivo',
		type: 'post',
		data: {id: id, description:description, name: name, _token: _token},
	})
	.done(function(response) {
		$('#modal-edit-pdf').modal('hide');
		$('#form-information-pdf-edit')[0].reset();		
		editarCanje(response);
/*		$('#canjes').html(response);*/
	});
}

//================================== MANIPULACION DE ARCHIVOS

/*================================== RATING ==========================*/

var $star_rating = $('.star-rating .la');

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
$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();

/*================================== RATING ==========================*/
