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
            display: flex;
            flex-direction: column;
        }

        .info-container-container div{
            margin-bottom: 10px;
            opacity: 0.8;
        }

        .info-container-container span{
            font-weight: 600;
            opacity: 0.8;
        }

        label {
            font-size: 15px;
            line-height: 18px;
        }


        .section-save-button {
            flex: 1;
            order: 6;

        }

        .save-button {
            width: calc(50% - 12px);
            height: 42px;
            background-color: #aabcbf;
            text-align: center;
            border: none;
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
                        <li><a href="MyAccount.html">My Account</a></li>
                        <li><a href="#">Add a new post</a></li>
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

                <div class="info-container-container">

                    <div>
                        @if( !empty($user['email']))
                            <p><span>Email: </span>{{$user['email']}}</p>
                        @endif
                    </div>
                    <div>
                        @if( !empty($user['date_of_birth']))
                            <p><span>Date of birth: </span>{{$user['date_of_birth']}}</p>
                        @endif
                    </div>
                    <div>@if( !empty($user['provided_service']))
                            <p><span>Provided Service: </span>{{$user['provided_service']}}</p>
                        @endif
                    </div>
                    <div>@if( !empty($user['past_experience']))
                            <p><span>Past Experience: </span>{{$user['past_experience']}}</p>
                        @endif
                    </div>


                </div>

                <div class="section-save-button">
                    <button type="submit" class="save-button"><a href="{{ route('user.edit', Auth::user()->id) }}">Edit Profile</a></button>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2020 by Collaid. Proudly created by Team 'Connected'. </p>
    </footer>

@endsection
<script type="text/javascript">
    document.title = `{{$user['first_name']}}'s profile`
</script>
