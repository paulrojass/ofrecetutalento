@extends('layouts.tema')

@section('title', 'Verificar correo electrónico')

@section('header_type', 'gradient')

@section('content')
    <section>
        <div class="block remove-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-popup-area signup-popup-box static">
                            <div class="account-popup">
                                <h3>{{ __('Verify Your Email Address') }}</h3>

                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif

                                <span>{{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }},</span>



                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit">
                                        {{ __('click here to request another') }}
                                    </button>
                                </form>

                            </div>
                        </div><!-- SIGNUP POPUP -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
