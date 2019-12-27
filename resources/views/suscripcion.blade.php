@extends('layouts.tema')

@section('title', 'Suscripción')

@section('header_type', 'gradient')

@section('content')
	<section>
		<div class="block pb-0">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2> Suscribete y publica tus talentos </h2>
						</div>
						<div class="select-user">
							<span id="plan-button" class="active">ELIGE TU PLAN</span>
							<span id="perfil-button" class="span-disabled">DATOS DE REGISTRO</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="registro">
		<div class="block pt-0">
			<div class="container ">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
						</div><!-- Heading -->
						<div class="tab-sec">
							<ul class="nav nav-tabs">
							  <li><a class="current" data-tab="mensual">Mensual</a></li>
							  <li><a data-tab="trimestral">Trimestral</a></li>
							  <li><a data-tab="anual">Anual</a></li>
							</ul>
							<div id="mensual" class="tab-content current pt-4">
								<div class="job-listings-tabs">

									<div class="plans-sec">
										<div class="row">
											@foreach($plans as $plan)
												<div class="col-lg-3">
													<div class="pricetable"> 
														<div class="pricetable-head">
															<h3>{{$plan->name}}</h3>
															<h2>
																@if(is_null($plan->monthly_price))
																	Gratis
																@else
																		<i>$</i>{{$plan->monthly_price}}
																@endif
															</h2>
															<span>1 mes</span>
														</div>
														<ul>
															<li>
																@if(is_null($plan->talents)) Talentos ilimitados
																@else
																	@if($plan->talents != 0) {{$plan->talents}} Talentos
																	@endif
																@endif
															</li>
															<li>
																@if(is_null($plan->photos)) Fotos ilimitadas
																@else
																	@if($plan->photos != 0) {{$plan->photos}} Fotos
																	@endif
																@endif
															</li>
															<li>
																@if(is_null($plan->videos)) Videos ilimitadas
																@else
																	@if($plan->videos != 0) {{$plan->videos}} Videos
																	@endif
																@endif
															</li>
															<li>
																@if(is_null($plan->pdfs)) Pdfs ilimitados ({{$plan->pdf_size}} Mb)
																@else
																	@if($plan->pdfs != 0) {{$plan->pdfs}} Pdfs ({{$plan->pdf_size}} Mb)
																	@endif
																@endif
															</li>
														</ul>
														<a type="button" data-value="{{$plan->id}}" data-plan="mensual" class="btn-submit-plan">
															{{$plan->name}}
														</a>
													</div>
												</div>
											@endforeach
										</div>
									</div>									

								</div>
							</div>
							<div id="trimestral" class="tab-content pt-4">
								<div class="job-listings-tabs">
									<div class="plans-sec">
										<div class="row">
											@foreach($plans as $plan)
												<div class="col-lg-3">
													<div class="pricetable"> 
														<div class="pricetable-head">
															<h3>{{$plan->name}}</h3>
															<h2>
																@if(is_null($plan->quarterly_price))
																	Gratis
																@else
																	<i>$</i>{{$plan->quarterly_price}}
																@endif
															</h2>
															<span>3 meses</span>
														</div>
														<ul>
															<li>
																@if(is_null($plan->talents)) Talentos ilimitados
																@else
																	@if($plan->talents != 0) {{$plan->talents}} Talentos
																	@endif
																@endif
															</li>
															<li>
																@if(is_null($plan->photos)) Fotos ilimitadas
																@else
																	@if($plan->photos != 0) {{$plan->photos}} Fotos
																	@endif
																@endif
															</li>
															<li>
																@if(is_null($plan->videos)) Videos ilimitadas
																@else
																	@if($plan->videos != 0) {{$plan->videos}} Videos
																	@endif
																@endif
															</li>
															<li>
																@if(is_null($plan->pdfs)) Pdfs ilimitados ({{$plan->pdf_size}} Mb)
																@else
																	@if($plan->pdfs != 0) {{$plan->pdfs}} Pdfs ({{$plan->pdf_size}} Mb)
																	@endif
																@endif
															</li>
														</ul>
														<a type="button" data-value="{{$plan->id}}" data-plan="trimestral" class="btn-submit-plan">
															{{$plan->name}}
														</a>
													</div>
												</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
							<div id="anual" class="tab-content pt-4">
								<div class="job-listings-tabs">

									<div class="plans-sec">
										<div class="row">
											@foreach($plans as $plan)
												<div class="col-lg-3">
													<div class="pricetable"> 
														<div class="pricetable-head">
															<h3>{{$plan->name}}</h3>
															<h2>
																@if(is_null($plan->annual_price))
																	Gratis
																@else
																		<i>$</i>{{$plan->annual_price}}
																@endif
															</h2>
															<span>1 año</span>
														</div>
														<ul>
															<li>
																@if(is_null($plan->talents)) Talentos ilimitados
																@else
																	@if($plan->talents != 0) {{$plan->talents}} Talentos
																	@endif
																@endif
															</li>
															<li>
																@if(is_null($plan->photos)) Fotos ilimitadas
																@else
																	@if($plan->photos != 0) {{$plan->photos}} Fotos
																	@endif
																@endif
															</li>
															<li>
																@if(is_null($plan->videos)) Videos ilimitadas
																@else
																	@if($plan->videos != 0) {{$plan->videos}} Videos
																	@endif
																@endif
															</li>
															<li>
																@if(is_null($plan->pdfs)) Pdfs ilimitados ({{$plan->pdf_size}} Mb)
																@else
																	@if($plan->pdfs != 0) {{$plan->pdfs}} Pdfs ({{$plan->pdf_size}} Mb)
																	@endif
																@endif
															</li>
														</ul>
														<a type="button" data-value="{{$plan->id}}" data-plan="anual" class="btn-submit-plan">
															{{$plan->name}}
														</a>
													</div>
												</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!--========================= FIN DE PLANES	-->

	<section id="perfil">
		<div class="block">
			<div class="container">
				<div class="row">
				 	<div class="col-lg-12 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec">
						 		<div class="coverletter-sec">
					 				<h3 id="mensaje_plan" align="center"></h3>
									<div class="extra-login mb-4" >
			                       		<span align="center">Registrate a traves de Facebook o Google </span>
										<div class="login-social">
											<a class="fb-login" href="{{ url('/auth/redirect/facebook') }}" title=""><i class="fa fa-facebook"></i></a>
											<a class="gg-login" href="{{ url('/auth/redirect/google') }}" title=""><i class="fa fa-google"></i></a>
										</div>
									</div>
									
						 			<div class="extra-login mb-4" >
			                       		<span align="center">O tambien completa el formulario con tus datos para registrarte</span>
									</div>
				                    <form method="POST" action="{{ route('register') }}">
				                        @csrf


							 			@if($errors->any())
											<span>por favor revisa los siguientes inconvenientes en el formulario para continuar</span>
							 			@endif

										<input type="hidden" name="plan" id="plan" value="{{old('plan')}}">
										<input type="hidden" name="plan_name" id="plan_name" value="{{old('plan_name')}}">
										<input type="hidden" name="periodo" id="periodo" value="{{old('periodo')}}">
										<div class="row">	
											<div class="col-lg-6">
												<span class="pf-title">Correo Electrónico</span>
												<div class="pf-field">
													<input type="email" name="email" id="email" value="{{old('email')}}" required autofocus />
													@error('email')
			                                    		<span> {{ $message }}</span>
													@enderror
												</div>
											</div>

										
											<div class="col-lg-3">
												<span class="pf-title">Contraseña</span>
												<div class="pf-field">
													<input type="password" name="password" id="password" value="{{old('password')}}" required />
													@error('password')
			                                    		<span> {{ $message }}</span>
													@enderror
												</div>
											</div>

											<div class="col-lg-3">
												<span class="pf-title">Cofirmar contraseña</span>
												<div class="pf-field">
													<input type="password" name="password_confirmation" id="password_confirm" value="{{old('password_confirmation')}}" required />
												</div>
											</div>
										</div>	

										<div class="row">
											<div class="col-lg-4">
												<span class="pf-title">Nombres</span>
												<div class="pf-field">
													<input type="text" name="name" id="name" value="{{old('name')}}" required />
					                                @error('name')
					                                	<span>{{ $message }}</span>
					                                @enderror 
												</div>
											</div>


											<div class="col-lg-4">
												<span class="pf-title">Apellidos</span>
												<div class="pf-field">
													<input type="text" name="lastname" id="lastname" value="{{old('lastname')}}" required />
													@error('lastname')
			                                    		<span> {{ $message }}</span>
													@enderror
												</div>
											</div>

											<div class="col-lg-4">
												<span class="pf-title">Nacionalidad</span>
												<div class="pf-field">
													<input type="text" name="nationality" id="nationality" value="{{old('nationality')}}" required />
													@error('nationality')
			                                    		<span> {{ $message }}</span>
													@enderror
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-4">
												<span class="pf-title">Dirección</span>
												<div class="pf-field">
													<input type="text" name="address" id="address" value="{{old('address')}}" required />
													@error('address')
			                                    		<span> {{ $message }}</span>
													@enderror
												</div>
											</div>

											<div class="col-lg-4">
												<span class="pf-title">Ciudad</span>
												<div class="pf-field">
													<input type="text" name="city" id="city" value="{{old('city')}}" required />
													@error('city')
			                                    		<span> {{ $message }}</span>
													@enderror													
												</div>
											</div>

											<div class="col-lg-4">
												<span class="pf-title">País</span>
												<div class="pf-field">
													<input type="text" name="country" id="country" value="{{old('country')}}" required />
													@error('country')
			                                    		<span> {{ $message }}</span>
													@enderror
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-4">
												<span class="pf-title">Documento de Identidad</span>
												<div class="pf-field">
													<input type="text" name="document" id="document" value="{{old('document')}}" required />
													@error('document')
			                                    		<span> {{ $message }}</span>
													@enderror
												</div>
											</div>

											<div class="col-lg-4">
												<span class="pf-title">Teléfono</span>
												<div class="pf-field">
													<input type="text" name="phone" id="phone" value="{{old('phone')}}" required />
													@error('phone')
			                                    		<span> {{ $message }}</span>
													@enderror
												</div>
											</div>
										</div>


										<div class="row">
											<div class="col-lg-6">
												<span class="pf-title">Describe algunas habilidades adquiridas</span>
												<div class="pf-field">
													<textarea rows="2" name="abilities" id="abilities" required>{{old('abilities')}}</textarea>
												</div>
											</div>
										</div>

										<button type="submit" id="button-reg">
  											Registrar
										</button>

										<!-- {!! Form::button('Registrar', ['class'=>'btn-submit','type'=>'button']) !!} -->

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- ============================= FIN DEL REGISTRO -->

	<section id="talentos" hidden="hidden">
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
								<div class="account-popup-area signup-popup-box static">
									<div class="account-popup">
								<h1> Agrega tus talentos </h1>

								<p id="talentos-disponibles"></p>

									{!! Form::open(['method' =>'post', 'role' => 'form']) !!}
										@csrf

											<div class="pf-field">
												{!! Form::text('title',null,
												[
												'required' => 'required',
												'value' => 'old("title")'
												]) !!}
												<i class="la la-email"></i>
											</div>

					 						<div class="pf-field">
												<select name="industries" id="industries" class="chosen">
													<option value = "">Selecciona una industria</option>
													@foreach($industries as $industry)
														<option value = "{{$industry->id}}">
															{{ $industry->name }}						
														</option>
													@endforeach
												</select>												
												<i class="la la-email"></i>
											</div>

	
					 						<div id="select-cat">
						 						<div class="pf-field">
													<select name="categories" id="categories" class="chosen">
															<option value = "">Primero selecciona una Industria</option>
													</select>
												</div>
											</div>

											<div class="pf-field">
												{!! Form::text('level',null,
												[
												'required' => 'required',
												'value' => 'old("level")'
												]) !!}
											</div>

											<div class="pf-field">
												{!! Form::text('description',null,
												[
												'required' => 'required',
												'value' => 'old("description")'
												]) !!}
												<i class="la la-email"></i>
											</div>

											{!! Form::button('Agregar',['class'=>'btn-submit-talent','type'=>'button']) !!}

									{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

@section('scripts')
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(function() {
		$('#perfil').fadeOut();
		plan = '{{old('plan')}}';
		plan_name = '{{old('plan_name')}}';
		periodo = '{{old('periodo')}}';
		$("#plan").val(plan);
		$("#plan_name").val(plan_name);
		$("#periodo").val(periodo);

		if(plan && plan_name){
			$('#registro').fadeOut('slow', function() {
				$('#plan-button').removeClass('active');
				$('#perfil-button').addClass('active');
				$('#mensaje_plan').html('Has seleccionado el plan '+plan_name+' '+periodo);
				$('#perfil').fadeIn('slow');
			});
		}

		$(".pricetable").mouseover(function(event){
			$(this).addClass("active");
		});
		$(".pricetable").mouseout(function(event){
			$(this).removeClass("active");
		});
	});

	$('.btn-submit-plan').click(function(){
		plan = $(this).data('value');
		plan_name = $(this).text();
		periodo = $(this).data('plan');
		
		$("#plan").val(plan);
		$("#plan_name").val(plan_name);
		$("#periodo").val(periodo);
		$('#perfil-button').removeClass('span-disabled');
		$('#plan-button').removeClass('active');
		$('#perfil-button').addClass('active');

		$('#registro').fadeOut('slow', function() {
			$('#mensaje_plan').html('Has seleccionado el plan '+plan_name+' '+periodo);
			$('#perfil').fadeIn('slow');
		});
	});

	$('#plan-button').click(function(){
		$('#perfil').fadeOut();
		$('#registro').fadeIn();
	});

	$('#perfil-button').click(function(){
		$('#registro').fadeOut();
		$('#perfil').fadeIn();
	});

/*
		$('.btn-facebook').click(function(){
			$.ajax({
				type: 'GET',
				data: {plan : plan},
				url:'/auth/redirect/facebook',
				success:function(data){
					alert('Mensaje: '+data.success+' Usuario:'+data.id_user);
					id_user = data.id_user;
					verificarTalentos(id_user);
					$('#registro').hide();
					$('#talentos').removeAttr('hidden');
				}
			});
		});

		$('.btn-google').click(function(){
			$.ajax({
				type:'GET',
				url:'/auth/redirect/google/'+plan,
				success:function(data){
					alert('Mensaje: '+data.success+' Usuario:'+data.id_user);
					id_user = data.id_user;
					verificarTalentos(id_user);
					$('#registro').hide();
					$('#talentos').removeAttr('hidden');
				}
			});
		});
*/
/*		$('.btn-submit').click(function(e){

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
			var abilities = $("#abilities").val();
			var password_confirmation = $("input[name='password_confirmation']").val();
			var plan = $("input[name='plan']").val();

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
					plan:plan,
					periodo:periodo },
				success:function(data){
					$('#registro').fadeOut();
					$('#talentos').fadeIn();
					$('#talentos').removeAttr('hidden');
					alert('Mensaje: '+data.success+' Usuario:'+data.id_user);
					id_user = data.id_user;
					verificarTalentos(id_user);
				}
			});
		});*/
</script>

@endsection