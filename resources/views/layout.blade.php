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
    <nav class="bg-gray-200 dark:bg-gray-800 border-gray-200 dark:border-gray-600 shadow-lg rounded-lg m-2">
        <div class="max-w-screen-xl mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="BCC Logo" />
                <span class="text-2xl font-bold dark:text-white">BCC</span>
            </a>

            <!-- Menu button for mobile -->
            <button data-collapse-toggle="mobile-menu" type="button"
                class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200 dark:focus:ring-gray-600">
                <span class="sr-only">Open main menu</span>
                <i class="fas fa-bars fa-lg"></i>
            </button>

            <!-- Menu Links -->
            <div id="mobile-menu" class="hidden md:flex md:items-center space-x-6">
                @auth
                    <a href="/" class="text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 font-medium">Posts</a>
                    <a href="/categories" class="text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 font-medium">Categories</a>
                    <form method="POST" action="/logout" class="inline">
                        @csrf
                        <button type="submit"
                            class="text-gray-900 dark:text-white hover:text-red-600 dark:hover:text-red-400 font-medium flex items-center space-x-2">
                            <i class="fas fa-door-closed"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                @else
                    <a href="/register" class="text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 font-medium">Register</a>
                    <a href="/login" class="text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 font-medium">Login</a>
                @endauth
            </div>
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
