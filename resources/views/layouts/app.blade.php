<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Pet Adoption System') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav x-data="{ mobileOpen: false }" class="bg-white/95 backdrop-blur border-b border-gray-100 sticky top-0 z-50">
        <div class="page-container">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('home') }}" class="flex items-center gap-2 text-xl font-extrabold text-blue-600">
                    <i class="fas fa-paw"></i> PetPals
                </a>

                <div class="hidden md:flex items-center gap-6">
                    <a href="{{ route('home') }}" class="text-sm font-semibold text-gray-600 hover:text-blue-600">Home</a>
                    <a href="{{ route('browse.pets') }}" class="text-sm font-semibold text-gray-600 hover:text-blue-600">Browse Pets</a>
                    <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="text-sm font-semibold text-blue-600">Dashboard</a>
                </div>

                <div class="hidden md:flex items-center gap-3">
                    <a href="{{ route('profile.edit') }}" class="text-sm font-semibold text-gray-600 hover:text-blue-600">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-sm font-semibold text-red-500 hover:text-red-600">Logout</button>
                    </form>
                </div>

                <button @click="mobileOpen = !mobileOpen" class="md:hidden text-gray-600 hover:text-blue-600 p-2" aria-label="Toggle menu">
                    <i class="fas text-xl" :class="mobileOpen ? 'fa-xmark' : 'fa-bars'"></i>
                </button>
            </div>

            <div x-show="mobileOpen" x-cloak x-transition class="md:hidden pb-4 flex flex-col gap-3 border-t border-gray-100 pt-4">
                <a href="{{ route('home') }}" class="font-semibold text-gray-600">Home</a>
                <a href="{{ route('browse.pets') }}" class="font-semibold text-gray-600">Browse Pets</a>
                <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="font-semibold text-blue-600">Dashboard</a>
                <a href="{{ route('profile.edit') }}" class="font-semibold text-gray-600">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="font-semibold text-red-500">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="flex-1">
        @if (isset($header))
            <div class="bg-white border-b border-gray-100">
                <div class="page-container py-6">
                    <h1 class="text-2xl font-black text-gray-900">
                        {{ $header }}
                    </h1>
                </div>
            </div>
        @endif

        <div class="page-container py-8">
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 text-center text-sm py-4">
        © {{ date('Y') }} PetPals Adoption System. All Rights Reserved.
    </footer>

</body>
</html>
