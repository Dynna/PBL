<?php

namespace App\Http\Controllers;

use App\Post;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function create(Post $post)
    {
        $this->authorize('create', $post);
        return view('posts.create');
    }

    public function store(Request $request)
    {
       $user = auth()->user();

        $this->validate($request, array(
            'post_title' => 'required',
            'post_content' => 'required',
        ));

        $post = new Post();
        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;
        $post->user_id = $user->id;
        $post->save();

       // return redirect()->route('posts.show', $post->id);
        return redirect()->route('posts.index')
            ->with('success','Post created successfully!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, Request $request)
    {
        $this->authorize('update', $post);
        $post->update($request->all());

        $request->session()->flash('success', 'Post updated successfully!');
        return redirect()->route('posts.show', $post);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->back();
    }
}
