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
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View post</a>
                @can('update', $post)
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit post</a>
                <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-primary">Delete post</a>
                @endcan
            </p>
            <hr>
        @endforeach

    </div>
@endsection
