@extends('layouts.app')

@section('content')
    <style>
        * {
            margin: 0;
            font-family: 'Raleway', sans-serif;
            color: black;
        }

        .reg-container {
            display:flex;
            justify-content: center;
            align-items: center;
        }

        .register-container {
            width: 320px;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .sign-text {
            text-align: center;
        }

        .sign-text h1 {
            font-size: 48px;
        }

        .sign-text p {
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

        .sign-up-button {
            width:100%;
            margin-top: 20px;
            height: 50px;
            border: none;
            background-color: #AABCBF;
            color: #808080;
            font-weight: 500;
        }

        .sign-up-button:hover {
            color: #ffffff;
        }
    </style>
                <div class="reg-container">
                    <div class="register-container">
                    <div class="sign-text">
                        <h1>Sign Up</h1>
                        <p>Already a member?
                            <a href="{{ url('/login') }}">Sign in</a>
                        </p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">{{ __('First name') }}</label>
                                <input id="first_name" type="text" class="form-controller @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="last_name">{{ __('Last name') }}</label>
                                <input id="last_name" type="text" class="form-controller @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                            <label for="email">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-controller @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-controller @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-controller" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div>
                            <button type="submit" class="btn sign-up-button">
                                {{ __('Sign Up') }}
                            </button>
                        </div>
                    </form>
                </div>
                </div>
@endsection
