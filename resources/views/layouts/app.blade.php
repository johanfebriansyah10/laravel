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
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js">
            AOS.init();
        </script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    </head>
    <body class="font-sans antialiased transition-all duration-300 ease-in-out">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex flex-col items-center justify-center py-10" data-aos="fade-up">
                <div class="w-full max-w-3xl mb-8" data-aos="zoom-in" data-aos-delay="200">
                    {{ $slot }}
                </div>
                <button
                    onclick="document.documentElement.classList.toggle('dark')"
                    class="text-white bg-blue-500 hover:bg-blue-600 transition-colors rounded-xl py-5 px-8 shadow-lg flex items-center gap-2"
                    data-aos="flip-left"
                    data-aos-delay="400"
                >
                    🌗 Toggle Mode
                </button>
            </main>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    AOS.init({
                        duration: 800,
                        once: true,
                    });
                });
            </script>
        </div>
    </body>
</html>
