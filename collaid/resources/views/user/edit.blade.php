@extends('layouts.app')

@section('content')
    <style>
        * {
            margin: 0;
            font-family: 'Raleway', sans-serif;
            color: black;
        }

        li {
            list-style-type: none;
            font-size: 16px;
        }

        a {
            text-decoration: none;
        }

        .container-main{
            display:flex;
            padding-top: 100px;
            align-items: center;
            justify-content: center;
        }

        .container-position{
            display:flex;
            width: 75%;
            flex-direction:row;
        }

        .container-profile-menu{
            display:flex;
            flex:1.1;
            order:2;
            margin:10px;
            padding-top:35px;
            flex-direction:column;
        }

        .menu-avatar {
            display: flex;
            flex-direction: column;
            order: 1;
            border: 1px #ccc solid;
        }

        .user-avatar {
            display: flex;
            flex: 2;
            order: 1;
        }

        .avatar-place {
            flex: 1;
            order: 1;
            padding-top: 30px;
            padding-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .user-name {
            flex: 2;
            order: 2;
            padding-bottom: 15px;
            text-align: center;
            font-size: 16px;
        }

        .user-friends {
            display: flex;
            flex: 2;
            order: 3;
            padding-left: 25px;
            padding-bottom: 15px;
        }

        .user-friends-followers {
            display: flex;
            flex: 2;
            order: 1;
            flex-direction: column;
            border-right: 0.1px solid #bbb;
            line-height: 16px !important;
            font-size: 12px !important;
            max-width: 100%;
            opacity: .7;
        }


        .user-friends-followers-number {
            flex: 1;
            order: 1;
            text-align: center;
            font-size: 12px;
        }

        .user-friends-followers-text {
            flex: 1;
            order: 2;
            text-align: center;
            font-size: 13px;
        }


        .user-friends-following {
            display: flex;
            flex: 2;
            order: 3;
            flex-direction: column;
            padding-right: 25px;
            line-height: 16px !important;
            font-size: 12px !important;
            max-width: 100%;
            opacity: .7;
        }

        .user-friends-following-number {
            flex: 1;
            order: 1;
            text-align: center;
            font-size: 12px;
        }

        .user-friends-following-text {
            flex: 1;
            order: 2;
            text-align: center;
            font-size: 13px;
        }


        .menu-choice {
            display: flex;
            order: 2;
            font-size: 17px;
            border: 1px #ccc solid;
            margin-top:15px;
        }

        .menu-choice li {
            margin-top: 15px;
        }

        .menu-choice a {
            text-decoration: none;
            color: #404040;
        }

        .menu-choice a:hover{
            color: #666666;
        }

        .service-display {
            display: flex;
            flex-direction: column;
            flex: 3;
            order: 3;
            padding-left: 50px;
            padding-right: 72px;
        }

        .section-name {
            flex: 0.1;
            order: 1;
            color: #000000;
            opacity: .9;
            font-size: 26px;
            line-height: 32px;
            vertical-align: text-bottom;
            border-bottom: 1px #ccc solid;
            padding-bottom: 20px;
        }

        .info-container-container{
            flex: 0.5;
            order: 3;
            font-size: 15px;
            color: #000000;
            margin-top: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form .row-col {
            display: flex;
            flex-direction: row;
            width: 100%;
            justify-content: space-between;
        }

        .col-1, .col-2 {
            width: 45%;
        }

        .row-col input {
            height: 40px;
            display: flex;
            width: 100%;
            border: 1px #ccc solid;
            padding-left: 10px;
            font-size: 15px;
        }

        label {
            font-size: 15px;
            margin-bottom: 10px;
            font-weight: 300;
        }

        form .change-psw {
            text-decoration: none;
            color: #aabcbf;
            font-size: 15px;
        }

        .save-button {
            width: 45%;
            height: 42px;
            background-color: #aabcbf;
            text-align: center;
            border: none;
            color: #fff;
            font-size: 15px;
            margin-top: 15px;
        }

        .save-button a{
            text-decoration: none;
            color: #ffffff;
        }

        footer {
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            padding-bottom: 10px;
        }

        footer p {
            font-size: 0.8em;
            color: #000000;
            opacity: 0.6;
        }

    </style>
    <div class="container-main">
        <div class="container-position">
            <div class="container-profile-menu">
                <div class="menu-avatar">
                    <div class="user-avatar">
                        <div class="avatar-place">
                            <img src="http://via.placeholder.com/95x95" style="border-radius:50%" />
                            <input type="file" id="myfile" style="display:none" />
                        </div>
                    </div>
                    <div class="user-name">
                        <p>{{$user['first_name']}} {{$user['last_name']}}</p>
                    </div>
                    <div class="user-friends">
                        <div class="user-friends-followers">
                            <div class="user-friends-followers-number">
                                0
                            </div>
                            <div class="user-friends-followers-text">
                                <a href="#">Followers</a>
                            </div>
                        </div>
                        <div class="user-friends-following">
                            <div class="user-friends-following-number">
                                0
                            </div>
                            <div class="user-friends-following-text">
                                <a href="#">Following</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-choice">
                    <ul>
                        <li><a href="{{ route('user.profile', Auth::user()->id) }}">My Account</a></li>
                        <li><a href="{{ url('/posts/create') }}">Add a new post</a></li>
                        <li><a href="MyPosts.html">My posts</a></li>
                        <li><a href="Friends.html">Friends</a></li>
                    </ul>

                </div>
            </div>
            <div class="service-display">
                <div class="section-name">
                    <h2>My Account</h2>
                    <p>View and edit your personal info below.</p>
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

                <div class="info-container-container">
                    <form method="POST" action="{{ route('user.update') }}">
                        @csrf
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                        @endif
                        <div class="row-col">
                            <div class="col-1">
                                <div class="form-group">
                                    <label for="first_name">{{ __('First name') }}</label>

                                    <input id="first_name" value="{{$user['first_name']}}" type="text" class="form-controller @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name">
                                </div>

                                <div class="form-group">
                                    <label for="email">{{ __('E-Mail Address') }}</label>

                                    <input id="email" value="{{$user['email']}}" type="email" class="form-controller @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                </div>

                                <div class="form-group">
                                    <label for="provided_service">{{ __('Main job you offer') }}</label>

                                    <input id="provided_service" value="{{$user['provided_service']}}" type="text" class="form-controller @error('provided_service') is-invalid @enderror" name="provided_service">
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label for="last_name">{{ __('Last name') }}</label>

                                    <input id="last_name" value="{{$user['last_name']}}" type="text" class="form-controller @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name">
                                </div>

                                <div class="form-group">
                                    <label for="date_of_birth">{{ __('Birthday') }}</label>

                                    <input id="date_of_birth" value="{{$user['date_of_birth']}}" type="date" class="form-controller @error('date_of_birth') is-invalid @enderror" name="date_of_birth">
                                </div>

                                <div class="form-group">
                                    <label for="past_experience">{{ __('Past experience') }}</label>

                                    <input id="past_experience" value="{{$user['past_experience']}}" type="text" class="form-controller @error('past_experience') is-invalid @enderror" name="past_experience">
                                </div>
                            </div>
                        </div>
                        <a class="change-psw" href="{{ route('password.edit', Auth::user()->id) }}">Change Password</a>
                        <button type="submit" class="save-button">
                            {{ __('Update profile') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2020 by Collaid. Proudly created by Team 'Connected'. </p>
    </footer>


@endsection
