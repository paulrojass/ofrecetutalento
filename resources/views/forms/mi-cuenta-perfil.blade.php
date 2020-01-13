<div id="d-no-editar" class="border-title"><h3>Editar mi perfil</h3><a id="no-editar" title=""><i class="la la-edit"></i> Cancelar</a></div>
<!-- <div class="edu-history-sec">--> 

	<div class="block pt-0">
		<div class="container">
			<div class="row">
			 	<div class="col-lg-12 column">
			 		<div class="padding-left">
				 		<div class="manage-jobs-sec">
					 		<div class="coverletter-sec">
				 				<h3 id="mensaje_plan" align="center"></h3>
			                    <form method="POST" id="form-actualizar-usuario">
									<h5> Información personal </h5>
			                       

			                       @csrf


						 			@if($errors->any())
										<span>por favor revisa los siguientes inconvenientes en el formulario para continuar</span>
						 			@endif

									<div class="row">	
										<div class="col-lg-6">
											<span class="pf-title">Correo Electrónico<strong class="required">*</strong></span>
											<div class="pf-field">
												<input type="email" name="email" id="email" value="{{Auth::User()->email}}" required autofocus />
												@error('email')
		                                    		<span> {{ $message }}</span>
												@enderror
											</div>
										</div>
									</div>	

									<div class="row">
										<div class="col-lg-4">
											<span class="pf-title">Nombres<strong class="required">*</strong></span>
											<div class="pf-field">
												<input type="text" name="name" id="name" value="{{Auth::User()->name}}" required />
				                                @error('name')
				                                	<span>{{ $message }}</span>
				                                @enderror 
											</div>
										</div>


										<div class="col-lg-4">
											<span class="pf-title">Apellidos<strong class="required">*</strong></span>
											<div class="pf-field">
												<input type="text" name="lastname" id="lastname" value="{{Auth::User()->lastname}}" required />
												@error('lastname')
		                                    		<span> {{ $message }}</span>
												@enderror
											</div>
										</div>

										<div class="col-lg-4">
											<span class="pf-title">Documento de Identidad<strong class="required">*</strong></span>
											<div class="pf-field">
												<input type="text" name="document" id="document" value="{{Auth::User()->document}}" required />
												@error('document')
		                                    		<span> {{ $message }}</span>
												@enderror
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-4">
											<span class="pf-title">Nacionalidad<strong class="required">*</strong></span>
											<div class="pf-field">
												<input type="text" name="nationality" id="nationality" value="{{Auth::User()->nationality}}" required />
												@error('nationality')
		                                    		<span> {{ $message }}</span>
												@enderror
											</div>
										</div>
										<div class="col-lg-8">
											<span class="pf-title">Dirección<strong class="required">*</strong></span>
											<div class="pf-field">
												<input type="text" name="address" id="address" value="{{Auth::User()->address}}" required />
												@error('address')
		                                    		<span> {{ $message }}</span>
												@enderror
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-4">
											<span class="pf-title">Teléfono<strong class="required">*</strong></span>
											<div class="pf-field">
												<input type="text" name="phone" id="phone" value="{{Auth::User()->phone}}" required />
												@error('phone')
		                                    		<span> {{ $message }}</span>
												@enderror
											</div>
										</div>
										<div class="col-lg-4">
											<span class="pf-title">Ciudad<strong class="required">*</strong></span>
											<div class="pf-field">
												<input type="text" name="city" id="city" value="{{Auth::User()->city}}" required />
												@error('city')
		                                    		<span> {{ $message }}</span>
												@enderror													
											</div>
										</div>

										<div class="col-lg-4">
											<span class="pf-title">País<strong class="required">*</strong></span>
											<div class="pf-field">
												<input type="text" name="country" id="country" value="{{Auth::User()->country}}" required />
												@error('country')
		                                    		<span> {{ $message }}</span>
												@enderror
											</div>
										</div>


									</div>


									<div class="row">
										<div class="col-lg-6">
											<span class="pf-title">Describe algunas habilidades adquiridas <strong class="required">*</strong></span>
											<div class="pf-field">
												<textarea rows="2" name="abilities" id="abilities" required>{{Auth::User()->abilities}}</textarea>
											</div>
										</div>
									</div>



									<h5 class="mt-5"> Experiencia Laboral </h5>
									<div class="row">
										<div class="col-lg-4 mt-5">
											<p class="mt-3">Experiencia 1:</p>
										</div>
										<div class="col-lg-4">
											<span class="pf-title">Compañia</span>
											<div class="pf-field">
												<input type="text" name="company1" id="company1" value="{{Auth::User()->experiences->company1}}" />
											</div>
										</div>
										<div class="col-lg-4">
											<span class="pf-title">Cargo</span>
											<div class="pf-field">
												<input type="text" name="position1" id="position1" value="{{Auth::User()->experiences->position1}}" />
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-4">
											<span class="pf-title">Fecha de entrada</span>
											<div class="pf-field">
												<input type="text" name="start_date1" id="start_date1" value="{{Auth::User()->experiences->start_date1}}" class="form-control datepicker" />
											</div>
										</div>
										<div class="col-lg-4">
											<span class="pf-title">Fecha de salida</span>
											<div class="pf-field">
												<input type="text" name="due_date1" id="due_date1" value="{{Auth::User()->experiences->due_date1}}" class="form-control datepicker" />
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12">
											<span class="pf-title">Logros alcanzados</span>
											<div class="pf-field">
												<input type="text" name="achievements1" id="achievements1" value="{{Auth::User()->experiences->achievements1}}" />
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-4 mt-5">
											<p class="mt-3">Experiencia 2:</p>
										</div>
										<div class="col-lg-4">
											<span class="pf-title">Compañia</span>
											<div class="pf-field">
												<input type="text" name="company2" id="company2" value="{{Auth::User()->experiences->company2}}" />
											</div>
										</div>
										<div class="col-lg-4">
											<span class="pf-title">Cargo</span>
											<div class="pf-field">
												<input type="text" name="position2" id="position2" value="{{Auth::User()->experiences->position2}}" />
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-4">
											<span class="pf-title">Fecha de entrada</span>
											<div class="pf-field">
												<input type="text" name="start_date2" id="start_date2" value="{{Auth::User()->experiences->start_date2}}" class="form-control datepicker" />
											</div>
										</div>
										<div class="col-lg-4">
											<span class="pf-title">Fecha de salida</span>
											<div class="pf-field">
												<input type="text" name="due_date2" id="due_date2" value="{{Auth::User()->experiences->due_date2}}" class="form-control datepicker" />
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12">
											<span class="pf-title">Logros alcanzados</span>
											<div class="pf-field">
												<input type="text" name="achievements2" id="achievements2" value="{{Auth::User()->experiences->achievements2}}" />
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-lg-4 mt-5">
											<p class="mt-3">Experiencia 3:</p>
										</div>
										<div class="col-lg-4">
											<span class="pf-title">Compañia</span>
											<div class="pf-field">
												<input type="text" name="company3" id="company3" value="{{Auth::User()->experiences->company3}}" />
											</div>
										</div>
										<div class="col-lg-4">
											<span class="pf-title">Cargo</span>
											<div class="pf-field">
												<input type="text" name="position3" id="position3" value="{{Auth::User()->experiences->position3}}" />
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-4">
											<span class="pf-title">Fecha de entrada</span>
											<div class="pf-field">
												<input type="text" name="start_date3" id="start_date3" value="{{Auth::User()->experiences->start_date3}}" class="form-control datepicker" />
											</div>
										</div>
										<div class="col-lg-4">
											<span class="pf-title">Fecha de salida</span>
											<div class="pf-field">
												<input type="text" name="due_date3" id="due_date3" value="{{Auth::User()->experiences->due_date3}}" class="form-control datepicker" />
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12">
											<span class="pf-title">Logros alcanzados</span>
											<div class="pf-field">
												<input type="text" name="achievements3" id="achievements3" value="{{Auth::User()->experiences->achievements3}}" />
											</div>
										</div>
									</div>


									<button type="submit" id="button-registro">
											Actualizar
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



<!-- </div>
 -->