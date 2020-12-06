@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>POST SHOW</h1>
        <h1>{{ $post->post_title }}</h1>
        <p class="lead">{{ $post->post_content }}</p>
        <hr>

        <a href="{{ route('posts.index') }}" class="btn btn-info">Back to all posts</a>
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit post</a>
    </div>
@endsection
