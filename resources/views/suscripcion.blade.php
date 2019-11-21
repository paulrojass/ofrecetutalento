@extends('layouts.app')

@section('title', 'Suscripción')

@section('header_type', 'gradient')

@section('content')


<div id="registro">

	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="plan-tab" data-toggle="tab" href="#plan" role="tab" aria-controls="plan" aria-selected="true">Selecciona tu Plan</a>
		</li>
		<li class="nav-item">
			<a class="nav-link disabled" id="perfil-tab" data-toggle="tab" href="#perfil" role="tab" aria-controls="perfil" aria-selected="false">Datos de Registro</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="plan" role="tabpanel" aria-labelledby="plan-tab">
			@foreach($plans as $plan)
			{!! Form::button($plan->name,['class'=>'btn-submit-plan', 'value' => $plan->id, 'type'=>'button']) !!}
			<br>
			@endforeach
		</div>
		<div class="tab-pane fade" id="perfil" role="tabpanel" aria-labelledby="perfil-tab">
		{!! Form::open(['method' =>'post', 'route'=> 'register', 'role' => 'form']) !!}
			@csrf

			<p id="mensaje_plan"><p>

			{!! Form::email('email',null,
			[
			'placeholder'=>'Correo electrónico',
			'required' => 'required',
			'value' => 'old("email")'
			]) !!}<br>

			{!! Form::password('password',
			[
			'placeholder' => 'Contraseña',
			'required' => 'required',
			'value' => old("password")
			]) !!}<br>

			{!! Form::password('password_confirmation',
			[
			'placeholder' => 'Confirmar Contraseña',
			'required' => 'required',
			'value' => old("password_confirmation")
			]) !!}<br>

			{!! Form::text('name',null,
			[
			'placeholder'=>'Nombres',
			'required' => 'required',
			'value' => 'old("name")'
			]) !!}<br>

			{!! Form::text('lastname',null,
			[
			'placeholder'=>'Apellidos',
			'required' => 'required',
			'value' => 'old("lastname")'
			]) !!}<br>

			{!! Form::text('nationality',null,
			[
			'placeholder'=>'Nacionalidad',
			'required' => 'required',
			'value' => 'old("nationality")'
			]) !!}<br>

			{!! Form::text('address',null,
			[
			'placeholder'=>'Dirección',
			'required' => 'required',
			'value' => 'old("address")'
			]) !!}<br>

			{!! Form::text('city',null,
			[
			'placeholder'=>'Ciudad',
			'required' => 'required',
			'value' => 'old("city")'
			]) !!}<br>

			{!! Form::text('country',null,
			[
			'placeholder'=>'País',
			'required' => 'required',
			'value' => 'old("country")'
			]) !!}<br>

			{!! Form::text('document',null,
			[
			'placeholder'=>'Documento',
			'required' => 'required',
			'value' => 'old("document")'
			]) !!}<br>

			{!! Form::text('phone',null,
			[
			'placeholder'=> 'Teléfono',
			'required' => 'required',
			'value' => 'old("phone")'
			]) !!}<br>


			{!! Form::text('abilities',null,
			[
			'placeholder'=>'Habilidades',
			'required' => 'required',
			'value' => 'old("abilities")'
			]) !!}<br>

			{!! Form::button('Registrar',['class'=>'btn-submit','type'=>'button']) !!}
		</div>
	</div>

	{!! Form::close() !!}

</div>

<div id="talentos" hidden>
	<h1> Agrega tus talentos </h1>

	<p id="talentos-disponibles"></p>

	<div id = "nuevo-talento">
		{!! Form::open(['method' =>'post', 'role' => 'form']) !!}
			@csrf
			{!! Form::text('title',null,
			[
			'placeholder'=>'Talento',
			'required' => 'required',
			'value' => 'old("title")'
			]) !!}<br>

			{!! Form::text('industry',null,
			[
			'placeholder'=>'Industria',
			'required' => 'required',
			'value' => 'old("industry")'
			]) !!}<br>

			{!! Form::text('category',null,
			[
			'placeholder'=>'Categoria',
			'required' => 'required',
			'value' => 'old("category")'
			]) !!}<br>

			{!! Form::text('level',null,
			[
			'placeholder'=>'Nivel',
			'required' => 'required',
			'value' => 'old("level")'
			]) !!}<br>


			{!! Form::text('description',null,
			[
			'placeholder'=>'Descripción',
			'required' => 'required',
			'value' => 'old("description")'
			]) !!}<br>

			{!! Form::button('Agregar',['class'=>'btn-submit-talent','type'=>'button']) !!}

		{!! Form::close() !!}
	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(function() {

		$('.btn-submit-plan').click(function(){
			plan = $(this).val();
			plan_name = $(this).text();
			$('#perfil-tab').removeClass('disabled')
			$('#mensaje_plan').html('Has seleccionado el plan '+plan_name);	
			$('.nav-tabs a[href="#perfil"]').tab('show');
		});

		$('.btn-submit').click(function(e){

			e.preventDefault();

			var _token = $("input[name='_token']").val();
			var name = $("input[name='name']").val();
			var lastname = $("input[name='lastname']").val();
			var email = $("input[name='email']").val();
			var nationality = $("input[name='nationality']").val();
			var address = $("input[name='address']").val();
			var city = $("input[name='city']").val();
			var country = $("input[name='country']").val();
			var documento = $("input[name='document']").val();
			var password = $("input[name='password']").val();
			var phone = $("input[name='phone']").val();
			var abilities = $("input[name='abilities']").val();
			var password_confirmation = $("input[name='password_confirmation']").val();

			$.ajax({
				type:'POST',
				url:'register',
				data:{
					name:name,
					lastname:lastname,
					email:email,
					nationality:nationality,
					password:password,
					password_confirmation:password_confirmation,
					address:address,
					city:city,
					country:country,
					document:documento,
					phone:phone, abilities:abilities,
					_token:_token,
					plan:plan },
				success:function(data){
					alert('Mensaje: '+data.success+' Usuario:'+data.id_user);
					id_user = data.id_user;
					verificarTalentos(id_user);
					$('#registro').hide();
					$('#talentos').removeAttr('hidden');
				}
			});
		});

		$('.btn-submit-talent').click(function(){
			var _token = $("input[name='_token']").val();
			var title = $("input[name='title']").val();
			var category = $("input[name='category']").val();
			var level = $("input[name='level']").val();
			var description = $("input[name='description']").val();
			$.ajax({
				type:'POST',
				url:'guardar_talento',
				data:{
					id_user: id_user,
					title:title,
					category:category,
					level:level,
					description:description,
					_token:_token},
				success:function(data){
					verificarTalentos(id_user);
					$("input[name='title']").val('');
					$("input[name='industry']").val('');
					$("input[name='category']").val('');
					$("input[name='level']").val('');
					$("input[name='description']").val('');
				}
			});
		});
	});

	function verificarTalentos(id_user){
		var _token = $("input[name='_token']").val();
		$.ajax({
			type: 'POST',
			url:'verificar_talentos',
			data:{user_id : id_user, _token:_token},
			success:function(data){
				if(data.disponibles > 0){
					$('#talentos-agregados').html('Tienes '+data.agregados+' talentos agregados');
					$('#talentos-disponibles').html('Tienes '+data.disponibles+' talentos disponibles');
				}else{
					$('#nuevo-talento').html('<p> Ya no tiene talentos disponibles </p>');
				}
			}
		});
	}
</script>

@endsection