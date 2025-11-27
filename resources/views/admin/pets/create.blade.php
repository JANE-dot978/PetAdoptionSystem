@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-bold mb-6">Add New Pet</h2>

@if($errors->any())
    <div class="bg-red-200 text-red-800 p-3 mb-4 rounded">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.pets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4" id="petForm">
    @csrf

    <div>
        <label class="block font-semibold">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="border p-2 w-full rounded" required>
    </div>

    <div>
        <label class="block font-semibold">Type</label>
        <select name="pet_type_id" class="border p-2 w-full rounded" required>
            <option value="">Select type</option>
            @foreach($petTypes as $type)
                <option value="{{ $type->id }}" {{ old('pet_type_id') == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-semibold">Age</label>
        <input type="number" name="age" value="{{ old('age') }}" class="border p-2 w-full rounded">
    </div>

    <div>
        <label class="block font-semibold">Gender</label>
        <select name="gender" class="border p-2 w-full rounded" required>
            <option value="">Select gender</option>
            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
        </select>
    </div>

    <div>
        <label class="block font-semibold">Availability</label>
        <select name="availability" class="border p-2 w-full rounded" required>
            <option value="">Select</option>
            <option value="adoption" {{ old('availability') == 'adoption' ? 'selected' : '' }}>Adoption</option>
            <option value="sale" {{ old('availability') == 'sale' ? 'selected' : '' }}>Sale</option>
            <option value="both" {{ old('availability') == 'both' ? 'selected' : '' }}>Both</option>
        </select>
    </div>

    <div>
        <label class="block font-semibold">Price (Ksh)</label>
        <input type="number" name="price" value="{{ old('price') }}" class="border p-2 w-full rounded" step="0.01">
    </div>

    <div>
        <label class="block font-semibold">Description</label>
        <textarea name="description" class="border p-2 w-full rounded">{{ old('description') }}</textarea>
    </div>

    <!-- IMAGE UPLOAD OR URL -->
    <div class="space-y-3">
        <label class="block font-semibold">Image Upload</label>
        <input type="file" name="image_file" class="border p-2 w-full rounded" accept="image/*">
        
        <p class="text-gray-600 text-sm">OR</p>
        
        <label class="block font-semibold">Image URL</label>
        <input type="text" name="image_url" value="{{ old('image_url') }}" class="border p-2 w-full rounded" placeholder="https://example.com/image.jpg">
        <p class="text-gray-500 text-xs">Paste a direct image URL if you don't want to upload a file</p>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" id="submitBtn">Add Pet</button>
</form>

<script>
    // Prevent duplicate form submission
    document.getElementById('petForm').addEventListener('submit', function(e) {
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = true;
        submitBtn.textContent = 'Creating...';
    });
</script>
@endsection
