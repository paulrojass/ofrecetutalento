<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>@yield('section')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/bootstrap-grid.css')}}" />
	<link rel="stylesheet" href="{{URL::asset('tema/css/icons.css')}}">
	<link rel="stylesheet" href="{{URL::asset('tema/css/animate.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/style.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/responsive.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/chosen.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/colors/colors.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/bootstrap.css')}}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<!-- 	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css"> -->
	
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilos.css')}}" />
</head>
<body>

<div class="page-loading">
	<img src="{{URL::asset('tema/images/loader.gif')}}" alt="" />
</div>

<div class="theme-layout" id="scrollup">
	<div class="responsive-header three">
		<div class="responsive-menubar">
			<div class="res-logo"><a href="{{url('/')}}" title=""><img src="{{URL::asset('tema/images/logo.png')}}" alt="" /></a></div>
			<div class="menu-resaction">
				<div class="res-openmenu">
					<img src="{{URL::asset('tema/images/icon5.png')}}" alt="" /> Menu
				</div>
				<div class="res-closemenu">
					<img src="{{URL::asset('tema/images/icon6.png')}}" alt="" /> Close
				</div>
			</div>
		</div>
		<div class="responsive-opensec">
			<div class="btn-extars">
				<a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Ofrece Talento</a>
				<ul class="account-btns">
					<li><a href="{{url('suscripcion')}}" title=""><i class="la la-key"></i> Registrar</a></li>
					<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Iniciar Seccion</a></li>
				</ul>
			</div><!-- Btn Extras -->
			<form class="res-search">
				<input type="text" placeholder="Job title, keywords or company name" />
				<button type="submit"><i class="la la-search"></i></button>
			</form>
			<div class="responsivemenu">
				<ul>
					<li class="menu-item-has-children">
						<a href="#" title="">Home</a>

					</li>
					<li class="menu-item-has-children">
						<a href="#" title="">Como funciona</a>

					</li>
					<li class="menu-item-has-children">
						<a href="#" title="">¿Quienes somos?</a>

					</li>
					<li class="menu-item-has-children">
						<a href="#" title="">Planes</a>

					</li>
				</ul>
			</div>
		</div>

	</div>
	
	<header class="@yield('header_type')">
		<div class="menu-sec">
			<div class="container">
				<div class="logo">
					<a href="{{url('/')}}" title=""><img src="{{URL::asset('tema/images/logo.png')}}" alt="" /></a>
				</div><!-- Logo -->
				<div class="btn-extars">
					<a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Ofrece Talento</a>
					<ul class="account-btns">
						<li class="signup-popup"><a href="{{url('suscripcion')}}" title=""><i class="la la-key"></i> Registrar</a></li>
						<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Iniciar Sección</a></li>
					</ul>
				</div><!-- Btn Extras -->
				<nav>
					<ul>
						<li class="menu-item-has-children">
							<a href="{{url('/')}}" title="">Home</a>
							
						</li>
						<li class="menu-item-has-children">
							<a href="#" title="">Como funciona</a>
							
						</li>
						<li class="menu-item-has-children">
							<a href="#" title="">¿Quienes somos?</a>
							
						</li>
						<li class="menu-item-has-children">
							<a href="#" title="">Planes</a>
							
						</li>
						
						
					</ul>
				</nav><!-- Menus -->
			</div>
		</div>
	</header>

	@yield('content')

	<footer>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 column">
						<div class="widget">
							<div class="about_widget">
								<div class="logo">
									<a href="#" title=""><img src="http://placehold.it/178x40" alt="" /></a>
								</div>
								<span>Collin Street West, Victor 8007, Australia.</span>
								<span>+1 246-345-0695</span>
								<span>info@jobhunt.com</span>
								<div class="social">
									<a href="#" title=""><i class="fa fa-facebook"></i></a>
									<a href="#" title=""><i class="fa fa-twitter"></i></a>
									<a href="#" title=""><i class="fa fa-linkedin"></i></a>
									<a href="#" title=""><i class="fa fa-pinterest"></i></a>
									<a href="#" title=""><i class="fa fa-behance"></i></a>
								</div>
							</div><!-- About Widget -->
						</div>
					</div>
					<div class="col-lg-4 column">
						<div class="widget">
							<h3 class="footer-title">Frequently Asked Questions</h3>
							<div class="link_widgets">
								<div class="row">
									<div class="col-lg-6">
										<a href="#" title="">Privacy & Seurty </a>
										<a href="#" title="">Terms of Serice</a>
										<a href="#" title="">Communications </a>
										<a href="#" title="">Referral Terms </a>
										<a href="#" title="">Lending Licnses </a>
										<a href="#" title="">Disclaimers </a>	
									</div>
									<div class="col-lg-6">
										<a href="#" title="">Support </a>
										<a href="#" title="">How It Works </a>
										<a href="#" title="">For Employers </a>
										<a href="#" title="">Underwriting </a>
										<a href="#" title="">Contact Us</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 column">
						<div class="widget">
							<h3 class="footer-title">Find Jobs</h3>
							<div class="link_widgets">
								<div class="row">
									<div class="col-lg-12">
										<a href="#" title="">US Jobs</a>	
										<a href="#" title="">Canada Jobs</a>	
										<a href="#" title="">UK Jobs</a>	
										<a href="#" title="">Emplois en Fnce</a>	
										<a href="#" title="">Jobs in Deuts</a>	
										<a href="#" title="">Vacatures China</a>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 column">
						<div class="widget">
							<div class="download_widget">
								<a href="#" title=""><img src="http://placehold.it/230x65" alt="" /></a>
								<a href="#" title=""><img src="http://placehold.it/230x65" alt="" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-line">
			<span>© 2018 Jobhunt All rights reserved. Design by Creative Layers</span>
			<a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
		</div>
	</footer>

</div>

<div class="account-popup-area signin-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>Inicio de Sesión</h3>
		<span>Click To Login With Demo User</span>
		<form method="POST" action="{{ route('login') }}">
            @csrf
			<div class="cfield">
				<input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" />
				<i class="la la-user"></i>
			</div>
			@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror

			<div class="cfield">
                <input id="password" placeholder="********" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">


				<i class="la la-key"></i>
			</div>
			@error('password')
			    <span class="invalid-feedback" role="alert">
			        <strong>{{ $message }}</strong>
			    </span>
			@enderror







			<p class="remember-label">
				<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
				<label for="remember">{{ __('Remember Me') }}</label>
			</p>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
			<button type="submit">Login</button>
		</form>
		<div class="extra-login">
			<span>Or</span>
			<div class="login-social">
				<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
				<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
			</div>
		</div>
	</div>
</div><!-- LOGIN POPUP -->

<script src="{{URL::asset('tema/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/modernizr.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/script.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/wow.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/slick.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/parallax.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/select-chosen.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/counter.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/mouse.js')}}" type="text/javascript"></script>
@yield('scripts')

</html></body>

