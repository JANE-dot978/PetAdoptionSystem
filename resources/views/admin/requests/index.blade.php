@extends('layouts.admin')

@section('header', 'All Adoption Requests')

@section('content')

<div class="bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">All Adoption Requests</h2>

    <table class="w-full table-auto border">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 border">User</th>
                <th class="py-2 px-4 border">Pet</th>
                <th class="py-2 px-4 border">Status</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($requests as $req)
            <tr class="border-b">
                <td class="py-2 px-4 border">{{ $req->user->name }}</td>
                <td class="py-2 px-4 border">{{ $req->pet->name }}</td>
                <td class="py-2 px-4 border">{{ ucfirst($req->status) }}</td>

                <td class="py-2 px-4 border space-x-2">

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
                        <span class="text-gray-500 text-sm">No actions</span>
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
