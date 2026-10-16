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
    <nav x-data="{ mobileOpen: false }" class="sticky top-0 z-50 border-b border-[#f1ece6] bg-[#fffaf5]/95 backdrop-blur">
        <div class="mx-auto max-w-[1250px] px-5 md:px-8 xl:px-0">
            <div class="flex h-[76px] items-center justify-between">
                <a href="{{ route('home') }}" class="flex w-fit items-center gap-2 text-[21px] font-extrabold text-slate-900" aria-label="Pawly home">
                    <i class="fas fa-paw text-[27px] text-[#ef704d]" aria-hidden="true"></i>
                    <span>Pawly</span>
                </a>

                <div class="hidden h-full flex-1 items-center justify-center gap-8 md:flex">
                    @foreach([
                        ['label' => 'Home', 'href' => route('home'), 'active' => request()->routeIs('home')],
                        ['label' => 'Shop', 'href' => route('home') . '#featured-products', 'active' => false],
                        ['label' => 'Adoption', 'href' => route('browse.pets'), 'active' => request()->routeIs('browse.pets', 'pets.show')],
                        ['label' => 'Services', 'href' => route('contact'), 'active' => request()->routeIs('contact')],
                        ['label' => 'About', 'href' => route('about'), 'active' => request()->routeIs('about')],
                    ] as $link)
                        <a href="{{ $link['href'] }}" class="relative flex h-full items-center text-sm font-semibold transition {{ $link['active'] ? 'text-[#d95d3f] after:absolute after:bottom-[17px] after:left-0 after:h-[2px] after:w-full after:bg-[#ef704d]' : 'text-slate-700 hover:text-[#d95d3f]' }}">
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </div>

                <div class="hidden items-center gap-6 md:flex">
                    <a href="{{ route('browse.pets') }}" class="text-slate-800 transition hover:text-[#d95d3f]" aria-label="Search pets" title="Search pets"><i class="fas fa-magnifying-glass text-lg" aria-hidden="true"></i></a>
                    <a href="{{ auth()->check() ? (auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard')) : route('login') }}" class="text-slate-800 transition hover:text-[#d95d3f]" aria-label="Account" title="Account"><i class="far fa-user text-lg" aria-hidden="true"></i></a>
                    <a href="{{ route('home') }}#featured-products" class="text-slate-800 transition hover:text-[#d95d3f]" aria-label="Shop products" title="Shop products"><i class="fas fa-cart-shopping text-lg" aria-hidden="true"></i></a>
                </div>

                <button @click="mobileOpen = !mobileOpen" class="p-2 text-slate-700 hover:text-[#d95d3f] md:hidden" aria-label="Toggle menu" :aria-expanded="mobileOpen">
                    <i class="fas text-xl" :class="mobileOpen ? 'fa-xmark' : 'fa-bars'" aria-hidden="true"></i>
                </button>
            </div>

            <div x-show="mobileOpen" x-cloak x-transition class="flex flex-col gap-1 border-t border-[#f1ece6] py-3 md:hidden">
                <a href="{{ route('home') }}" class="rounded px-2 py-2 font-semibold {{ request()->routeIs('home') ? 'text-[#d95d3f]' : 'text-slate-700' }}">Home</a>
                <a href="{{ route('home') }}#featured-products" class="rounded px-2 py-2 font-semibold text-slate-700">Shop</a>
                <a href="{{ route('browse.pets') }}" class="rounded px-2 py-2 font-semibold {{ request()->routeIs('browse.pets', 'pets.show') ? 'text-[#d95d3f]' : 'text-slate-700' }}">Adoption</a>
                <a href="{{ route('contact') }}" class="rounded px-2 py-2 font-semibold {{ request()->routeIs('contact') ? 'text-[#d95d3f]' : 'text-slate-700' }}">Services</a>
                <a href="{{ route('about') }}" class="rounded px-2 py-2 font-semibold {{ request()->routeIs('about') ? 'text-[#d95d3f]' : 'text-slate-700' }}">About</a>
                <div class="mt-2 flex items-center gap-6 border-t border-[#f1ece6] px-2 pt-3">
                    <a href="{{ route('browse.pets') }}" class="text-slate-700" aria-label="Search pets"><i class="fas fa-magnifying-glass" aria-hidden="true"></i></a>
                    <a href="{{ auth()->check() ? (auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard')) : route('login') }}" class="text-slate-700" aria-label="Account"><i class="far fa-user" aria-hidden="true"></i></a>
                    <a href="{{ route('home') }}#featured-products" class="text-slate-700" aria-label="Shop products"><i class="fas fa-cart-shopping" aria-hidden="true"></i></a>
                </div>
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