@extends('frontend.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-lg rounded-xl p-8 max-w-4xl mx-auto">

        {{-- Success/Error Messages --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Pet Image -->
            <div>
                <img src="{{ str_starts_with($pet->image_url, 'http') ? $pet->image_url : asset('storage/' . $pet->image_url) }}" 
                     alt="{{ $pet->name }}" 
                     onerror="this.src='https://placehold.co/600x400?text=Pet+Image'"
                     class="w-full h-96 object-cover rounded-lg shadow-lg">
            </div>

            <!-- Pet Details -->
            <div>
                <h1 class="text-4xl font-bold mb-4 text-gray-900">{{ $pet->name }}</h1>

                <!-- Info Grid -->
                <div class="space-y-4 mb-6">
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <p class="text-gray-600 font-semibold text-sm uppercase">Species</p>
                        <p class="text-gray-900 font-bold text-lg capitalize">{{ $pet->species ?? 'Not Specified' }}</p>
                    </div>

                    <div class="bg-pink-50 p-4 rounded-lg">
                        <p class="text-gray-600 font-semibold text-sm uppercase">Gender</p>
                        <p class="text-gray-900 font-bold text-lg capitalize">{{ $pet->gender }}</p>
                    </div>

                    <div class="bg-yellow-50 p-4 rounded-lg">
                        <p class="text-gray-600 font-semibold text-sm uppercase">Age</p>
                        <p class="text-gray-900 font-bold text-lg">{{ $pet->age }} years</p>
                    </div>

                    @if($pet->breed)
                    <div class="bg-green-50 p-4 rounded-lg">
                        <p class="text-gray-600 font-semibold text-sm uppercase">Breed</p>
                        <p class="text-gray-900 font-bold text-lg">{{ $pet->breed }}</p>
                    </div>
                    @endif

                    @if($pet->color)
                    <div class="bg-orange-50 p-4 rounded-lg">
                        <p class="text-gray-600 font-semibold text-sm uppercase">Color</p>
                        <p class="text-gray-900 font-bold text-lg">{{ $pet->color }}</p>
                    </div>
                    @endif

                    @if($pet->weight)
                    <div class="bg-purple-50 p-4 rounded-lg">
                        <p class="text-gray-600 font-semibold text-sm uppercase">Weight</p>
                        <p class="text-gray-900 font-bold text-lg">{{ $pet->weight }} kg</p>
                    </div>
                    @endif
                </div>

                <!-- Health Status -->
                <div class="bg-gray-50 p-4 rounded-lg mb-6 border border-gray-200">
                    <p class="text-gray-600 font-semibold text-sm uppercase mb-2">Health Status</p>
                    <div class="space-y-1">
                        <p class="text-gray-900">
                            <span class="font-semibold">Vaccinated:</span>
                            <span class="capitalize">{{ $pet->vaccinated ?? 'Unknown' }}</span>
                        </p>
                        <p class="text-gray-900">
                            <span class="font-semibold">Neutered/Spayed:</span>
                            <span class="capitalize">{{ $pet->neutered_spayed ?? 'Unknown' }}</span>
                        </p>
                        @if($pet->special_needs)
                        <p class="text-red-700 font-semibold">
                            <span>⚠️ Special Needs:</span>
                            <span>{{ $pet->special_needs }}</span>
                        </p>
                        @endif
                    </div>
                </div>

                <!-- Price -->
                @if($pet->availability == 'sale' || $pet->availability == 'both')
                    <div class="bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-lg border-2 border-green-300 mb-6">
                        <p class="text-gray-600 font-semibold text-sm uppercase">Asking Price</p>
                        <p class="text-4xl font-bold text-green-700">KSH {{ number_format($pet->price, 0) }}</p>
                    </div>
                @endif

                <!-- Action Buttons -->
                <div class="space-y-3">
                    {{-- Adopt Form --}}
                    @if($pet->availability == 'adoption' || $pet->availability == 'both')
                        <form action="{{ route('pets.finalizeAdoption', $pet->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 py-4 rounded-lg font-bold shadow-lg transition-all duration-300 text-lg">
                                Complete Adoption
                            </button>
                        </form>
                    @endif

                    {{-- Buy Form --}}
                    @if($pet->availability == 'sale' || $pet->availability == 'both')
                        <form action="{{ route('pets.finalizeBuy', $pet->id) }}" method="POST" class="space-y-3">
                            @csrf
                            <input type="text" name="phone" placeholder="M-Pesa Phone Number" class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-4 rounded-lg font-bold shadow-lg transition-all duration-300 text-lg">
                                Complete Purchase (M-Pesa)
                            </button>
                        </form>
                    @endif

                    <a href="{{ route('browse.pets') }}" class="block text-center bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                        Back to Browse Pets
                    </a>
                </div>
            </div>
        </div>

        <!-- Detailed Description -->
        @if($pet->detailed_description)
        <div class="mt-12 pt-8 border-t border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">About {{ $pet->name }}</h2>
            <div class="bg-blue-50 p-6 rounded-lg border border-blue-200">
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $pet->detailed_description }}</p>
            </div>
        </div>
        @endif

        <!-- Short Description -->
        @if($pet->description && !$pet->detailed_description)
        <div class="mt-12 pt-8 border-t border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Description</h2>
            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                <p class="text-gray-700 leading-relaxed">{{ $pet->description }}</p>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
