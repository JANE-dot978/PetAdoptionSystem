@extends('layouts.admin')

@section('header', 'Users')

@section('content')

<div class="bg-white shadow p-6 rounded-lg">
    <h2 class="text-xl font-bold mb-4">All Users</h2>
    <table class="w-full table-auto">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4">Name</th>
                <th class="py-2 px-4">Email</th>
                <th class="py-2 px-4">Joined</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-b">
                <td class="py-2 px-4">{{ $user->name }}</td>
                <td class="py-2 px-4">{{ $user->email }}</td>
                <td class="py-2 px-4">{{ $user->created_at->format('M d, Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
