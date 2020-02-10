actualizarMensajes();

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