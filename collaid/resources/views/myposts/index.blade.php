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
            /*flex:1.1;*/
            /*order:2;*/
            width: 25%;
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
            /*flex: 3;*/
            /*order: 3;*/
            padding-left: 50px;
            padding-right: 72px;
            width: 75%;
        }



        .info-container-container div{
            margin-bottom: 10px;
            opacity: 0.8;
        }

        .info-container-container span{
            font-weight: 600;
            opacity: 0.8;
        }

        .posts-handing {
            height: 100px;
            display: flex;
            align-items: center;
            border-bottom: 1px #ccc solid;
        }

        .posts-handing h1 {
            font-size: 32px;
        }

        .post {
            border-bottom: 1px #ccc solid;
            height: 130px;
        }

        .edit-btn {
            width: 110px;
            height: 35px;
            background: #aabcbf;
            text-align: center;
            border: none;
            color: white;
            outline: none;
        }

        .delete-btn {
            width: 110px;
            height: 35px;
            background: white;
            border: 1px #ccc solid;
            color: #aabcbf;
            outline: none;
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
{{--                        <p>{{$user['first_name']}} {{$user['last_name']}}</p>--}}
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
                        <li><a href="{{ route('myposts.index')}}">My posts</a></li>
                        <li><a href="Friends.html">Friends</a></li>
                    </ul>

                </div>
            </div>
            <div class="service-display">
                <div class="posts-handing">
                    <h1>MY POSTS</h1>
                </div>
                <div class="posts-list">
                            @foreach($items as $item)
                                <div class="post">
                                    <h3>{{ $item->post_title }}</h3>
                                    <p>{{ $item->post_content}}</p>

                                @can('update', $item)
                                    <a href="{{ route('posts.edit', $item->id) }}">
                                        <button type="button" class="edit-btn">Edit</button>
                                    </a>
                                    <a href="{{ route('post.delete', $item->id) }}">
                                        <button type="button" class="delete-btn">Delete</button>
                                    </a>
                                @endcan
                                    <h6>posted by {{ $item->user->first_name }} {{ $item->user->last_name }} on {{ $item->created_at }}</h6>
                                    @endforeach
                                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2020 by Collaid. Proudly created by Team 'Connected'. </p>
    </footer>
@endsection
<script type="text/javascript">
    {{--document.title = `{{$user['first_name']}}'s profile`--}}
</script>
