<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        {{-- Navbar --}}
        <x-admin-navbar></x-admin-navbar>
        {{-- Navbar End --}}

        {{-- Sidebar --}}
        <x-admin-sidebar></x-admin-sidebar>
        {{-- Sidebar End --}}

        {{-- Main Section --}}
        <main class="p-4 md:ml-64 h-auto pt-20">
            {{-- <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4">
            </div> --}}
            {{-- <div class="grid grid-cols-4 gap-4 mb-4">
                <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
                <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
                <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
                <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            </div> --}}

            {{-- Isi tiap file --}}
            {{ $slot }}
        </main>
    </div>
</body>

</html>
