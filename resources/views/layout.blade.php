<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>BCC</title>
</head>

<body class="flex flex-col min-h-screen dark:bg-gray-700">

    <!-- Navbar -->
    <nav class="bg-gray-200 dark:bg-gray-800 border-gray-200 dark:border-gray-600 shadow-lg rounded-lg m-2"
        x-data="{ open: false }">
        <div class="max-w-screen-xl mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="BCC Logo" />
                <span class="text-2xl font-bold dark:text-white">BCC</span>
            </a>

            <!-- Mobile menu button -->
            <button @click="open = !open"
                class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 p-2 rounded-lg focus:outline-none">
                <span class="sr-only">Open main menu</span>
                <i class="fas fa-bars fa-lg" x-show="!open"></i>
                <i class="fas fa-times fa-lg" x-show="open"></i>
            </button>

            <!-- Desktop menu -->
            <div class="hidden md:flex md:items-center space-x-6">
                @auth
                    <a href="/"
                        class="flex items-center space-x-2 text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 font-medium">
                        <i class="fas fa-book"></i>
                        <span>Posts</span>
                    </a>
                    <a href="/categories"
                        class="flex items-center space-x-2 text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 font-medium">
                        <i class="fas fa-bookmark"></i>
                        <span>Categories</span>
                    </a>

                    <!-- Dropdown -->
                    <div class="relative">
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center space-x-2 text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 font-medium">
                            <i class="fas fa-caret-down"></i>
                            <span>{{ Auth::user()->name }}</span>
                        </button>
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-gray-200 divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-gray-800 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-black dark:text-white">
                                <li>
                                    <a href="/users/{{ Auth::user()->id }}/edit"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit Profile</a>
                                </li>
                                @if (auth() && auth()->user()->group_id === 1)
                                <li>
                                    <a href="/users/list"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">User List</a>
                                </li>
                                @endif
                            </ul>
                            <div class="py-1">
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center space-x-2 px-4 py-2 text-gray-900 dark:text-white hover:text-red-500 dark:hover:text-red-500 font-medium">
                                        <i class="fas fa-door-closed"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="/register"
                        class="text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 font-medium">
                        Register
                    </a>
                    <a href="/login"
                        class="text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 font-medium">
                        Login
                    </a>
                @endauth
            </div>
        </div>

        <!-- Mobile dropdown -->
        <div x-show="open" x-transition
            class="md:hidden bg-gray-200 dark:bg-gray-700 mx-2 mt-2 mb-3 px-4 pb-3 pt-3 space-y-2 rounded-lg shadow-lg">
            @auth
                <a href="/"
                    class="flex items-center space-x-2 text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 font-medium">
                    <i class="fas fa-book"></i>
                    <span>Posts</span>
                </a>
                <a href="/categories"
                    class="flex items-center space-x-2 text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 font-medium">
                    <i class="fas fa-bookmark"></i>
                    <span>Categories</span>
                </a>

                <!-- Mobile Dropdown -->
                <details class="bg-gray-100 dark:bg-gray-800 rounded-md mt-2 shadow-sm">
                    <summary
                        class="flex items-center space-x-2 px-4 py-2 cursor-pointer text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 font-medium">
                        <i class="fas fa-caret-down"></i>
                        <span>User</span>
                    </summary>
                    <div class="pl-6 py-2 space-y-1">
                        <a href="/users/{{ Auth::user()->id }}/edit"
                            class="block px-2 py-1 text-sm text-gray-900 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">Edit Profile</a>
                        @if(auth() && auth()->user()->group_id === 1)
                        <a href="#"
                            class="block px-2 py-1 text-sm text-gray-900 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">User List</a>
                        @endif
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit"
                                class="flex items-center space-x-2 px-2 py-1 text-sm text-gray-900 dark:text-white hover:text-red-500 dark:hover:text-red-500 font-medium">
                                <i class="fas fa-door-closed"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </div>
                </details>
            @else
                <a href="/register"
                    class="block text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 font-medium">
                    Register
                </a>
                <a href="/login"
                    class="block text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 font-medium">
                    Login
                </a>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto p-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 dark:bg-gray-800 shadow-sm rounded-lg m-2">
        <div class="max-w-screen-xl mx-auto p-4 text-center">
            <span class="text-sm text-gray-500 dark:text-gray-400">
                © 2025 <a href="/" class="hover:underline">BCC™</a>. All Rights Reserved.
            </span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
