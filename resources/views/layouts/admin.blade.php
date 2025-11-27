<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Pet Adoption Admin') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-blue-50 min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-blue-300 text-black flex flex-col p-6 shadow-lg">
        <h2 class="text-3xl font-bold mb-10 text-center text-blue-900">🐾 Admin Panel</h2>

        <nav class="flex flex-col gap-3">
            <a href="{{ route('admin.dashboard') }}" class="p-3 hover:bg-blue-400 rounded font-semibold">🏠 Dashboard</a>
            <a href="{{ route('admin.pets.index') }}" class="p-3 hover:bg-blue-400 rounded font-semibold">🐾 Pets</a>
            <a href="{{ route('admin.pets.create') }}" class="p-3 hover:bg-blue-400 rounded font-semibold">➕ Add Pet</a>
            <a href="{{ route('admin.adoptions') }}" class="p-3 hover:bg-blue-400 rounded font-semibold">📥 Adoption Requests</a>
            <a href="{{ route('admin.users') }}" class="p-3 hover:bg-blue-400 rounded font-semibold">👤 Users</a>
            <a href="{{ route('admin.reports.index') }}" class="p-3 hover:bg-blue-400 rounded font-semibold">📊 Reports</a>
        </nav>

        <form action="{{ route('logout') }}" method="POST" class="mt-auto">
            @csrf
            <button class="w-full bg-red-600 p-3 rounded hover:bg-red-700 transition font-semibold text-white">
                🚪 Logout
            </button>
        </form>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8 bg-blue-50">
        @isset($header)
            <h1 class="text-3xl font-bold mb-6 text-blue-900">{{ $header }}</h1>
        @endisset

        @yield('content')
    </main>

</body>
</html>
