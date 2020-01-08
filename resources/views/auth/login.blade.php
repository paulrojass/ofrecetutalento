@extends('layouts.login')

@section('title', 'Suscripción')

@section('header_type', 'white')

@section('content')

<section>
	<div class="block remove-bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="account-popup-area signin-popup-box static">
						<div class="account-popup">
							<span>Lorem ipsum dolor sit amet consectetur adipiscing elit odio duis risus at lobortis ullamcorper</span>
							<form method="POST" action="{{ route('login') }}">
								@csrf
								<div class="cfield">
									<input type="email" placeholder="{{ __('E-Mail Address') }}" id="email"  class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
									<i class="la la-user"></i>
									@error('email')
										<span>{{ $message }}</span>
									@enderror
								</div>
								<div class="cfield">
									<input type="password" placeholder="********" id="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
									<i class="la la-key"></i>
									@error('password')
										<span>{{ $message }}</span>
									@enderror
								</div>
								<p class="remember-label">
									<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									<label for="remember">{{ __('Remember Me') }}</label>
								</p>

								@if (Route::has('password.request'))
									<a href="{{ route('password.request') }}">
										{{ __('Forgot Your Password?') }}
									</a>
								@endif
								<button type="submit">{{ __('Login') }}</button>
							</form>
							<div class="extra-login">
								<span>Accede tambien a través de:</span>
								<div class="login-social">
									<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
									<a class="gg-login" href="#" title=""><i class="fa fa-google"></i></a>
								</div>
							</div>
						</div>
					</div><!-- LOGIN POPUP -->
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
