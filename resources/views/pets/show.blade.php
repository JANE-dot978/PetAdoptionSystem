@extends('frontend.app')

@section('content')

<div class="page-container py-10 max-w-4xl">

    <a href="{{ route('browse.pets') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-blue-600 font-semibold mb-6 transition">
        <i class="fas fa-arrow-left"></i> Back to Browse
    </a>

    <div class="card overflow-hidden">

        <!-- IMAGE + AVAILABILITY BADGES -->
        <div class="relative">
            <img src="{{ str_starts_with($pet->image_url, 'http') ? $pet->image_url : asset('storage/' . $pet->image_url) }}"
                 alt="{{ $pet->name }}"
                 onerror="this.src='https://placehold.co/800x500?text=Pet+Image'"
                 class="w-full h-80 md:h-96 object-cover">
            <div class="absolute top-4 right-4 flex gap-2">
                @if(in_array($pet->availability, ['adoption', 'both']))
                    <span class="badge-adopt shadow"><i class="fas fa-paw"></i> ADOPT</span>
                @endif
                @if(in_array($pet->availability, ['sale', 'both']))
                    <span class="badge-buy shadow"><i class="fas fa-tag"></i> BUY</span>
                @endif
            </div>
        </div>

        <div class="p-8">
            <h1 class="text-3xl md:text-4xl font-black text-gray-900 mb-2">{{ $pet->name }}</h1>
            @if($pet->breed)
                <p class="text-gray-500 font-medium mb-6">{{ $pet->breed }}</p>
            @endif

            <!-- STATS GRID -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-blue-50 p-4 rounded-xl text-center">
                    <p class="text-gray-500 font-semibold text-xs uppercase">Age</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $pet->age }} yrs</p>
                </div>
                <div class="bg-green-50 p-4 rounded-xl text-center">
                    <p class="text-gray-500 font-semibold text-xs uppercase">Gender</p>
                    <p class="text-2xl font-bold text-gray-900">{{ ucfirst($pet->gender) }}</p>
                </div>
                <div class="bg-blue-50 p-4 rounded-xl text-center">
                    <p class="text-gray-500 font-semibold text-xs uppercase">Species</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $pet->species ?: 'N/A' }}</p>
                </div>
                <div class="bg-green-50 p-4 rounded-xl text-center">
                    <p class="text-gray-500 font-semibold text-xs uppercase">Weight</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $pet->weight ? $pet->weight . ' kg' : 'N/A' }}</p>
                </div>
            </div>

            @if($pet->color)
                <div class="bg-gray-50 p-4 rounded-xl mb-6">
                    <p class="text-gray-500 font-semibold mb-1">Color</p>
                    <p class="text-gray-900">{{ $pet->color }}</p>
                </div>
            @endif

            @php
                $healthStatus = [];
                if ($pet->vaccinated === 'yes') $healthStatus[] = 'Vaccinated';
                if ($pet->neutered_spayed === 'yes') $healthStatus[] = 'Neutered/Spayed';
            @endphp
            @if(count($healthStatus))
                <div class="bg-green-50 border border-green-200 p-4 rounded-xl mb-6">
                    <p class="text-gray-700 font-semibold mb-2">Health Status</p>
                    <div class="flex flex-wrap gap-3">
                        @foreach($healthStatus as $status)
                            <span class="text-green-700 font-semibold flex items-center gap-1"><i class="fas fa-circle-check"></i> {{ $status }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($pet->special_needs)
                <div class="bg-amber-50 border border-amber-200 p-4 rounded-xl mb-6">
                    <p class="text-gray-700 font-semibold mb-1">Special Needs</p>
                    <p class="text-gray-900">{{ $pet->special_needs }}</p>
                </div>
            @endif

            @if($pet->detailed_description ?: $pet->description)
                <div class="bg-blue-50 border border-blue-200 p-4 rounded-xl mb-8">
                    <p class="text-gray-700 font-semibold mb-2">About {{ $pet->name }}</p>
                    <p class="text-gray-900 leading-relaxed">{{ $pet->detailed_description ?: $pet->description }}</p>
                </div>
            @endif

            @if(in_array($pet->availability, ['sale', 'both']) && $pet->price)
                <div class="bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-xl border-2 border-green-200 mb-8">
                    <p class="text-gray-600 font-semibold mb-1">Asking Price</p>
                    <p class="text-4xl font-black text-green-700">KSH {{ number_format($pet->price) }}</p>
                </div>
            @endif

            <!-- ACTIONS -->
            <div class="flex flex-col sm:flex-row gap-4">
                @if(in_array($pet->availability, ['adoption', 'both']))
                    <a href="{{ route('pets.process', $pet->id) }}" class="btn-accent flex-1 !text-lg !py-3">
                        <i class="fas fa-paw"></i> Adopt This Pet
                    </a>
                @endif
                @if(in_array($pet->availability, ['sale', 'both']))
                    <a href="{{ route('pets.process', $pet->id) }}" class="btn-primary flex-1 !text-lg !py-3">
                        <i class="fas fa-credit-card"></i> Buy Now
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
