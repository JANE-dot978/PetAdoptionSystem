@extends('layouts.admin')

@section('content')

<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900">Users Management</h2>
        <p class="text-gray-600 mt-1">View and manage all registered users</p>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
        <!-- Table Header -->
        <div class="bg-gradient-to-r from-blue-50 to-blue-100 px-8 py-4 border-b border-gray-200">
            <p class="text-lg font-bold text-gray-900">All Users</p>
        </div>

        <!-- Table -->
        @if($users->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="px-8 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">#</th>
                            <th class="px-8 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">Name</th>
                            <th class="px-8 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">Email</th>
                            <th class="px-8 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">Member Since</th>
                            <th class="px-8 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-8 py-4 text-gray-900 font-semibold">{{ $user->id }}</td>
                                <td class="px-8 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white font-bold text-sm">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="text-gray-900 font-semibold">{{ $user->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-4 text-gray-600">{{ $user->email }}</td>
                                <td class="px-8 py-4 text-gray-600 text-sm">{{ $user->created_at->format('M d, Y') }}</td>
                                <td class="px-8 py-4">
                                    <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-bold">Active</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-16 px-8">
                <div class="text-gray-300 text-6xl mb-4">👤</div>
                <p class="text-xl font-bold text-gray-600 mb-2">No Users Found</p>
                <p class="text-gray-500">There are currently no users registered in the system.</p>
            </div>
        @endif

        <!-- Footer with Stats -->
        @if($users->count() > 0)
            <div class="bg-gray-50 px-8 py-4 border-t border-gray-200 flex justify-between items-center">
                <p class="text-sm text-gray-600 font-semibold">Total Users: <span class="text-blue-600 font-bold">{{ $users->count() }}</span></p>
                <p class="text-xs text-gray-500">Last updated: {{ now()->format('M d, Y H:i') }}</p>
            </div>
        @endif
    </div>
</div>

@endsection
