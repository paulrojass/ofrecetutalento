$(function(){
	id_user = $('#auth_user').val();

	informacionPerfil();
	talentosPerfil();
	canjesPerfil();
	mostrar('#mi-perfil', '#a-perfil');
	//mostrar('#canje', '#a-canje');

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

	$('.datepicker').datepicker({
		format: 'mm-dd-yyyy'
	});

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
});

$('#talentos').on('click', '#agregar-talento', function(event){
	event.preventDefault();
	resetForm();
	$('#nuevo-talento').show();
	$('#actualizar-talento').hide();
});

$('#canjes').on('click', '#agregar-canje', function(event){
	event.preventDefault();
	resetForm();
	$('#nuevo-canje').show();
	$('#actualizar-canje').hide();
});

$('#mi-perfil-info').on('click', '#editar-perfil', function(e){
	e.preventDefault();
	editarPerfil();
});

$('#mi-perfil-info').on('click', '#no-editar', function(e){
	e.preventDefault();
	informacionPerfil();
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
	resetForm();
	$('#nuevo-canje').hide();
	$('#actualizar-canje').show();
	var id = $(this).data("value");
	var title = $(this).data("title");
	var price = $(this).data("price");
	var description = $(this).data("description");
	var talent = $(this).data("talent");
	var _token = $("input[name='_token']").val();

	$("input[name='id_exchange']").val(id);
	$("input[name='title-exchange']").val(title);
	$("input[name='price-exchange']").val(price);
	$("#description-exchange").val(description);
/*	$("#talent-exchange option[value='"+talent+"']").attr("selected", true);*/
	$('#talent-exchange').change();
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

function mostrar(div,a){
	var divs = ['#mi-perfil', '#talentos', '#canjes', '#tratos'];
	var as = ['#a-perfil', '#a-talentos', '#a-canjes', '#a-tratos'];
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
		url: 'info-perfil',
		type: 'Get',
		dataType: 'html',
	})
	.done(function(data) {
		$('#mi-perfil-info').html(data);
	})	
}

function talentosPerfil(){
	$.ajax({
		url: 'talentos-perfil',
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
		url: 'canjes-perfil',
		type: 'Get',
		dataType: 'html',
	})
	.done(function(data) {
		$('#canjes').html(data);
	})	
}


function editarPerfil(){
	$.ajax({
		url: 'form-perfil',
		type: 'Get',
		dataType: 'html',
	})
	.done(function(data) {
		$('#mi-perfil-info').html(data);
	})	
}

function resetForm() {
	$('form .form-error').attr({hidden: 'hidden'});
	$("form select").each(function() { this.selectedIndex = 0 });
	$("form input[type=text], form input[type=number] , form textarea").each(function() { this.value = '' });
}
