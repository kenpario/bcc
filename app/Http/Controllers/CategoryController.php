<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
        ]);

        Category::create($formFields);

        return redirect('/categories');
    }

    public function edit(Category $category) {
        return view('categories.edit',['category' => $category]);
    }

     public function update(Request $request, Category $category)
    {
        $formFields = $request->validate([
            'name' => 'required',
        ]);

        $category->update($formFields);

        return back();
    }

    public function destroy(Category $category){
        $category->delete();

        return redirect('/categories');
    }
}
