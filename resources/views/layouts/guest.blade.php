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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col justify-center items-center px-4 py-10 bg-gradient-to-br from-blue-600 via-blue-700 to-blue-800">

            <a href="{{ route('home') }}" class="flex items-center gap-2 text-2xl font-extrabold text-white mb-6">
                <i class="fas fa-paw"></i> PetPals
            </a>

            <div class="w-full sm:max-w-md px-6 py-8 sm:px-8 card">
                {{ $slot }}
            </div>

            <a href="{{ route('home') }}" class="mt-6 text-sm text-blue-100 hover:text-white transition">
                <i class="fas fa-arrow-left mr-1"></i> Back to home
            </a>
        </div>
    </body>
</html>
