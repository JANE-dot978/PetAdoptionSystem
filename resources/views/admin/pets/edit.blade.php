<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Pet
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow">

            <form action="{{ route('admin.pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name -->
                <label class="block font-semibold">Name</label>
                <input type="text" name="name" value="{{ old('name', $pet->name) }}"
                       class="w-full border p-2 rounded mb-4">

                <!-- Type -->
                <label class="block font-semibold">Pet Type</label>
                <select name="pet_type_id" class="w-full border p-2 rounded mb-4">
                    @foreach($petTypes as $type)
                        <option value="{{ $type->id }}" {{ $pet->pet_type_id == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>

                <!-- Age -->
                <label class="block font-semibold">Age</label>
                <input type="number" name="age" value="{{ old('age', $pet->age) }}"
                       class="w-full border p-2 rounded mb-4">

                <!-- Gender -->
                <label class="block font-semibold">Gender</label>
                <select name="gender" class="w-full border p-2 rounded mb-4">
                    <option value="male" {{ $pet->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $pet->gender == 'female' ? 'selected' : '' }}>Female</option>
                </select>

                <!-- Availability -->
                <label class="block font-semibold">Availability</label>
                <select name="availability" class="w-full border p-2 rounded mb-4">
                    <option value="adoption" {{ $pet->availability == 'adoption' ? 'selected' : '' }}>Adoption</option>
                    <option value="sale" {{ $pet->availability == 'sale' ? 'selected' : '' }}>Sale</option>
                    <option value="both" {{ $pet->availability == 'both' ? 'selected' : '' }}>Both</option>
                </select>

                <!-- Price -->
                <label class="block font-semibold">Price</label>
                <input type="number" name="price" value="{{ old('price', $pet->price) }}"
                       class="w-full border p-2 rounded mb-4">

                <!-- Description -->
                <label class="block font-semibold">Description</label>
                <textarea name="description" class="w-full border p-2 rounded mb-4">{{ old('description', $pet->description) }}</textarea>

                <!-- Existing Image -->
                @if($pet->image_url)
                    <p class="font-semibold">Current Image:</p>
                    <img src="{{ asset('storage/' . $pet->image_url) }}" class="h-32 mb-4 rounded">
                @endif

                <!-- Upload -->
                <label class="block font-semibold">Change Image</label>
                <input type="file" name="image_url" class="mb-4">

                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded">
                    Update Pet
                </button>

            </form>

        </div>
    </div>
</x-app-layout>
