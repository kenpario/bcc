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
        $categories = Category::all();

        return view('posts.create',compact('categories'));

        
    }

    public function store(Request $request)
    {

        $formFields = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        Post::create($formFields);

        return redirect('/');
    }

    public function edit(Post $post) {

        $categories = Category::all();
        return view('posts.edit',['post' => $post],compact('categories'));
    }

    public function update(Request $request, Post $post) {

        if($post->user_id != auth()->id()) {
            abort(403,'Unauthorized Action!');
        }
        $formFields = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required',
        ]);

        $formFields['user_id'] = auth()->id();

        $post->update($formFields);

        return back();
    }

    public function destroy(Post $post) {
        
        if($post->user_id != auth()->id()) {
            abort(403,'Unauthorized Action!');
        }

        $post->delete();

        return redirect('/');
    }
}
