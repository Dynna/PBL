@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>MY POSTS</h1>

        @foreach($items as $item)
            <h3>{{ $item->post_title }}</h3>
            <p>{{ $item->post_content}}</p>

            <p>
                @can('update', $item)
                    <a href="{{ route('posts.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('post.delete', $item->id) }}">
                        <button type="button" class="btn btn-danger btn-sm">Delete</button>
                    </a>
                @endcan
            </p>
            <h6>posted by on {{ $item->created_at }}</h6>
            <hr>

        @endforeach

    </div>
@endsection
