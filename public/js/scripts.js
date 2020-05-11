actualizarMensajes();
actualizarTratos();
setInterval(function(){
	if(mensajesNuevos() > 0) actualizarMensajes();
	if(tratosNuevos() > 0) actualizarTratos();
},10000);

function mensajesNuevos(){
	$.ajax({
		url: '/mensajes-nuevos',
		type: 'get',
		contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
		processData: false // NEEDED, DON'T OMIT THIS
	})
	.done(function(data) {
	return data;
	})
}

function tratosNuevos(){
	$.ajax({
		url: '/tratos-nuevos',
		type: 'get',
		contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
		processData: false // NEEDED, DON'T OMIT THIS
	})
	.done(function(data) {
	return data;
	})
}

function actualizarMensajes(){
	$.ajax({
		url: '/actualizar-mensajes',
		type: 'get',
		contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
		processData: false // NEEDED, DON'T OMIT THIS
	})
	.done(function(response) {
		$('#contador-mensajes').html(response);
	});
}

function actualizarTratos(){
	$.ajax({
		url: '/actualizar-contador-tratos',
		type: 'get',
		contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
		processData: false // NEEDED, DON'T OMIT THIS
	})
	.done(function(response) {
		$('#contador-tratos').html(response);
	});
}