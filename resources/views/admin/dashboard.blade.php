{{-- @extends('layouts.admin')

@section('header', 'Dashboard')

@section('content')

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow-md p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 font-semibold text-sm uppercase tracking-wide">Total Users</p>
                <p class="text-4xl font-bold text-gray-900 mt-2">{{ $totalUsers }}</p>
            </div>
            <span class="text-5xl text-blue-200">👥</span>
        </div>
    </div>

    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg shadow-md p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 font-semibold text-sm uppercase tracking-wide">Total Pets</p>
                <p class="text-4xl font-bold text-gray-900 mt-2">{{ $totalPets }}</p>
            </div>
            <span class="text-5xl text-green-200">🐾</span>
        </div>
    </div>

    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg shadow-md p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 font-semibold text-sm uppercase tracking-wide">Total Sales</p>
                <p class="text-4xl font-bold text-gray-900 mt-2">KSH {{ number_format($totalSales, 0) }}</p>
            </div>
            <span class="text-5xl text-purple-200">💰</span>
        </div>
    </div>

    <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-lg shadow-md p-6 border-l-4 border-orange-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 font-semibold text-sm uppercase tracking-wide">Quick Actions</p>
                <div class="mt-3 space-y-1">
                    <a href="{{ route('admin.pets.create') }}" class="block text-blue-600 hover:text-blue-700 font-semibold text-sm">+ Add Pet</a>
                </div>
            </div>
            <span class="text-5xl text-orange-200">⚡</span>
        </div>
    </div>
</div>

<!-- Recent Adoption Requests -->
<div class="bg-white shadow-lg rounded-lg p-6 mb-8">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-gray-900">Recent Adoption Requests</h3>
        <a href="{{ route('admin.adoptions') }}" class="text-blue-600 hover:text-blue-700 font-semibold text-sm">View All →</a>
    </div>
    
    @if($adoptionRequests->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-500 text-lg">No pending adoption requests</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-50 to-blue-100 border-b-2 border-blue-200">
                        <th class="px-6 py-3 text-left font-bold text-gray-700">User</th>
                        <th class="px-6 py-3 text-left font-bold text-gray-700">Pet</th>
                        <th class="px-6 py-3 text-left font-bold text-gray-700">Status</th>
                        <th class="px-6 py-3 text-center font-bold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($adoptionRequests as $req)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3 text-gray-900 font-semibold">{{ $req->user->name }}</td>
                        <td class="px-6 py-3 text-gray-700">
                            <span class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-semibold text-sm">{{ $req->pet->name }}</span>
                        </td>
                        <td class="px-6 py-3">
                            @if($req->status === 'pending')
                                <span class="inline-block bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full font-semibold text-xs uppercase">Pending</span>
                            @elseif($req->status === 'approved')
                                <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold text-xs uppercase">Approved</span>
                            @else
                                <span class="inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full font-semibold text-xs uppercase">Rejected</span>
                            @endif
                        </td>
                        <td class="px-6 py-3 text-center space-x-2">
                            @if($req->status === 'pending')
                                <form action="{{ route('admin.adoptions.approve', $req->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-bold text-sm transition">✓ Approve</button>
                                </form>
                                <form action="{{ route('admin.adoptions.reject', $req->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-bold text-sm transition">✕ Reject</button>
                                </form>
                            @else
                                <span class="text-gray-500 text-sm">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Quick Links -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <a href="{{ route('admin.pets.index') }}" class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition border-t-4 border-blue-500">
        <div class="text-4xl mb-3">🐾</div>
        <h4 class="text-xl font-bold text-gray-900">Manage Pets</h4>
        <p class="text-gray-600 text-sm mt-2">Edit, delete, or view all pets in the system</p>
        <span class="text-blue-600 font-bold text-sm mt-3 inline-block">Go to Pets →</span>
    </a>

    <a href="{{ route('admin.users') }}" class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition border-t-4 border-green-500">
        <div class="text-4xl mb-3">👥</div>
        <h4 class="text-xl font-bold text-gray-900">Manage Users</h4>
        <p class="text-gray-600 text-sm mt-2">View all registered users and their activity</p>
        <span class="text-green-600 font-bold text-sm mt-3 inline-block">Go to Users →</span>
    </a>

    <a href="{{ route('admin.reports.index') }}" class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition border-t-4 border-purple-500">
        <div class="text-4xl mb-3">📊</div>
        <h4 class="text-xl font-bold text-gray-900">View Reports</h4>
        <p class="text-gray-600 text-sm mt-2">Check sales, adoptions, and user analytics</p>
        <span class="text-purple-600 font-bold text-sm mt-3 inline-block">Go to Reports →</span>
    </a>
</div>

@endsection --}}
