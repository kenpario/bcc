@extends('layout')
@section('content')
    <div class="bg-gray-200 dark:bg-gray-800 rounded-lg shadow-lg p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1 dark:text-white">
                Log In
            </h2>
            <p class="mb-4 dark:text-white">Log in to post gigs</p>
        </header>

        <form method="POST" action="/users/authenticate">
            @csrf
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2 dark:text-white">Email</label>
                 @error('email')
                    <p class="text-red-500 text-xs m-1">{{ $message }}</p>
                @enderror
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{ old('email') }}"/>
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2 dark:text-white">
                    Password
                </label>
                 @error('password')
                    <p class="text-red-500 text-xs m-1">{{ $message }}</p>
                @enderror
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Sign In
                </button>
            </div>

            <div class="mt-8 dark:text-white">
                <p>
                    Don't have an account?
                    <a href="/register" class="text-laravel">Register</a>
                </p>
            </div>
        </form>
    </div>
@endsection