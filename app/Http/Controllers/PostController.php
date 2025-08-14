<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $formFields = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);

        Post::create($formFields);

        return redirect('/');
    }

    public function edit(Post $post) {
        return view('posts.edit',['post' => $post]);
    }

    public function update(Request $request, Post $post) {
        $formFields = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'category' => 'required',
            'price' => 'required',
        ]);

        $post->update($formFields);

        return back();
    }

    public function destroy(Post $post) {
        $post->delete();

        return redirect('/');
    }
}
