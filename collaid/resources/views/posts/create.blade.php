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
            flex: 2;
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
            flex: 2;
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
        .info-container-container div{
            margin-bottom: 10px;
            opacity: 0.8;
        }

        .info-container-container span{
            font-weight: 600;
            opacity: 0.8;
        }
        .service-display {
            display: flex;
            flex-direction: column;
            flex: 3;
            order: 3;
            padding-left: 50px;
            padding-right: 72px;
        }

        .add-post {
            display: flex;
            flex-direction: column;
            margin-top: 30px;
        }

        .title-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #000000;
            opacity: .9;
            font-size: 26px;
            line-height: 32px;
            border-bottom: 1px #ccc solid;
            padding-bottom: 20px;
        }

        .arrow-btn {
            background: none;
            border: none;
            color: #000000;
            opacity: .9;
        }


        form{}

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .title-input {
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

        .content-box{
            resize: none;
            border: 1px #ccc solid;
            padding-left: 10px;
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
                        <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
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

                @can('create', \App\Post::class)
                    <div class="row">
                        <div class="title-section">
                            <div class="title">
                                <h2>Add new post</h2>
                            </div>

                            <div>
                                <a class="arrow-btn" href="{{ route('posts.index') }}">&#8630;</a>
                            </div>

                        </div>
                    </div>

                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <div class="add-post">
                            <div class="form-group">
                                <label for="post_title">{{ __('Title') }}</label>
                                <input type="text" name="post_title" class="title-input">
                            </div>

                            <div class="form-group">
                                <label for="post_content">{{__('Description')}}</label>
                                <textarea id="content-box" class="content-box" style="height:150px" name="post_content" ></textarea>
                            </div>

                            <div>
                                <button type="submit" class="save-button">Add post</button>
                            </div>
                        </div>

                    </form>
                @endcan
            </div>
        </div>
    </div>


    <footer>
        <p>&copy; 2020 by Collaid. Proudly created by Team 'Connected'. </p>
    </footer>



@endsection
