@extends('frontend.app')

@section('content')
<div class="container mx-auto px-4 py-16">
    <div class="bg-white shadow-lg rounded-xl p-6 max-w-3xl mx-auto">

        {{-- Success/Error Messages --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <h1 class="text-3xl font-bold mb-4">{{ $pet->name }}</h1>

        <img src="{{ $pet->image_url }}" class="w-full h-64 object-cover rounded-lg mb-6">

        <p class="text-lg text-gray-700">
            Species: {{ $pet->species }} <br>
            Age: {{ $pet->age }} years <br>
            Gender: {{ ucfirst($pet->gender) }}
        </p>

        @if($pet->availability == 'sale' || $pet->availability == 'both')
            <p class="text-green-700 font-bold text-xl mt-4">
                Price: ${{ $pet->price }}
            </p>
        @endif

        <div class="mt-6 flex gap-4">

            {{-- Adopt Form --}}
            @if($pet->availability == 'adoption' || $pet->availability == 'both')
                <form action="{{ route('pets.finalizeAdoption', $pet->id) }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg w-full">
                        Confirm Adoption
                    </button>
                </form>
            @endif

            {{-- Buy Form --}}
            @if($pet->availability == 'sale' || $pet->availability == 'both')
                <form action="{{ route('pets.finalizeBuy', $pet->id) }}" method="POST" class="flex-1">
                    @csrf
                    <input type="text" name="phone" placeholder="Mpesa Phone Number" class="border p-2 rounded w-full mb-2" required>
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg w-full">
                        Confirm Purchase
                    </button>
                </form>
            @endif

        </div>

        <div class="mt-6">
            <a href="{{ route('browse.pets') }}" class="text-blue-600 underline">Back to Browse Pets</a>
        </div>
    </div>
</div>
@endsection
