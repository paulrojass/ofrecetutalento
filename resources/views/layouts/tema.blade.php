<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>@yield('title') | Ofrece tu Talento</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{URL::asset('favicon.ico')}}">

	<!-- Styles -->
	<!-- <link rel="stylesheet" type="text/css" href="{{URL::asset('css/app.css')}}" /> -->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/bootstrap-grid.css')}}" />
	<link rel="stylesheet" href="{{URL::asset('tema/css/icons.css')}}">
	<link rel="stylesheet" href="{{URL::asset('tema/css/animate.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/style.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/responsive.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/chosen.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/colors/colors.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/bootstrap.css')}}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

	{{--
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/tooltip/normalize.css') }}" />
	 <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/tooltip/demo.css') }}" /> 
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/tooltip/tooltip-classic.css') }}" />--}}



	@yield('css')
	
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilos.css')}}" />

</head>
<body>

<div class="page-loading">
	<img src="{{URL::asset('tema/images/loader.gif')}}" alt="" />
</div>
<div class="theme-layout" id="scrollup">

	<!-- Menu RESPONSIVE -->
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
			@if(Auth::User())
				<div class="my-profiles-sec mt-4">
					<span><img src="{{URL::asset('images/users/'.Auth::User()->avatar)}}" alt="" style="max-width: 50px; max-height:50px" /> {{Auth::User()->name}} {{Auth::User()->lastname}} <i class="la la-bars"></i></span>
				</div>
			@else
			<div class="btn-extars">
				<!-- <a href="{{url('suscripcion')}}" title="" class="post-job-btn"><i class="la la-plus"></i>Ofrece Talento</a> -->
				<ul class="account-btns">
					<!-- <li><a href="{{url('suscripcion')}}" title=""><i class="la la-key"></i> Registrarse</a></li> -->
					<li class="signup-popup"><a title=""><i class="la la-key"></i> Registrarse</a></li>
					<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Iniciar Sesión</a></li>
				</ul>
			</div><!-- Btn Extras -->
			@endif
			<!-- 			<form class="res-search">
				<input type="text" placeholder="Job title, keywords or company name" />
				<button type="submit"><i class="la la-search"></i></button>
			</form> -->
			<div class="responsivemenu">
				<ul>
					<li class="menu-item">
						<a href="{{url('/')}}" title="">Home</a>
					</li>
					<li class="menu-item">
						<a href="{{url('talentos')}}" title="">Busca tu Talento</a>
					</li>
					<li class="menu-item">
						<a href="{{url('canjes')}}" title="">Canjea tu talento</a>
					</li>
					<li class="menu-item">
						<a href="{{url('como_funciona')}}" title="">Como funciona</a>
					</li>
					<li class="menu-item">
						<a href="{{url('para-que-funciona')}}" title="">¿Para qué funciona?</a>
					</li>
					<li class="menu-item">
						<a href="{{url('quienes_somos')}}" title="">¿Quienes somos?</a>
					</li>
					<li class="menu-item">
						<a href="{{url('planes')}}" title="">Planes</a>
					</li>
				</ul>
			</div>
		</div>

	</div>
	


	<!-- Menu Pantallas PC -->	
	<header class="@yield('header_type')">
		<div class="menu-sec">
			<div class="container">
				<div class="logo">
					<a href="{{url('/')}}" title=""><img src="{{URL::asset('tema/images/logo.png')}}" alt="" /></a>
				</div><!-- Logo -->
				@if(Auth::User())
					@if(!View::hasSection('no-user-link'))
					<div class="my-profiles-sec">
						<span>
							<img src="{{URL::asset('images/users/'.Auth::User()->avatar)}}" alt="" style="max-width: 50px; max-height: 50px;" />
								{{Auth::User()->name}} {{Auth::User()->lastname}}
							<i class="la la-bars"></i>
						</span>
					</div>
					@endif

					@if(auth()->user()->suscription->plan_id > 2)
						@if(!View::hasSection('messages'))
						<div id="contador-mensajes"></div>

						<div id="contador-tratos"></div>
						@endif

					@endif
				@else
				<div class="btn-extars">
					<!-- <a href="{{url('suscripcion')}}" title="" class="post-job-btn"><i class="la la-plus"></i>Ofrece Talento</a> -->
					<ul class="account-btns">
						<!-- <li class="signin-popup"><a href="{{url('suscripcion')}}" title=""><i class="la la-key"></i> Registrarse</a></li> -->
						<li class="signup-popup"><a title=""><i class="la la-key"></i> Registrarse</a></li>

						<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Iniciar Sesión</a></li>
					</ul>
				</div><!-- Btn Extras -->
				@endif
				<nav>
					<ul>
						<li class="menu-item">
							<a href="{{url('/')}}" title="">Home</a>
							
						</li>
						<li class="menu-item">
							<a href="{{url('talentos')}}" title="">Busca tu talento</a>
						</li>
						<li class="menu-item">
							<a href="{{url('canjes')}}" title="">Canjea tu talento</a>
						</li>
						<li class="menu-item-has-children">
							<a href="javascript:void(0)" title="">Acerca de</a>
							<ul>
								<li>
									<a href="{{url('como_funciona')}}"title="">Como funciona</a>
								</li>
								<li>
									<a href="{{url('para_que_funciona')}}"title="">¿Para qué funciona?</a>
								</li>
								<li>
									<a href="{{url('quienes_somos')}}" title="">¿Quienes somos?</a>
								</li>
								<li>
									<a href="{{url('planes')}}" title="">Planes</a>
									
								</li>
							</ul>
						</li>
					</ul>
				</nav><!-- Menus -->
			</div>
		</div>
	</header>

	@yield('content')

	@yield('footer')

</div>
@if(Auth::User())
<div class="profile-sidebar">
	<span class="close-profile"><i class="la la-arrow-right"></i></span>
	<div class="can-detail-s">
		<div class="cst"><img src="{{URL::asset('images/users/'.Auth::User()->avatar)}}" alt="" style="max-width: 145px; max-height:145px;" /></div>
		<h3>{{auth()->user()->name}} {{auth()->user()->lastname}}</h3>
		<span><i>Talento {{auth()->user()->suscription->plan->name}}</i></span>
		<p>{{ auth()->user()->email }}</p>
		<p>Miembro desde, {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('Y')}} </p>
		<p><i class="la la-map-marker"></i>{{ auth()->user()->city }}, {{ auth()->user()->country }}</p>
	</div>
	<div class="tree_widget-sec">
		<ul>
			<li><a href="{{url('mi-cuenta')}}" title=""><i class="la la-user"></i>Mi cuenta</a></li>
			<!-- <li><a href="{{url('mi-cuenta')}}" title=""><i class="la la-briefcase"></i>My Resume</a></li>
			<li><a href="candidates_shortlist.html" title=""><i class="la la-money"></i>Shorlisted Job</a></li>
			<li><a href="candidates_applied_jobs.html" title=""><i class="la la-paper-plane"></i>Applied Job</a></li>
			<li><a href="candidates_job_alert.html" title=""><i class="la la-user"></i>Job Alerts</a></li>
			<li><a href="candidates_cv_cover_letter.html" title=""><i class="la la-file-text"></i>Cv & Cover Letter</a></li>
			<li><a href="candidates_change_password.html" title=""><i class="la la-flash"></i>Change Password</a></li> -->
			<li><a href="{{route('logout')}}" title=""><i class="la la-unlink"></i>Cerrar sesión</a></li>
		</ul>
	</div>
</div><!-- Profile Sidebar -->
@endif



<div class="account-popup-area signin-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>Inicio de Sesión</h3>
		@error('email')
			<span id="email-error"><strong>{{ $message }}</strong></span>
		@enderror
		<form method="POST" action="{{ route('login') }}">
            @csrf
			<div class="cfield">
				<input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required />
				<i class="la la-user"></i>
			</div>

			<div class="cfield">
                <input type="password" id="password" placeholder="********" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" minlength="8">
				<i class="la la-key"></i>
			</div>
			@error('password')
			    <span>{{ $message }}</span>
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
			<span>o Accede a través de</span>
			<div class="login-social">
				<a class="fb-login" href="{{ url('/auth/redirect/facebook') }}" title=""><i class="fa fa-facebook"></i></a>
				<a class="gg-login" href="{{ url('/auth/redirect/google') }}" title=""><i class="fa fa-google"></i></a>
			</div>
		</div>
	</div>
</div><!-- LOGIN POPUP -->


<div class="account-popup-area signup-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>Registro Caza Talentos</h3>
		@error('email')
			<span id="email-error"><strong>{{ $message }}</strong></span>
		@enderror
		<form method="POST" action="{{ route('register') }}">
            @csrf
			<div class="cfield">
				<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nombres" value="{{ old('name') }}" required />
				
			</div>
			<div class="cfield">
				<input type="text" id="lastname" name="lastname" class="form-control @error('lastname') is-invalid @enderror" placeholder="Apellidos" value="{{ old('lastname') }}" required />
				
			</div>
			<div class="cfield">
				<input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required />
				<i class="la la-envelope"></i>
			</div>

			<div class="cfield">
                <input id="password" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" minlength="8"    >
				<i class="la la-key"></i>
			</div>
			@error('password')
			    <span>{{ $message }}</span>
			@enderror

			<div class="cfield">
                <input type="password" placeholder="Repita la contraseña" name="password_confirmation" id="password_confirm" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" minlength="8">
				<i class="la la-key"></i>
			</div>

			<button type="submit">Crear Cuenta</button>
		</form>
		<div class="extra-login">
			<span>o Registrate a través de</span>
			<div class="login-social">
				<a class="fb-login" href="{{ url('/auth/redirect/facebook') }}" title=""><i class="fa fa-facebook"></i></a>
				<a class="gg-login" href="{{ url('/auth/redirect/google') }}" title=""><i class="fa fa-google"></i></a>
			</div>
		</div>
	</div>
</div><!-- REGISTRO POPUP -->


<!-- <script src="{{URL::asset('js/app.js')}}" type="text/javascript"></script> -->
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
<script src="{{URL::asset('js/scripts.js')}}" type="text/javascript"></script>

@yield('scripts')

<script>
	$(function(){
		/*si hay errores en login*/
		const error = {!! json_encode( $errors->has('email') ) !!};
		if (error) { 
			$('.signin-popup-box').fadeIn('fast');
			$('html').addClass('no-scroll');
		}

		$('.close-popup').click(function(){
			$('#email-error').hide();
		});

		$('#email').keypress(function(){
			$('#email-error').hide();
		});

		$('#password').keypress(function(){
			$('#email-error').hide();
		});
		/*fin si hay errores en login*/
	});
</script>
</body>

</html>
