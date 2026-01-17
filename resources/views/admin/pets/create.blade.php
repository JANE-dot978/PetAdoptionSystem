@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Add New Pet</h2>
            <p class="text-gray-600 mt-1">Fill in the pet details below</p>
        </div>
        <a href="{{ route('admin.pets.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition font-bold">
            ← Back
        </a>
    </div>

    @if($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-6 py-4 rounded-lg mb-6 shadow-md">
            <strong>Please fix the following errors:</strong>
            <ul class="mt-2 list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.pets.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-lg" id="petForm">
        @csrf

        <!-- Basic Information -->
        <div class="mb-6">
            <h3 class="text-lg font-bold text-gray-700 mb-3 border-b-2 border-blue-500 pb-2">Basic Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Pet Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Pet Type *</label>
                    <select name="pet_type_id" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Select type</option>
                        @foreach($petTypes as $type)
                            <option value="{{ $type->id }}" {{ old('pet_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Species</label>
                    <input type="text" name="species" value="{{ old('species') }}" placeholder="e.g., Dog" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Breed</label>
                    <input type="text" name="breed" value="{{ old('breed') }}" placeholder="e.g., Golden Retriever" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Color</label>
                    <input type="text" name="color" value="{{ old('color') }}" placeholder="e.g., Golden" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Weight (kg)</label>
                    <input type="number" name="weight" value="{{ old('weight') }}" step="0.1" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Age *</label>
                    <input type="number" name="age" value="{{ old('age') }}" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Gender *</label>
                    <select name="gender" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Select gender</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Health & Status -->
        <div class="mb-6">
            <h3 class="text-lg font-bold text-gray-700 mb-3 border-b-2 border-blue-500 pb-2">Health & Status</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Vaccinated *</label>
                    <select name="vaccinated" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="unknown">Unknown</option>
                        <option value="yes" {{ old('vaccinated') == 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ old('vaccinated') == 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Neutered/Spayed *</label>
                    <select name="neutered_spayed" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="unknown">Unknown</option>
                        <option value="yes" {{ old('neutered_spayed') == 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ old('neutered_spayed') == 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Special Needs</label>
                    <input type="text" name="special_needs" value="{{ old('special_needs') }}" placeholder="e.g., Diabetes" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <!-- Availability & Pricing -->
        <div class="mb-6">
            <h3 class="text-lg font-bold text-gray-700 mb-3 border-b-2 border-blue-500 pb-2">Availability & Pricing</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Availability *</label>
                    <select name="availability" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">Select</option>
                        <option value="adoption" {{ old('availability') == 'adoption' ? 'selected' : '' }}>Adoption Only</option>
                        <option value="sale" {{ old('availability') == 'sale' ? 'selected' : '' }}>Sale Only</option>
                        <option value="both" {{ old('availability') == 'both' ? 'selected' : '' }}>Both</option>
                    </select>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Price (KSH)</label>
                    <input type="number" name="price" value="{{ old('price') }}" step="0.01" placeholder="0.00" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <!-- Descriptions -->
        <div class="mb-6">
            <h3 class="text-lg font-bold text-gray-700 mb-3 border-b-2 border-blue-500 pb-2">Descriptions</h3>
            
            <div class="mb-4">
                <label class="block font-semibold text-gray-700 mb-1">Short Description</label>
                <textarea name="description" rows="2" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Brief summary">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block font-semibold text-gray-700 mb-1">Detailed Description</label>
                <textarea name="detailed_description" rows="5" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Detailed pet information">{{ old('detailed_description') }}</textarea>
                <p class="text-sm text-gray-600 mt-1">This will be shown in the detailed pet view</p>
            </div>
        </div>

        <!-- Image Upload -->
        <div class="mb-6">
            <h3 class="text-lg font-bold text-gray-700 mb-3 border-b-2 border-blue-500 pb-2">Pet Image</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Upload Image</label>
                    <input type="file" name="image_file" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500" accept="image/*">
                    <p class="text-sm text-gray-600 mt-1">JPG, JPEG, PNG (Max 5MB)</p>
                </div>
                
                <div>
                    <label class="block font-semibold text-gray-700 mb-1">Image URL</label>
                    <input type="text" name="image_url" value="{{ old('image_url') }}" class="border border-gray-300 p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="https://example.com/image.jpg">
                    <p class="text-sm text-gray-600 mt-1">OR paste a direct URL</p>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex gap-4 pt-4 border-t border-gray-200">
            <button type="submit" class="bg-blue-600 text-white px-8 py-2 rounded-lg hover:bg-blue-700 transition font-bold" id="submitBtn">➕ Add Pet</button>
            <a href="{{ route('admin.pets.index') }}" class="bg-gray-400 text-white px-8 py-2 rounded-lg hover:bg-gray-500 transition font-bold">Cancel</a>
        </div>
    </form>
</div>

<script>
    document.getElementById('petForm').addEventListener('submit', function(e) {
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = true;
        submitBtn.textContent = 'Creating...';
    });
</script>
@endsection
