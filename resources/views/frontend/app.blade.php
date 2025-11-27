<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pet Adoption System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600">PetAdopt</a>

        <div class="space-x-6">
            <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
            <a href="{{ route('about') }}" class="hover:text-blue-600">About</a>
            <a href="{{ route('browse.pets') }}" class="hover:text-blue-600">Browse Pets</a>
            <a href="{{ route('contact') }}" class="hover:text-blue-600">Contact</a>

            @guest
                <a href="{{ route('login') }}" class="text-blue-600 font-semibold">Login</a>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-3 py-1 rounded">Register</a>
            @endguest

           @auth
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}" class="text-blue-600 font-semibold">Dashboard</a>
    @else
        <a href="{{ route('dashboard') }}" class="text-blue-600 font-semibold">Dashboard</a>
    @endif

    <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf
        <button class="text-red-500 hover:text-red-700">Logout</button>
    </form>
@endauth

        </div>
    </nav>

    <!-- Page Content -->
    <main class="p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white mt-12 p-6 text-center shadow-md">
        <p>© {{ date('Y') }} Pet Adoption System. All Rights Reserved.</p>
    </footer>

</body>
</html>
