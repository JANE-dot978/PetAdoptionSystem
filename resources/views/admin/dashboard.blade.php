@extends('layouts.admin')

@section('header', 'Admin Dashboard')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold">Total Users</h3>
        <p class="text-3xl mt-2">{{ $totalUsers }}</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold">Total Pets</h3>
        <p class="text-3xl mt-2">{{ $totalPets }}</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold">Total Sales</h3>
        <p class="text-3xl mt-2">${{ $totalSales }}</p>
    </div>
</div>

<div class="bg-white shadow rounded-lg mt-8 p-6">
    <h3 class="text-xl font-bold mb-4">Recent Adoption Requests</h3>
    <table class="w-full table-auto">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4">User</th>
                <th class="py-2 px-4">Pet</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adoptionRequests as $req)
            <tr class="border-b">
                <td class="py-2 px-4">{{ $req->user->name }}</td>
                <td class="py-2 px-4">{{ $req->pet->name }}</td>
                <td class="py-2 px-4">{{ ucfirst($req->status) }}</td>
                <td class="py-2 px-4 space-x-2">
                    <form action="{{ route('admin.adoptions.approve', $req->id) }}" method="POST" class="inline">
                        @csrf
                        <button class="bg-green-600 text-white px-3 py-1 rounded">Approve</button>
                    </form>
                    <form action="{{ route('admin.adoptions.reject', $req->id) }}" method="POST" class="inline">
                        @csrf
                        <button class="bg-red-600 text-white px-3 py-1 rounded">Reject</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
