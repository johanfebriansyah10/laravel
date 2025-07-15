<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased transition-all duration-300 ease-in-out bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col">
            <!-- Sticky Navbar -->
            <div class="sticky top-0 z-50 bg-white dark:bg-gray-800 shadow">
                @include('layouts.navigation')
            </div>

            <!-- Main Grid Container -->
            <div class="flex-1 grid grid-cols-12 gap-4">
                <!-- Sidebar (3 columns) -->
                <aside class="col-span-3">
                    @include('components.sidebar')
                </aside>

                <!-- Main Content (9 columns, centered) -->
                <main class="col-span-9 py-10 px-4" data-aos="fade-up">
                    <div class="w-full max-w-5xl" data-aos="zoom-in" data-aos-delay="200">
                        @isset($header)
                            <header class="bg-white dark:bg-gray-800 shadow mb-6">
                                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                    {{ $header }}
                                </div>
                            </header>
                        @endisset

                        @yield('content')
                    </div>
                </main>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                AOS.init({
                    duration: 800,
                    once: true,
                });
            });
        </script>
    </body>
</html>
