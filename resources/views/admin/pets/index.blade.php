@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-bold mb-6">All Pets</h2>

@if(session('success'))
    <div class="bg-green-200 p-3 mb-4 rounded text-green-800">{{ session('success') }}</div>
@endif

<table class="w-full table-auto border">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2 border">#</th>
            <th class="p-2 border">Name</th>
            <th class="p-2 border">Type</th>
            <th class="p-2 border">Age</th>
            <th class="p-2 border">Gender</th>
            <th class="p-2 border">Price (Ksh)</th>
            <th class="p-2 border">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pets as $pet)
            <tr class="text-center">
                <td class="p-2 border">{{ $loop->iteration }}</td>
                <td class="p-2 border">{{ $pet->name }}</td>
                <td class="p-2 border">{{ $pet->petType->name ?? 'N/A' }}</td>
                <td class="p-2 border">{{ $pet->age }}</td>
                <td class="p-2 border">{{ ucfirst($pet->gender) }}</td>
                <td class="p-2 border">{{ number_format($pet->price, 2) }}</td>
                <td class="p-2 border flex justify-center gap-2">
                    <a href="{{ route('admin.pets.edit', $pet->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">Edit</a>
                    <form action="{{ route('admin.pets.destroy', $pet->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
