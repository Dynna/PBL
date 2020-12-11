@extends('layouts.app')

@section('content')
    <style>
        .verify-container {
            display:flex;
            justify-content: center;
            align-items: center;
        }

        .verify-email-container {
            width: 320px;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .sign-text {
            text-align: center;
        }

        .sign-text h1 {
            font-size: 35px;
        }

        .verify-email-text {
            text-align: center;
            padding-top: 20px;
        }

        .submit-button {
            width:100%;
            margin-top: 20px;
            height: 50px;
            border: none;
            background-color: #AABCBF;
            color: #808080;
            font-weight: 500;
        }

        .submit-button:hover {
            color: #ffffff;
        }
    </style>
                    <div class="verify-container">
                        <div class="verify-email-container">
                            <div class="sign-text">
                                <h1>Verify your Email Address</h1>
                            </div>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                <p>A fresh verification link has been sent to your email address</p>
                            </div>
                        @endif
                            <div class="verify-email-text">
                                <p>Please check your email address for the activation code.</p>
                                <p>Did not received the activation code? Click the button bellow to request another.</p>
                            </div>
                        <form method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="submit-button">{{ __('Resend') }}</button>.
                        </form>
                        </div>
                    </div>
@endsection
