<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Pet Adoption System') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex">

    <!-- SIDEBAR --><!-- SIDEBAR -->
<a href="{{ route('dashboard') }}"
    class="hover:bg-gray-700 p-2 rounded">🏠 Dashboard</a>

<a href="{{ route('admin.pets.index') }}"
    class="hover:bg-gray-700 p-2 rounded">🐾 Pets</a>

<a href="{{ route('admin.pets.create') }}"
    class="hover:bg-gray-700 p-2 rounded">➕ Add Pet</a>

<a href="{{ route('admin.adoptions') }}"
    class="hover:bg-gray-700 p-2 rounded">📥 Adoption Requests</a>

<a href="{{ url('/') }}"
    class="hover:bg-gray-700 p-2 rounded">🌐 View Website</a>


    <form action="{{ route('logout') }}" method="POST" class="mt-auto">
        @csrf
        <button class="w-full bg-red-600 p-2 rounded hover:bg-red-700">
            🚪 Logout
        </button>
    </form>
</aside>


        <form action="{{ route('logout') }}" method="POST" class="mt-auto">
            @csrf
            <button class="w-full bg-red-600 p-2 rounded hover:bg-red-700">
                🚪 Logout
            </button>
        </form>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-6">
        @if (isset($header))
            <header class="mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">
                    {{ $header }}
                </h1>
            </header>
        @endif

        <div>
            {{ $slot }}
        </div>
    </main>

</body>
</html>
