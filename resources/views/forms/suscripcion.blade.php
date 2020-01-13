<div class="block">
	<div class="container">
		<div class="row">
		 	<div class="col-lg-12 column">
		 		<div class="padding-left">
			 		<div class="manage-jobs-sec">
			 			<h3 id="mensaje_plan"></h3>
				 		<div class="coverletter-sec">

							{!! Form::open(['method' =>'post', 'route'=> 'register', 'role' => 'form']) !!}
								@csrf
								<p>Completa el formulario con tus datos para registrarte<p>
								<div class="row">	
									<div class="col-lg-6">
										<span class="pf-title">Correo Electrónico</span>
										<div class="pf-field">
											<input type="email" name="email" id="email" value="{{old('email')}}" required />
											<!--@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror -->

											@if ($errors->has('email'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
											
											@endif 
										</div>
									</div>

								
									<div class="col-lg-3">
										<span class="pf-title">Contraseña</span>
										<div class="pf-field">
											<input type="password" name="password" id="password" value="{{old('password')}}" required />
										</div>
									</div>
									@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror

									<div class="col-lg-3">
										<span class="pf-title">Cofirmar contraseña</span>
										<div class="pf-field">
											<input type="password" name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}" required />
										</div>
									</div>
								</div>	

								<div class="row">
									<div class="col-lg-4">
										<span class="pf-title">Nombres</span>
										<div class="pf-field">
											<input type="text" name="name" id="name" value="{{old('name')}}" required />
			                                @error('name')
			                                    {{ $message }}
			                                @enderror
			                                @if ($errors->has('email'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
											@endif 
										</div>
									</div>


									<div class="col-lg-4">
										<span class="pf-title">Apellidos</span>
										<div class="pf-field">
											<input type="text" name="lastname" id="lastname" value="{{old('lastname')}}" required />
										</div>
									</div>

									<div class="col-lg-4">
										<span class="pf-title">Nacionalidad</span>
										<div class="pf-field">
											<input type="text" name="nationality" id="nationality" value="{{old('nationality')}}" required />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-4">
										<span class="pf-title">Dirección</span>
										<div class="pf-field">
											<input type="text" name="address" id="address" value="{{old('address')}}" required />
										</div>
									</div>

									<div class="col-lg-4">
										<span class="pf-title">Ciudad</span>
										<div class="pf-field">
											<input type="text" name="city" id="city" value="{{old('city')}}" required />
										</div>
									</div>

									<div class="col-lg-4">
										<span class="pf-title">País</span>
										<div class="pf-field">
											<input type="text" name="country" id="country" value="{{old('country')}}" required />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-4">
										<span class="pf-title">Documento de Identidad</span>
										<div class="pf-field">
											<input type="text" name="document" id="document" value="{{old('document')}}" required />
										</div>
									</div>

									<div class="col-lg-4">
										<span class="pf-title">Teléfono</span>
										<div class="pf-field">
											<input type="text" name="phone" id="phone" value="{{old('phone')}}" required />
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-lg-6">
										<span class="pf-title">Describe algunas habilidades adquiridas</span>
										<div class="pf-field">
											<textarea rows="2" name="abilities" id="abilities" value="{{old('abilities')}}" required></textarea>
										</div>
									</div>
								</div>

								<button type="button" class="btn-submit">
									<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
										<span class="sr-only">Loading...</span>
										Registrar
								</button>

								<!-- {!! Form::button('Registrar', ['class'=>'btn-submit','type'=>'button']) !!} -->

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>