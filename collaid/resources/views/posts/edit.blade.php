@extends('layouts.app')

@section('content')
    <h1>EDIT</h1>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}">Back to all posts</a>
            </div>
        </div>
    </div>

    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf
        @method('PUT')

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="post_title" value="{{ $post->post_title }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Body:</strong>
                    <textarea class="form-control" style="height:150px" name="post_content">{{ $post->post_content }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>

    </form>

@endsection
