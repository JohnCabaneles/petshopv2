<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900">
        <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0 bg-custom">
            <div>
                <a href="/">
                    <div class="pet-logo"></div>
                </a>
            </div>
            <div class="z-10 w-full p-5 px-6 py-4 mt-6 overflow-hidden bg-opacity-75 shadow-md bg-slate-200 sm:max-w-md sm:rounded-lg">
                {{ $slot }}
            </div><script></script>
        </div>
    </body>
</html>
