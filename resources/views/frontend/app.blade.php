<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pet Adoption System</title>
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

                <!-- Desktop links -->
                <div class="hidden md:flex items-center gap-6">
                    @php
                        $navLink = fn($routeName, $label) => '<a href="' . route($routeName) . '" class="text-sm font-semibold transition ' . (request()->routeIs($routeName) ? 'text-blue-600' : 'text-gray-600 hover:text-blue-600') . '">' . $label . '</a>';
                    @endphp
                    {!! $navLink('home', 'Home') !!}
                    {!! $navLink('about', 'About') !!}
                    {!! $navLink('browse.pets', 'Browse Pets') !!}
                    {!! $navLink('contact', 'Contact') !!}
                </div>

                <!-- Auth actions -->
                <div class="hidden md:flex items-center gap-3">
                    @guest
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-600 hover:text-blue-600">Login</a>
                        <a href="{{ route('register') }}" class="btn-primary !px-4 !py-2 text-sm">Register</a>
                    @endguest
                    @auth
                        <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="text-sm font-semibold text-gray-600 hover:text-blue-600">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="text-sm font-semibold text-red-500 hover:text-red-600">Logout</button>
                        </form>
                    @endauth
                </div>

                <!-- Mobile toggle -->
                <button @click="mobileOpen = !mobileOpen" class="md:hidden text-gray-600 hover:text-blue-600 p-2" aria-label="Toggle menu">
                    <i class="fas text-xl" :class="mobileOpen ? 'fa-xmark' : 'fa-bars'"></i>
                </button>
            </div>

            <!-- Mobile menu -->
            <div x-show="mobileOpen" x-cloak x-transition class="md:hidden pb-4 flex flex-col gap-3 border-t border-gray-100 pt-4">
                <a href="{{ route('home') }}" class="font-semibold {{ request()->routeIs('home') ? 'text-blue-600' : 'text-gray-600' }}">Home</a>
                <a href="{{ route('about') }}" class="font-semibold {{ request()->routeIs('about') ? 'text-blue-600' : 'text-gray-600' }}">About</a>
                <a href="{{ route('browse.pets') }}" class="font-semibold {{ request()->routeIs('browse.pets') ? 'text-blue-600' : 'text-gray-600' }}">Browse Pets</a>
                <a href="{{ route('contact') }}" class="font-semibold {{ request()->routeIs('contact') ? 'text-blue-600' : 'text-gray-600' }}">Contact</a>
                <hr class="border-gray-100">
                @guest
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600">Login</a>
                    <a href="{{ route('register') }}" class="font-semibold text-blue-600">Register</a>
                @endguest
                @auth
                    <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="font-semibold text-gray-600">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="font-semibold text-red-500">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 mt-12">
        <div class="page-container py-12 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <a href="{{ route('home') }}" class="flex items-center gap-2 text-xl font-extrabold text-white mb-3">
                    <i class="fas fa-paw text-blue-500"></i> PetPals
                </a>
                <p class="text-sm text-gray-400 leading-relaxed">Connecting loving families with pets in need — safe, ethical, and happy adoptions every time.</p>
            </div>
            <div>
                <h3 class="text-white font-bold mb-3">Quick Links</h3>
                <div class="flex flex-col gap-2 text-sm">
                    <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                    <a href="{{ route('about') }}" class="hover:text-white transition">About</a>
                    <a href="{{ route('browse.pets') }}" class="hover:text-white transition">Browse Pets</a>
                    <a href="{{ route('contact') }}" class="hover:text-white transition">Contact</a>
                </div>
            </div>
            <div>
                <h3 class="text-white font-bold mb-3">Get in Touch</h3>
                <div class="flex flex-col gap-2 text-sm text-gray-400">
                    <span><i class="fas fa-envelope mr-2 text-blue-500"></i>hello@petpals.example</span>
                    <span><i class="fas fa-phone mr-2 text-blue-500"></i>+254 700 000 000</span>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800 py-4 text-center text-sm text-gray-500">
            © {{ date('Y') }} PetPals Adoption System. All Rights Reserved.
        </div>
    </footer>
</body>
</html>