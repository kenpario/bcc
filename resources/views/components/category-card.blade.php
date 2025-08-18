@props(['category'])

<tr
    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $category->name }}
    </th>
    @if(auth() && auth()->id() === $category->user_id)
    <td class="px-6 py-4 flex gap-5">
        <a href="/categories/{{ $category->id }}/edit"
            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
        <form method="POST" action="/categories/{{ $category->id }}">
            @csrf
            @method('DELETE')
            <button class="text-red-600">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        </form>
    </td>
    @endif
</tr>