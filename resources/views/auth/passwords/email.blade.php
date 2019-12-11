@extends('layouts.tema')

@section('title', 'Restablecer contraseña')

@section('header_type', 'gradient')

@section('content')
    <section>
        <div class="block no-padding  gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner2">
                            <div class="inner-title2">
                                <h3>Restablecer contraseña</h3>
                                <span>Ingresa la dirección de correo para enviar información sobre restablecimiento de contraseña</span>
                            </div>
<!--                             <div class="page-breacrumbs">
    <ul class="breadcrumbs">
        <li><a href="#" title="">Home</a></li>
        <li><a href="#" title="">Pages</a></li>
        <li><a href="#" title="">Login</a></li>
    </ul>
</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block remove-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-popup-area signin-popup-box static">
                            <div class="account-popup">
                                <span>{{ __('Reset Password') }}</span>

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf


                                    <div class="cfield">
                                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="correo electrónico" />
                                        <i class="la la-email"></i>
                                    </div>
                                    <button type="submit">
                                        {{ __('Enviar contraseña para restablecer') }}
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
