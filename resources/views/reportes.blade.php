@extends('layouts.tema')

@section('title', 'Reporte de talento')

@section('header_type', 'gradient')

@section('css')

@endsection

@section('content')
<div class="profile-form-edit p-5">
	<div class="faqs p-5">
		<div class="faq-box">
			<h2>Reportando un talento <i class="la la-minus"></i></h2>
			<div class="contentbox">
			<p>Muchas gracias por tomarte el tiempo de llenar este formulario. Uno de los pilares de Ofrece Tu Talento es mantener una comunidad unida, productiva y eficiente no solo a nivel operativo sino también con orden y camaradería entre nuestros miembros.</p>  

			<p>Por tal motivo, nos gustaría conocer cualquier situación en donde un miembro de nuestra comunidad no cumplió con estos estándares de comportamiento y orden de la comunidad.</p>

			<p>Favor llenar el siguiente formulario con el mayor detalle posible.  </p>
			</div>
		</div>
	</div>

	<form method="post" action="{{ route('reporte-enviado')}}">
		<div class="row">
			<div class="col-lg-12">
				<span class="pf-title">Fecha: {{ now() }}</span>
				<input type="hidden" name="fecha" id="fecha" value="{{ now() }}">
			</div>
			
			<div class="col-lg-12">
				<span class="pf-title">Nombre del Talento o Caza Talentos que quieras reportar</span>
				<div class="pf-field">
					<input type="text" id="nombre" name="nombre" placeholder=""  required />
				</div>
			</div>
			<div class="col-lg-6">
				<span class="pf-title">Causa o razón </span>
				<div class="pf-field">
					<select class="chosen" name="causa" id="causa"   required >
						<option value="1">No cumplió el trato como me lo esperaba</option>
						<option value="2">No cumplío el canje como me lo esperaba</option>
						<option value="3">Decidimos en un trato pero no volvió a comunicarse</option>
						<option value="4">Decidimos en un canje pero no volvió a comunicarse</option>
						<option value="5">Tardanza en el canje o servicio previamente acordado</option>
						<option value="6">Falta en la calidad en el canje o servicio previamente acordado</option>
						<option value="7">Fotos, videos o contenido inapropiado u ofensivo</option>
						<option value="8">Mensajes internos inapropiados u ofensivos</option>
						<option value="9">Esta persona está fingiendo alguien que no es</option>
						<option value="10">Perfil o cuenta falsa</option>
						<option value="11">Esta persona me estafó o intentó estafarme</option>
						<option value="12">Esta persona está ofreciendo productos o servicios inapropiados o ilegales</option>
					</select>
				</div>
			</div>
			<div class="col-lg-12">
				<span class="pf-title"> Descripción del Evento (favor detalla fechas y cantidades lo mejor posible)</span>
				<div class="pf-field">
					<textarea id="descripcion" name="descripcion" required ></textarea>
				</div>
			</div>

			<div class="col-lg-6">
				<span class="pf-title">¿Podemos revisar tus últimos mensajes con esta persona para validar tu caso?</span>
				<div class="pf-field">
					<select data-placeholder="Allow In Search" class="chosen" name="revisar" id="revisar" required >
					<option value="si">Si</option>
					<option value="no">No</option>
				</select>
				</div>
			</div>
			<div class="col-lg-12">
				<button type="submit" id="enviar-reporte">Enviar reporte</button>
			</div>
		</div>
	</form>
</div>
@endsection

@section('scripts')
@endsection