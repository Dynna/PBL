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

        .row-links {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .form-checking label {
            font-size: 13px;
        }

        .forgot-psw a {
            font-size: 13px;
        }


        .sign-button {
            width:100%;
            margin-top: 20px;
            height: 50px;
            border: none;
            background-color: #AABCBF;
            color: #808080;
            font-weight: 500;
        }

        .sign-button:hover {
            color: #ffffff;
        }
    </style>
                <div class="reg-container">
                    <div class="register-container">
                        <div class="sign-text">
                            <h1>Sign In</h1>
                            <p>New to this website?
                                <a href="{{ url('/register') }}">Sign Up</a>
                            </p>
                        </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-controller @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-controller @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <div class="row-links">
                                <div class="form-checking">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                <div class="forgot-psw">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                            <div class="button">
                                <button type="submit" class="sign-button">
                                    {{ __('Login') }}
                                </button>
                            </div>
                    </form>
                    </div>
                </div>
@endsection
