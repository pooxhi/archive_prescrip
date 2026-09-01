<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'OptiArchive')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="flex min-h-screen flex-col items-center justify-center bg-[#EEEEEE] pt-6 sm:pt-0">
            <div class="flex flex-col items-center">
                <a href="/" class="text-lg font-bold text-[#1F6F5F]">
                    OptiArchive
                </a>
            </div>

            <div class="mt-6 w-full overflow-hidden rounded-2xl bg-white px-6 py-4 shadow-sm ring-1 ring-gray-100 sm:max-w-md">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>