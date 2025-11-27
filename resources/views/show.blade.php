@extends('frontend.app')

@section('content')
<div class="container mx-auto px-4 py-16">

    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $pet->name }}</h1>

        <img src="{{ $pet->image_url }}" alt="{{ $pet->name }}"
             class="w-full h-64 object-cover rounded-lg mb-6">

        <p class="text-gray-700 mb-4">
            <strong>Species:</strong> {{ $pet->species }} <br>
            <strong>Age:</strong> {{ $pet->age }} years <br>
            <strong>Gender:</strong> {{ ucfirst($pet->gender) }}
        </p>

        @if($pet->availability == 'sale' || $pet->availability == 'both')
            <p class="text-green-600 font-bold mb-4">
                Price: ${{ $pet->price }}
            </p>
        @endif

        <div class="flex gap-4">

            {{-- Adopt Button --}}
            @if($pet->availability == 'adoption' || $pet->availability == 'both')
                <a href="{{ route('adoption.request', $pet->id) }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                    Adopt This Pet
                </a>
            @endif

            {{-- Buy Button --}}
            @if($pet->availability == 'sale' || $pet->availability == 'both')
                <form action="{{ route('pets.buy', $pet->id) }}" method="POST">
                    @csrf
                    <button class="bg-green-600 text-white px-4 py-2 rounded-lg">
                        Buy Now
                    </button>
                </form>
            @endif

        </div>
    </div>

</div>
@endsection
