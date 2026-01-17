@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">All Pets</h2>
            <p class="text-gray-600 mt-1">Manage and organize all pets in the system</p>
        </div>
        <a href="{{ route('admin.pets.create') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-bold shadow-lg">
            ➕ Add New Pet
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-6 py-4 rounded-lg shadow-md" role="alert">
            <p class="font-bold">Success!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-600 to-blue-700 text-white">
                        <th class="px-6 py-4 text-left font-semibold">#</th>
                        <th class="px-6 py-4 text-left font-semibold">Image</th>
                        <th class="px-6 py-4 text-left font-semibold">Pet Info</th>
                        <th class="px-6 py-4 text-left font-semibold">Details</th>
                        <th class="px-6 py-4 text-left font-semibold">Availability</th>
                        <th class="px-6 py-4 text-left font-semibold">Price</th>
                        <th class="px-6 py-4 text-center font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($pets as $pet)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-6 py-4 text-gray-800 font-medium">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                @if($pet->image_url)
                                    <img src="{{ str_starts_with($pet->image_url, 'http') ? $pet->image_url : asset('storage/' . $pet->image_url) }}" 
                                         alt="{{ $pet->name }}" class="h-14 w-14 rounded-lg object-cover border-2 border-gray-300 shadow-sm">
                                @else
                                    <div class="h-14 w-14 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400">
                                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-bold text-gray-900 text-lg">{{ $pet->name }}</p>
                                <p class="text-sm text-gray-500">{{ $pet->breed ?? 'No breed specified' }}</p>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <p><span class="font-semibold text-gray-700">Type:</span> {{ $pet->petType->name ?? $pet->species ?? 'N/A' }}</p>
                                <p><span class="font-semibold text-gray-700">Age:</span> {{ $pet->age }} years</p>
                                <p><span class="font-semibold text-gray-700">Gender:</span> {{ ucfirst($pet->gender) }}</p>
                            </td>
                            <td class="px-6 py-4">
                                @if($pet->availability == 'both')
                                    <span class="inline-block bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-bold">Both</span>
                                @elseif($pet->availability == 'adoption')
                                    <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">Adoption</span>
                                @else
                                    <span class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">Sale</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-900 font-bold text-lg">
                                {{ $pet->price ? 'KSH ' . number_format($pet->price, 0) : '—' }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2 justify-center">
                                    <a href="{{ route('admin.pets.edit', $pet->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition font-bold text-sm shadow-md">
                                        ✏️ Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                                <p class="text-xl font-semibold text-gray-600">No pets found</p>
                                <p class="text-gray-500 mt-2">
                                    <a href="{{ route('admin.pets.create') }}" class="text-blue-600 hover:text-blue-700 font-bold">Create your first pet →</a>
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
