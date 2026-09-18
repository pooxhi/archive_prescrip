<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'OptiArchive') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <body
        x-data="{ sidebarOpen: false }"
        class="font-sans antialiased bg-[#EEEEEE]"
    >
        <div class="min-h-screen">

            <!-- Mobile Overlay -->
            <div
                x-show="sidebarOpen"
                x-transition.opacity
                class="fixed inset-0 z-40 bg-black/40 lg:hidden"
                @click="sidebarOpen = false"
                x-cloak
            ></div>

            <!-- Sidebar -->
            @include('components.sidebar')

            <!-- Main Area -->
            <div class="min-h-screen lg:pl-72">

                <!-- Topbar -->
                @include('components.topbar')

                <!-- Page Content -->
                <main class="px-4 py-6 sm:px-6 lg:px-8">
                    @yield('content')
                </main>

            </div>
        </div>
    </body>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: @json(session('success')),
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            });
        </script>
    @endif
</html>