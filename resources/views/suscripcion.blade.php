@extends('layouts.tema')

@section('title', 'Suscripción')

@section('header_type', 'gradient')

@section('content')
<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2">
                        <div class="inner-title2">
                            <h3>Pricing</h3>
                            <span>Keep up to date with the latest news</span>
                        </div>
                        <div class="page-breacrumbs">
                            <ul class="breadcrumbs">
                                <li><a href="#" title="">Home</a></li>
                                <li><a href="#" title="">Pages</a></li>
                                <li><a href="#" title="">Pricing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Buy Our Plans And Packeges</h2>
							<span>One of our jobs has some kind of flexibility option - such as telecommuting, a part-time schedule or a flexible or flextime schedule.</span>
						</div><!-- Heading -->
						<div class="plans-sec">
							<div class="row">
                                @foreach($plans as $plan)
                                    @if($plan->id > 0)
                                    <div class="col-lg-3">
                                        <div class="pricetable">
                                            <div class="pricetable-head">
                                                <h3>{{$plan->name}}</h3>
                                                <h2>
                                                    @if($plan->monthly_price)
                                                        <i>$</i>{{$plan->monthly_price}}
                                                    @else
                                                        Gratis
                                                    @endif
                                                </h2>
                                                <span>1 mes</span>
                                            </div>
                                            <ul>
                                                <li>
                                                    @if($plan->talents != 0) {{$plan->talents}} Talentos
                                                    @else Talentos ilimitados
                                                    @endif
                                                </li>
                                                <li>
                                                    @if($plan->photos != 0) {{$plan->photos}} Fotos
                                                    @else Fotos ilimitadas
                                                    @endif
                                                </li>
                                                <li>
                                                    @if($plan->videos != 0) {{$plan->videos}} Videos
                                                    @else Videos ilimitados
                                                    @endif
                                                </li>
                                                <li>
                                                    @if($plan->videos != 0) {{$plan->pdfs}} Pdf ({{$plan->pdf_size}} Mb)
                                                    @else Pdfs ilimitados ({{$plan->pdf_size}} Mb)
                                                    @endif
                                                </li>
                                            </ul>
                                            <a href="#" title="">OBTENLO</a>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<!--Registro de Usuario-->
    <section>
		<div class="block remove-bottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="account-popup-area signup-popup-box static">
							<div class="account-popup">
								<h3>Sign Up</h3>
								<span>Lorem ipsum dolor sit amet consectetur adipiscing elit odio duis risus at lobortis ullamcorper</span>

                                {!! Form::open(['route'=>'postres.store', 'method'=>'STORE', 'files' => true, 'role' => 'form']) !!}
                                    {!! Form::label('nombre', 'Nombre:', array('class' => 'negrita')) !!}
                                    {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Torta de Chocolate', 'required' => 'required']) !!}
                                
                                    {!! Form::label('precio', 'Precio:', array('class' => 'subrayado')) !!} 
                                    {!! Form::text('precio',null,['class'=>'form-control', 'placeholder'=>'4.50', 'required' => 'required']) !!}
                                
                                    <br>
                                    {!! Form::label('path', 'Selecciona una imagen:', array('class' => 'negrita')) !!}                          
                                    {!! Form::file('imagen',null, array('required' => 'true')) !!}
                                    <br>
                                    {!! Form::label('descripcion', 'Descripción:', array('class' => 'negrita')) !!}
                                    <br>
                                    {{ Form::textarea('descripcion', null, ['placeholder'=>'Ingresa una descripción acá...', 'required' => 'required']) }}
                                {!! Form::close() !!}





								<form>
                                @csrf
                                    <div class="cfield">
                                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombres" />
                                            <i class="la la-user"></i>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="cfield">
                                        <input id="lastname" type="text" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" placeholder="Apellidos">
                                            <i class="la la-user"></i>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

									<div class="cfield">
										<input type="text" placeholder="Username" />
										<i class="la la-user"></i>
									</div>
									<div class="cfield">
										<input type="password" placeholder="********" />
										<i class="la la-key"></i>
									</div>
									<div class="cfield">
										<input type="text" placeholder="Email" />
										<i class="la la-envelope-o"></i>
									</div>
									<div class="dropdown-field">
										<select data-placeholder="Please Select Specialism" class="chosen">
											<option>Web Development</option>
											<option>Web Designing</option>
											<option>Art & Culture</option>
											<option>Reading & Writing</option>
										</select>
									</div>
									<div class="cfield">
										<input type="text" placeholder="Phone Number" />
										<i class="la la-phone"></i>
									</div>
									<button type="submit">Signup</button>
								</form>
								<div class="extra-login">
									<span>Or</span>
									<div class="login-social">
										<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
										<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
									</div>
								</div>
							</div>
						</div><!-- SIGNUP POPUP -->
					</div>
				</div>
			</div>
		</div>
	</section>
<!--Fin del registro de usuario -->
@endsection