@extends('layouts.app')

@section('content')
    <h1>CREATE NEW POST</h1>
    @can('create', \App\Post::class)
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}">Back to all posts.</a>
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
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="post_title" class="form-control" placeholder="Your post title...">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Body:</strong>
                    <textarea class="form-control" style="height:150px" name="post_content" placeholder="Body..."></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Add post</button>
            </div>
        </div>

    </form>
    @endcan

@endsection
