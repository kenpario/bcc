@extends('layout')
@section('content')


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-1">
        <div class="flex justify-end">
            <a href="/categories/create">
                <button type="button"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 m-2 shadow-lg"><i
                        class="fa fa-plus-circle" aria-hidden="true"></i> New
                    Category</button>
            </a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Category Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>

            </thead>
            <tbody>
                @unless(count($categories) == 0)
                    @foreach ($categories as $category)
                        <x-category-card :category="$category" />
                    @endforeach
                @else
                    Not Found
                @endunless
            </tbody>
        </table>
    </div>

@endsection