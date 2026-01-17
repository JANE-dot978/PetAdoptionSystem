<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Pet Adoption System') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

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

    <!-- FOOTER LOGOUT -->
    <footer class="bg-white border-t border-gray-200 p-4 mt-auto">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="w-full bg-red-600 text-white p-3 rounded-lg hover:bg-red-700 transition font-bold">
                🚪 Logout
            </button>
        </form>
    </footer>

</body>
</html>
