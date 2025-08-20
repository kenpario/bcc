@props(['user'])

<tr
    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $user->name }}
    </th>
     <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $user->email }}
    </th>
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $user->group->name}}
    </th>
     <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $user->password }}
    </th>
    @if(auth() && auth()->user()->group_id === 1)
    <td class="px-6 py-4 flex gap-5">
        <a href="/users/{{ $user->id }}/adminedit"
            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
        <form method="POST" action="/users/{{ $user->id }}">
            @csrf
            @method('DELETE')
            <button class="text-red-600">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        </form>
    </td>
    @endif
</tr>