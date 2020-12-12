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

    </style>

    <div class="container-main">
    <div class="container-position">
        <div class="posts-handing">
        @can('create', \App\Post::class)
            <h1>POSTS</h1>
            <a href="{{ route('posts.create') }}" class="new-post-btn">Create post</a>
        @endcan
        </div>
        <div class="posts-list">
        @foreach($posts as $post)
            <h3>{{ $post->post_title }}</h3>
            <p>{{ $post->post_content}}</p>
            <p>
              {{--  <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View post</a>--}}
                @can('update', $post)
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit post</a>
                <a href="{{ route('post.delete', $post->id) }}">
                        <button type="button" class="btn btn-danger btn-sm">Delete Post</button>
                </a>
                @endcan
            </p>

        @endforeach
        </div>
    </div>
    </div>
@endsection
