@extends('layouts.admin')

@section('header', 'All Adoption Requests')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h3 class="text-xl font-bold mb-4">All Adoption Requests</h3>

    <table class="w-full table-auto border">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 border-b">User</th>
                <th class="py-2 px-4 border-b">Pet</th>
                <th class="py-2 px-4 border-b">Status</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($requests as $req)
            <tr class="border-b">
                <td class="py-2 px-4">{{ $req->user->name }}</td>
                <td class="py-2 px-4">{{ $req->pet->name }}</td>
                <td class="py-2 px-4">
                    @if($req->status === 'pending')
                        <span class="text-yellow-600 font-semibold">Pending</span>
                    @elseif($req->status === 'approved')
                        <span class="text-green-600 font-semibold">Approved</span>
                    @elseif($req->status === 'rejected')
                        <span class="text-red-600 font-semibold">Rejected</span>
                    @endif
                </td>
                <td class="py-2 px-4 space-x-2">
                    @if($req->status === 'pending')
                        <form action="{{ route('admin.adoptions.approve', $req->id) }}" method="POST" class="inline">
                            @csrf
                            <button class="bg-green-600 text-white px-3 py-1 rounded">Approve</button>
                        </form>
                        <form action="{{ route('admin.adoptions.reject', $req->id) }}" method="POST" class="inline">
                            @csrf
                            <button class="bg-red-600 text-white px-3 py-1 rounded">Reject</button>
                        </form>
                    @else
                        <span class="text-gray-500">No actions</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="py-4 px-4 text-center">No adoption requests found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
