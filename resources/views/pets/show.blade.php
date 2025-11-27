@extends('frontend.app')

@section('content')

<div class="container mx-auto px-4 py-16">
    <div class="bg-white shadow-lg rounded-xl p-6">
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

            {{-- Adopt --}}
            @if($pet->availability == 'adoption' || $pet->availability == 'both')
                <a href="{{ route('pets.process', $pet->id) }}"
                   class="bg-blue-600 text-white px-6 py-2 rounded-lg">
                    Adopt This Pet
                </a>
            @endif

            {{-- Buy --}}
            @if($pet->availability == 'sale' || $pet->availability == 'both')
                <a href="{{ route('pets.process', $pet->id) }}"
                   class="bg-green-600 text-white px-6 py-2 rounded-lg">
                    Buy Now
                </a>
            @endif
        </div>

    </div>
</div>

@endsection
