@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto">
    
    <!-- Header with Actions -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Edit Pet</h2>
            <p class="text-gray-600 mt-1">Update pet information and details</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.pets.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition font-semibold">
                ← Back
            </a>
            <form action="{{ route('admin.pets.destroy', $pet->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this pet? This action cannot be undone.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition font-semibold">
                    🗑️ Delete Pet
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left Sidebar - Image & Quick Info -->
        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-lg shadow-lg sticky top-20">
                <!-- Pet Image -->
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-700 mb-3">Pet Photo</h3>
                    @if($pet->image_url)
                        <img src="{{ str_starts_with($pet->image_url, 'http') ? $pet->image_url : asset('storage/' . $pet->image_url) }}" 
                             alt="{{ $pet->name }}" class="h-48 rounded-lg border-2 border-gray-200 w-full object-cover shadow-md">
                    @else
                        <div class="h-48 rounded-lg border-2 border-dashed border-gray-300 w-full bg-gray-50 flex items-center justify-center">
                            <p class="text-gray-400 text-center">No image</p>
                        </div>
                    @endif
                </div>

                <!-- Quick Stats -->
                <div class="space-y-3 border-t pt-6">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 font-semibold">Age:</span>
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-bold text-sm">{{ $pet->age }} yrs</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 font-semibold">Gender:</span>
                        <span class="bg-pink-100 text-pink-700 px-3 py-1 rounded-full font-bold text-sm capitalize">{{ $pet->gender }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 font-semibold">Availability:</span>
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full font-bold text-sm capitalize">{{ $pet->availability }}</span>
                    </div>
                    @if($pet->price)
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 font-semibold">Price:</span>
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-bold text-sm">KSH {{ number_format($pet->price) }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Content - Form -->
        <div class="lg:col-span-2">
            <div class="bg-white p-8 rounded-lg shadow-lg">

                <form action="{{ route('admin.pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data" id="petForm">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information -->
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-gray-700 mb-4 border-b-2 border-blue-500 pb-2">Basic Information</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Pet Name *</label>
                                <input type="text" name="name" value="{{ old('name', $pet->name) }}"
                                       class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>

                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Pet Type *</label>
                                <select name="pet_type_id" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                    @foreach($petTypes as $type)
                                        <option value="{{ $type->id }}" {{ $pet->pet_type_id == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Species</label>
                                <input type="text" name="species" value="{{ old('species', $pet->species) }}" placeholder="e.g., Dog"
                                       class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Breed</label>
                                <input type="text" name="breed" value="{{ old('breed', $pet->breed) }}" placeholder="e.g., Golden Retriever"
                                       class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Color</label>
                                <input type="text" name="color" value="{{ old('color', $pet->color) }}" placeholder="e.g., Golden"
                                       class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Weight (kg)</label>
                                <input type="number" name="weight" value="{{ old('weight', $pet->weight) }}" step="0.1"
                                       class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Age *</label>
                                <input type="number" name="age" value="{{ old('age', $pet->age) }}"
                                       class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>

                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Gender *</label>
                                <select name="gender" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                    <option value="male" {{ $pet->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $pet->gender == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Health & Status -->
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-gray-700 mb-4 border-b-2 border-blue-500 pb-2">Health & Status</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Vaccinated *</label>
                                <select name="vaccinated" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                    <option value="unknown" {{ $pet->vaccinated == 'unknown' ? 'selected' : '' }}>Unknown</option>
                                    <option value="yes" {{ $pet->vaccinated == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ $pet->vaccinated == 'no' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Neutered/Spayed *</label>
                                <select name="neutered_spayed" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                    <option value="unknown" {{ $pet->neutered_spayed == 'unknown' ? 'selected' : '' }}>Unknown</option>
                                    <option value="yes" {{ $pet->neutered_spayed == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ $pet->neutered_spayed == 'no' ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Special Needs</label>
                                <input type="text" name="special_needs" value="{{ old('special_needs', $pet->special_needs) }}" placeholder="e.g., Diabetes"
                                       class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Availability & Pricing -->
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-gray-700 mb-4 border-b-2 border-blue-500 pb-2">Availability & Pricing</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Availability *</label>
                                <select name="availability" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                    <option value="adoption" {{ $pet->availability == 'adoption' ? 'selected' : '' }}>Adoption Only</option>
                                    <option value="sale" {{ $pet->availability == 'sale' ? 'selected' : '' }}>Sale Only</option>
                                    <option value="both" {{ $pet->availability == 'both' ? 'selected' : '' }}>Both</option>
                                </select>
                            </div>

                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Price (KSH)</label>
                                <input type="number" name="price" value="{{ old('price', $pet->price) }}" step="0.01" placeholder="0.00"
                                       class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Descriptions -->
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-gray-700 mb-4 border-b-2 border-blue-500 pb-2">Descriptions</h3>
                        
                        <div class="mb-4">
                            <label class="block font-semibold text-gray-700 mb-1">Short Description</label>
                            <textarea name="description" rows="2" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Brief summary">{{ old('description', $pet->description) }}</textarea>
                        </div>

                        <div>
                            <label class="block font-semibold text-gray-700 mb-1">Detailed Description</label>
                            <textarea name="detailed_description" rows="5" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Detailed pet information">{{ old('detailed_description', $pet->detailed_description) }}</textarea>
                            <p class="text-sm text-gray-600 mt-1">This will be shown in the detailed pet view</p>
                        </div>
                    </div>

                    <!-- Pet Image Upload -->
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-gray-700 mb-4 border-b-2 border-blue-500 pb-2">Update Photo</h3>
                        
                        <div>
                            <label class="block font-semibold text-gray-700 mb-1">Upload New Image</label>
                            <input type="file" name="image_url" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" accept="image/*">
                            <p class="text-sm text-gray-600 mt-1">JPG, JPEG, PNG (Max 5MB)</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 pt-4 border-t border-gray-200">
                        <button type="submit" class="bg-blue-600 text-white px-8 py-2 rounded-lg hover:bg-blue-700 transition font-bold" id="submitBtn">
                            ✓ Save Changes
                        </button>
                        <a href="{{ route('admin.pets.index') }}" class="bg-gray-400 text-white px-8 py-2 rounded-lg hover:bg-gray-500 transition font-bold">
                            ✕ Cancel
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

<script>
    // Prevent duplicate form submission
    document.getElementById('petForm').addEventListener('submit', function(e) {
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = true;
        submitBtn.textContent = 'Saving...';
    });
</script>
@endsection
