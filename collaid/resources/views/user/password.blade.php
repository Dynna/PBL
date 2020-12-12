@extends('layouts.app')

@section('content')
    <style>
        * {
            margin: 0;
            font-family: 'Raleway', sans-serif;
            color: black;
        }

        .change-psw {
            display:flex;
            justify-content: center;
            align-items: center;
        }

        .change-current-psw {
            width: 320px;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .change-psw-text {
            text-align: center;
            font-size: 48px;
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

        .change-btn {
            width:100%;
            margin-top: 20px;
            height: 50px;
            border: none;
            background-color: #AABCBF;
            color: #808080;
            font-weight: 500;
        }

        .change-btn:hover {
            color: #ffffff;
        }
    </style>
    <div class="change-psw">
        <div class="change-current-psw">
            <div class="change-psw-text">
                <h1>Change password</h1>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                @endif

                <div class="form-group">
                    <label for="oldPassword">{{ __('Current Password') }}</label>
                    <input id="oldPassword" type="password" class="form-controller @error('oldPassword') is-invalid @enderror" name="oldPassword" autocomplete="new-password">
                </div>

                <div class="form-group ">
                    <label for="password">{{ __('New Password') }}</label>
                    <input id="password" type="password" class="form-controller @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-controller" name="password_confirmation" autocomplete="new-password">
                </div>

                <div class="change-button">
                    <button type="submit" class="change-btn">
                        {{ __('Change') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
