@extends('frontend.app')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-3xl">

    <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">
        {{ ucfirst($action) }} — Terms & Conditions
    </h2>

    <div class="bg-white p-6 rounded-2xl shadow-xl">
        <h3 class="text-xl font-semibold mb-4">Before you proceed:</h3>

        <ul class="list-disc space-y-2 ml-6 text-gray-700">
            <li>You must be 18 years or older.</li>
            <li>You agree to provide proper care, food, shelter, and healthcare.</li>
            <li>We may conduct a verification check if needed.</li>
            <li>Adoption fee (if any) is non–refundable.</li>
            <li>Returned pets must follow our return policy.</li>
        </ul>

        <div class="mt-8 flex justify-between">
            <a href="{{ route('browse.pets') }}" class="text-gray-700 underline">Back</a>

            <a href="{{ route('pets.process', ['id' => $pet->id, 'action' => $action]) }}"
               class="bg-blue-700 text-white px-6 py-3 rounded-xl font-bold hover:bg-blue-800">
                I Agree — Continue
            </a>
        </div>
    </div>

</div>
@endsection
