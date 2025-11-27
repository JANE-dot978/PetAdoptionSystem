@extends('layouts.admin')

@section('header', 'Users Report')

@section('content')

<!-- SEARCH -->
<div class="bg-white rounded-lg shadow-lg p-6 mb-6">
    <h3 class="text-lg font-bold mb-4">Search Users</h3>
    <form method="GET" action="{{ route('admin.reports.users') }}" class="space-y-4">
        <div class="flex gap-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or email..." class="flex-1 border rounded-lg p-2">
            <button type="submit" class="bg-blue-600 text-white px-6 rounded-lg font-bold hover:bg-blue-700">Search</button>
            <a href="{{ route('admin.reports.users') }}" class="bg-gray-400 text-white px-6 rounded-lg font-bold hover:bg-gray-500">Reset</a>
        </div>
    </form>
</div>

<!-- USERS TABLE -->
<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <table class="w-full">
        <thead class="bg-gradient-to-r from-green-600 to-green-700 text-white">
            <tr>
                <th class="px-6 py-4 text-left text-sm font-bold">ID</th>
                <th class="px-6 py-4 text-left text-sm font-bold">Name</th>
                <th class="px-6 py-4 text-left text-sm font-bold">Email</th>
                <th class="px-6 py-4 text-left text-sm font-bold">Phone</th>
                <th class="px-6 py-4 text-left text-sm font-bold">Purchases</th>
                <th class="px-6 py-4 text-left text-sm font-bold">Adoptions</th>
                <th class="px-6 py-4 text-left text-sm font-bold">Joined</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($users as $user)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $user->id }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white text-xs font-bold">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            {{ $user->name }}
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $user->phone ?? 'N/A' }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">
                            {{ $user->purchases->count() }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-block bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-bold">
                            {{ $user->adoptions->count() }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $user->created_at->format('M d, Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                        <p class="text-lg font-semibold">No users found</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- PAGINATION -->
<div class="mt-8">
    {{ $users->links() }}
</div>

@endsection
