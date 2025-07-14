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
 <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
    @include('components.sidebar')

    <div class="flex-1 lg:ml-64">
        @include('layouts.navigation')

        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="py-10 px-4" data-aos="fade-up">
            <div class="w-full max-w-5xl mx-auto" data-aos="zoom-in" data-aos-delay="200">
                @yield('register')
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
        </div>
    </body>
</html>
