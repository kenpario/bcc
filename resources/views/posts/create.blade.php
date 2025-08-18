@extends('layout')
@section('content')
    <div class="bg-gray-200 dark:bg-gray-800 p-10 max-w-lg mx-auto mt-24 shadow-lg rounded-lg">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1 dark:text-white">
                Add a new item
            </h2>
        </header>

        <form method="POST" action="/posts" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2 dark:text-white">Name</label>
                @error('name')
                    <p class="text-red-500 text-xs m-1">{{ $message }}</p>
                @enderror
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{ old('name') }}"/>
            </div>

            <div class="mb-6">
                <label for="color" class="inline-block text-lg mb-2 dark:text-white">Color</label>
                @error('color')
                    <p class="text-red-500 text-xs m-1">{{ $message }}</p>
                @enderror
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="color" value="{{ old('color') }}"/>
            </div>

            <div class="mb-6">
                <label for="category_id" class="inline-block text-lg mb-2 dark:text-white">Category</label>
                @error('category_id')
                    <p class="text-red-500 text-xs m-1">{{ $message }}</p>
                @enderror

                <select name="category_id" id="category_id" class="border border-gray-200 rounded p-2 w-full">
                    <option value="">-- Select a Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="price" class="inline-block text-lg mb-2 dark:text-white">Price</label>
                @error('price')
                    <p class="text-red-500 text-xs m-1">{{ $message }}</p>
                @enderror
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="price" value="{{ old('price') }}"/>
            </div>
            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-red-800">
                    Add Item
                </button>

                <a href="/" class="text-black ml-4 dark:text-white"> Back </a>
            </div>
        </form>
    </div>
@endsection