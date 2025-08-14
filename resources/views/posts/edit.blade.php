@extends('layout')
@section('content')
    <div class="bg-gray-200 dark:bg-gray-800 p-10 max-w-lg mx-auto mt-24 shadow-lg rounded-lg">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1 dark:text-white">
                Edit
            </h2>
            <p class="mb-4 dark:text-white">Edit: {{$post->name}}</p>
        </header>

        <form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2 dark:text-white">Name</label>
                @error('name')
                    <p class="text-red-500 text-xs m-1">{{ $message }}</p>
                @enderror
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{ $post->name }}"/>
            </div>

            <div class="mb-6">
                <label for="color" class="inline-block text-lg mb-2 dark:text-white">Color</label>
                @error('color')
                    <p class="text-red-500 text-xs m-1">{{ $message }}</p>
                @enderror
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="color" value="{{ $post->color }}"/>

            <div class="mb-6">
                <label for="category" class="inline-block text-lg mb-2 dark:text-white">Category</label>
                @error('category')
                    <p class="text-red-500 text-xs m-1">{{ $message }}</p>
                @enderror
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="category" value="{{ $post->category }}"/>
            </div>

            <div class="mb-6">
                <label for="price" class="inline-block text-lg mb-2 dark:text-white">Price</label>
                @error('price')
                    <p class="text-red-500 text-xs m-1">{{ $message }}</p>
                @enderror
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="price" value="{{ $post->price }}"/>
            </div>
            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-red-800">
                    Update Item
                </button>

                <a href="/" class="text-black ml-4 dark:text-white"> Back </a>
            </div>
        </form>
    </div>
@endsection