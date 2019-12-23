@extends('layouts.tema')

@section('title', 'Cambio de contraseña')

@section('header_type', 'gradient')

@section('content')
    <section>
        <div class="block remove-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-popup-area signin-popup-box static">
                            <div class="account-popup">
                                <h3>{{ __('Reset Password') }}</h3>
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <div class="cfield">
                                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="correo electrónico" />
                                        <i class="la la-email"></i>
                                        @error('email')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="cfield">
                                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
                                        <i class="la la-email"></i>
                                        @error('password')
                                        <span>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="cfield">
                                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                                        <i class="la la-email"></i>
                                    </div>
                                    <button type="submit">
                                        {{ __('Reset Password') }}
                                    </button>
                                </form>
                            </div>
                        </div><!-- LOGIN POPUP -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
