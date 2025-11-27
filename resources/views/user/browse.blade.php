@extends('layouts.app')

@section('title', 'Browse Pets')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Available Pets</h1>

    <div class="grid grid-cols-3 gap-6">
        @foreach($pets as $pet)
            <div class="bg-white p-4 shadow rounded">
                <img src="{{ asset('storage/' . $pet->image) }}" class="w-full h-48 object-cover rounded mb-2">
                <h2 class="font-bold">{{ $pet->name }}</h2>
                <p>Species: {{ $pet->petType->name }}</p>
                <p>Age: {{ $pet->age }} years</p>
                <form action="{{ route('adopt.pet', $pet->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="mt-2 bg-green-500 text-white px-4 py-2 rounded">Adopt</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
