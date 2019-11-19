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

                                {!! Form::open(['method'=>'STORE', 'files' => true, 'role' => 'form']) !!}
                                    <div class="cfield">
                                        {!! Form::text('name',null,
                                        [
                                        'placeholder'=>'Nombres',
                                        'required' => 'required',
                                        'value' => 'old("name")'
                                        ]) !!}<i class="la la-user"></i>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="cfield">
                                        {!! Form::text('lastname',null,
                                        [
                                        'placeholder'=>'Apellidos',
                                        'required' => 'required',
                                        'value' => 'old("lastname")',

                                        ]) !!}<i class="la la-user"></i>
                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="cfield">
                                        {!! Form::text('nationality',null,
                                        [
                                        'placeholder'=>'Nacionalidad',
                                        'required' => 'required',
                                        'value' => 'old("nationality")',

                                        ]) !!}<i class="la la-globe"></i>
                                        @error('nationality')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="cfield">
                                        {!! Form::text('address',null,
                                        [
                                        'placeholder'=>'Dirección',
                                        'required' => 'required',
                                        'value' => 'old("address")'
                                        ]) !!}<i class="la la-map-marker"></i>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="cfield">
                                        {!! Form::text('city',null,
                                        [
                                        'placeholder'=>'Ciudad',
                                        'required' => 'required',
                                        'value' => 'old("city")'
                                        ]) !!}<i class="la la-map-marker"></i>
                                        @error('city')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="cfield">
                                        {!! Form::text('country',null,
                                        [
                                        'placeholder'=>'País',
                                        'required' => 'required',
                                        'value' => 'old("country")'
                                        ]) !!}<i class="la la-map-marker"></i>
                                        @error('country')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="cfield">
                                        {!! Form::text('document',null,
                                        [
                                        'placeholder'=>'Documento',
                                        'required' => 'required',
                                        'value' => 'old("document")'
                                        ]) !!}<i class="la la-map-marker"></i>
                                        @error('document')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="cfield">
                                        {!! Form::text('email',null,
                                        [
                                        'placeholder'=>'Correo electrónico',
                                        'required' => 'required',
                                        'value' => 'old("email")'
                                        ]) !!}<i class="la la-map-marker"></i>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="cfield">
                                        {!! Form::text('phone',null,
                                        [
                                        'placeholder'=> 'Teléfono',
                                        'required' => 'required',
                                        'value' => 'old("phone")'
                                        ]) !!}<i class="la la-map-marker"></i>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="cfield">
                                        {!! Form::text('abilities',null,
                                        [
                                        'placeholder'=>'Habilidades',
                                        'required' => 'required',
                                        'value' => 'old("abilities")'
                                        ]) !!}<i class="la la-map-marker"></i>
                                        @error('abilities')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                {!! Form::close() !!}
								<form>
                                @csrf
                                   
                                        <input id="name" type="text" name="name" value="" required autocomplete="name" placeholder="Nombres" />
                                            


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