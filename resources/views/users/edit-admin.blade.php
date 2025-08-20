@extends('layout')
@section('content')
    <div class="bg-gray-200 dark:bg-gray-800 rounded-lg shadow-lg p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1 dark:text-white">
                {{ $user->name }}
            </h2>
            <p class="mb-4 dark:text-white">Edit Profile</p>
        </header>

        <form method="POST" action="/users/{{ $user->id }}/adminupdate" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2 dark:text-white">
                    Name
                </label>
                @error('name')
                    <p class="text-red-500 text-xs m-1">{{ $message }}</p>
                @enderror
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{ $user->name }}"/>
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2 dark:text-white">Email</label>
                @error('email')
                    <p class="text-red-500 text-xs m-1">{{ $message }}</p>
                @enderror
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{ $user->email }}"/>
            </div>

             <div class="mb-6">
                <label for="group_id" class="inline-block text-lg mb-2 dark:text-white">Group</label>
                @error('group_id')
                    <p class="text-red-500 text-xs m-1">{{ $message }}</p>
                @enderror
                <select name="group_id" id="group_id" class="border border-gray-200 rounded p-2 w-full">
                    <option value="">Select a Group</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}" {{ old('group_id' , $user->group_id) == $group->id ? 'selected' : ''}}>
                            {{ $group->name }}
                        </option>
                    @endforeach
                </select>
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
                <label for="password_confirmation" class="inline-block text-lg mb-2 dark:text-white">
                    Confirm Password
                </label>
                @error('password_confirmation')
                    <p class="text-red-500 text-xs m-1">{{ $message }}</p>
                @enderror
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Update Informations
                </button>
            </div>
        </form>
    </div>
@endsection