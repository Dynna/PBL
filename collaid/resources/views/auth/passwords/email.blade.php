@extends('layouts.app')

@section('content')
    <style>
        * {
            margin: 0;
            font-family: 'Raleway', sans-serif;
            color: black;
        }

        .reset-psw {
            display:flex;
            justify-content: center;
            align-items: center;
        }

        .email-field {
            width: 320px;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .reset-text {
            text-align: center;
        }

        .reset-text h1 {
            font-size: 43px;
        }

        .reset-text p {
            font-size: 18px;
            margin-top: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            margin-top: 60px;
        }

        .form-group label {
            color: black;
            opacity: 0.8;
            font-weight: 300;
            font-size: 18px;
        }

        .form-controller {
            width: 100%;
            border: none;
            border-bottom: 1px  solid;
        }

        .form-controller:focus {
            outline: none;
        }

        .reset-button {
            width:100%;
            margin-top: 20px;
            height: 50px;
            border: none;
            background-color: #AABCBF;
            color: #808080;
            font-weight: 500;
        }

        .reset-button:hover {
            color: #ffffff;
        }

    </style>
    <div class="reset-psw">
        <div class="email-field">
            <div class="reset-text">
                <h1>Reset Password</h1>
                <p>Please enter your email address</p>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-controller @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="button">
                    <button type="submit" class="reset-button">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
