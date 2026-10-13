@extends('layouts.admin')

@section('header', 'All Adoption Requests')

@section('content')
<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gradient-to-r from-blue-600 to-blue-700 text-white">
                <tr>
                    <th class="px-6 py-4 text-left font-semibold">User</th>
                    <th class="px-6 py-4 text-left font-semibold">Pet</th>
                    <th class="px-6 py-4 text-left font-semibold">Status</th>
                    <th class="px-6 py-4 text-center font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($requests as $req)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-gray-900 font-semibold">{{ $req->user->name }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-semibold text-sm">{{ $req->pet->name }}</span>
                    </td>
                    <td class="px-6 py-4">
                        @if($req->status === 'pending')
                            <span class="inline-block bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full font-semibold text-xs uppercase">Pending</span>
                        @elseif($req->status === 'approved')
                            <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold text-xs uppercase">Approved</span>
                        @else
                            <span class="inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full font-semibold text-xs uppercase">Rejected</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        @if($req->status === 'pending')
                            <form action="{{ route('admin.adoptions.approve', $req->id) }}" method="POST" class="inline">
                                @csrf
                                <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg font-bold text-sm transition"><i class="fas fa-check"></i> Approve</button>
                            </form>
                            <form action="{{ route('admin.adoptions.reject', $req->id) }}" method="POST" class="inline">
                                @csrf
                                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-bold text-sm transition"><i class="fas fa-xmark"></i> Reject</button>
                            </form>
                        @else
                            <span class="text-gray-500 text-sm">-</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center">
                        <i class="fas fa-inbox text-5xl text-gray-300 mb-3"></i>
                        <p class="text-xl font-semibold text-gray-600">No adoption requests found</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
