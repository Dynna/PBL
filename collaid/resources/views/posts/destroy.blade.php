@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>DELETE POST</h1>
        <h1>{{ $post->post_title }}</h1>
        <p class="lead">{{ $post->post_content }}</p>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('posts.index') }}" class="btn btn-info">Back to all posts</a>
        </div>
        <div class="col-md-6 text-right">
            <form action="{{ route('posts.destroy',$post->id) }}" method="GET">
                <input name="_method" type="hidden" value="DELETE">
                @csrf

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Delete post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
