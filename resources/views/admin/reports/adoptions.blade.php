@extends('layouts.admin')

@section('header', 'Adoptions Report')

@section('content')

<!-- FILTERS -->
<div class="bg-white rounded-lg shadow-lg p-6 mb-6">
    <h3 class="text-lg font-bold mb-4">Filters</h3>
    <form method="GET" action="{{ route('admin.reports.adoptions') }}" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block font-semibold text-sm mb-2">Status</label>
                <select name="status" class="w-full border rounded-lg p-2">
                    <option value="">All Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
            <div>
                <label class="block font-semibold text-sm mb-2">From Date</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}" class="w-full border rounded-lg p-2">
            </div>
            <div>
                <label class="block font-semibold text-sm mb-2">To Date</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}" class="w-full border rounded-lg p-2">
            </div>
            <div class="flex items-end gap-2">
                <button type="submit" class="flex-1 bg-blue-600 text-white p-2 rounded-lg font-bold hover:bg-blue-700">Filter</button>
                <a href="{{ route('admin.reports.adoptions') }}" class="flex-1 bg-gray-400 text-white p-2 rounded-lg font-bold hover:bg-gray-500 text-center">Reset</a>
            </div>
        </div>
    </form>
</div>

<!-- EXPORT BUTTON -->
<div class="mb-6">
    <a href="{{ route('admin.reports.exportAdoptions') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-green-700 inline-flex items-center gap-2">
        <i class="fas fa-download"></i> Export as CSV
    </a>
</div>

<!-- ADOPTIONS TABLE -->
<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <table class="w-full">
        <thead class="bg-gradient-to-r from-purple-600 to-purple-700 text-white">
            <tr>
                <th class="px-6 py-4 text-left text-sm font-bold">ID</th>
                <th class="px-6 py-4 text-left text-sm font-bold">User</th>
                <th class="px-6 py-4 text-left text-sm font-bold">Email</th>
                <th class="px-6 py-4 text-left text-sm font-bold">Pet</th>
                <th class="px-6 py-4 text-left text-sm font-bold">Status</th>
                <th class="px-6 py-4 text-left text-sm font-bold">Date</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($adoptions as $adoption)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $adoption->id }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $adoption->user->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $adoption->user->email }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700 font-semibold">{{ $adoption->pet->name }}</td>
                    <td class="px-6 py-4 text-sm">
                        @if($adoption->status == 'pending')
                            <span class="inline-block bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">Pending</span>
                        @elseif($adoption->status == 'approved')
                            <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">Approved</span>
                        @else
                            <span class="inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">Rejected</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $adoption->created_at->format('M d, Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        <p class="text-lg font-semibold">No adoptions found</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- PAGINATION -->
<div class="mt-8">
    {{ $adoptions->links() }}
</div>

@endsection
