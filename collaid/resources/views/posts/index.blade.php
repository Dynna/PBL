@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>AVAILABLE POSTS</h1>
        @can('create', \App\Post::class)
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create post</a>
        @endcan
        @foreach($posts as $post)
            <h3>{{ $post->post_title }}</h3>
            <p>{{ $post->post_content}}</p>
            <p>
                @can('update', $post)
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit post</a>
                <a href="{{ route('post.delete', $post->id) }}">
                        <button type="button" class="btn btn-danger btn-sm">Delete Post</button>
                </a>

                @endcan
            </p>
            <h6>posted by on {{ $post->created_at }}</h6>

            <hr>

        @endforeach

    </div>
@endsection
