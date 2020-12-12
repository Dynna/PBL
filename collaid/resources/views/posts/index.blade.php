@extends('layouts.app')

@section('content')
    <style>
        * {
            margin: 0;
            font-family: 'Raleway', sans-serif;
            color: black;
        }

        .container-main{
            display:flex;
            padding-top: 100px;
            align-items: center;
            justify-content: center;
        }

        .container-position{
            display:flex;
            width: 65%;
            flex-direction:column;
        }

        .posts-handing {
            height: 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px #ccc solid;
        }

        .posts-handing h1 {
            font-size: 32px;
        }

        .posts-handing a{
            text-decoration: none;
            height: 40px;
            width: 100px;
            background-color: #aabcbf;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .posts-list {
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

    </style>

    <div class="container-main">
    <div class="container-position">
        <div class="posts-handing">
        @can('create', \App\Post::class)
            <h1>POSTS</h1>
            <a href="{{ route('posts.create') }}" class="new-post-btn">New Post</a>
        @endcan
        </div>
        <div class="posts-list">
        @foreach($posts as $post)
            <div class="post">
            <h3>{{ $post->post_title }}</h3>
            <p>{{ $post->post_content}}</p>

              {{--  <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View post</a>--}}
                @can('update', $post)
                <a href="{{ route('posts.edit', $post->id) }}">
                    <button type="button" class="edit-btn">Edit</button>
                </a>
                <a href="{{ route('post.delete', $post->id) }}">
                        <button type="button" class="delete-btn">Delete</button>
                </a>
                @endcan
            </div>

        @endforeach
        </div>
    </div>
    </div>
@endsection
