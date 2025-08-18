@extends('layout')
@section('content')


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-1">
        <div class="flex justify-end">
            @auth
                <a href="/posts/create">

                    <button type="button"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 m-2 shadow-lg"><i
                            class="fa fa-plus-circle" aria-hidden="true"></i> New
                        Item</button>
                </a>
            @endauth
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Color
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @unless(count($posts) == 0)
                    @foreach ($posts as $post)
                        <x-post-card :post="$post" />
                    @endforeach
                @else
                    <x-post-not-found-card />
                @endunless
            </tbody>
        </table>
        <div class="mt-6 p-4">{{$posts->links()}}</div>
    </div>

@endsection