<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Pet Adoption Admin') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 8px;
            text-decoration: none;
            color: #1e293b;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: #3b82f6;
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .nav-item:hover {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(59, 130, 246, 0.05) 100%);
            padding-left: 20px;
        }

        .nav-item:hover::before {
            transform: scaleY(1);
        }

        .nav-item.active {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
        }

        .nav-item.active::before {
            transform: scaleY(1);
        }

        .sidebar-icon {
            font-size: 1.25rem;
            min-width: 24px;
        }

        .admin-wrapper {
            display: flex;
            width: 100%;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
        }

        .admin-sidebar {
            width: 288px;
            background: white;
            border-right: 1px solid #e5e7eb;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            flex-shrink: 0;
        }

        .admin-main {
            flex: 1;
            overflow-y: auto;
            background: #f9fafb;
            padding: 2rem;
            margin-left: 0;
        }
    </style>
</head>
<body class="bg-gray-50">

    <div class="admin-wrapper">
        <!-- SIDEBAR -->
        <aside class="admin-sidebar p-6">
            <!-- Logo -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-center text-blue-600 flex items-center justify-center gap-2">
                    <span class="text-3xl">🐾</span>
                    <span>Admin</span>
                </h2>
            </div>

            <!-- Navigation -->
            <nav class="flex flex-col gap-2">
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="sidebar-icon">🏠</span>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.pets.index') }}" class="nav-item {{ request()->routeIs('admin.pets.*') ? 'active' : '' }}">
                    <span class="sidebar-icon">🐾</span>
                    <span>Manage Pets</span>
                </a>
                <a href="{{ route('admin.pets.create') }}" class="nav-item {{ request()->routeIs('admin.pets.create') ? 'active' : '' }}">
                    <span class="sidebar-icon">➕</span>
                    <span>Add New Pet</span>
                </a>
                <a href="{{ route('admin.adoptions') }}" class="nav-item {{ request()->routeIs('admin.adoptions') ? 'active' : '' }}">
                    <span class="sidebar-icon">📥</span>
                    <span>Adoption Requests</span>
                </a>
                <a href="{{ route('admin.users') }}" class="nav-item {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                    <span class="sidebar-icon">👤</span>
                    <span>Users</span>
                </a>
                <a href="{{ route('admin.reports.index') }}" class="nav-item {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">
                    <span class="sidebar-icon">📊</span>
                    <span>Reports</span>
                </a>
            </nav>

            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST" class="pt-6 border-t border-gray-200 mt-auto">
                @csrf
                <button class="w-full nav-item bg-red-50 hover:bg-red-100 text-red-600 font-bold transition justify-center gap-2">
                    <span class="sidebar-icon">🚪</span>
                    <span>Logout</span>
                </button>
            </form>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="admin-main">
            @isset($header)
                <h1 class="text-4xl font-bold mb-8 text-gray-900">{{ $header }}</h1>
            @endisset

            @yield('content')
        </main>
    </div>

</body>
</html>
