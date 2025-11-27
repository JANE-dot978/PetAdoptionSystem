<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\PetType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminPetController extends Controller
{
    // List all pets (admin)
    public function index()
    {
        $pets = Pet::latest()->get();
        return view('admin.pets.index', compact('pets')); // admin view
    }

    public function create()
    {
        $petTypes = PetType::all();
        return view('admin.pets.create', compact('petTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pet_type_id' => 'required|exists:pet_types,id',
            'age' => 'nullable|integer',
            'gender' => 'required|in:male,female',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'availability' => 'required|in:adoption,sale,both',
            'image_url' => 'nullable|string',
            'image_file' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        $imagePath = null;
        
        // Check if file upload exists
        if ($request->hasFile('image_file')) {
            $imagePath = $request->file('image_file')->store('pets', 'public');
        } 
        // Otherwise, use URL if provided
        elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        Pet::create([
            'name' => $request->name,
            'pet_type_id' => $request->pet_type_id,
            'age' => $request->age,
            'gender' => $request->gender,
            'description' => $request->description,
            'price' => $request->price,
            'availability' => $request->availability,
            'image_url' => $imagePath,
            'status' => 'available',
        ]);

        return redirect()->route('admin.pets.index')->with('success', 'Pet created successfully!');
    }

    public function edit(Pet $pet)
    {
        $petTypes = PetType::all();
        return view('admin.pets.edit', compact('pet', 'petTypes'));
    }

    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pet_type_id' => 'required|exists:pet_types,id',
            'age' => 'nullable|integer',
            'gender' => 'required|in:male,female',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'availability' => 'required|in:adoption,sale,both',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image_url')) {
            if ($pet->image_url && Storage::disk('public')->exists($pet->image_url)) {
                Storage::disk('public')->delete($pet->image_url);
            }
            $pet->image_url = $request->file('image_url')->store('pets', 'public');
        }

        $pet->update($request->except('image_url'));

        return redirect()->route('admin.pets.index')->with('success', 'Pet updated successfully!');
    }

    public function destroy(Pet $pet)
    {
        if ($pet->image_url && Storage::disk('public')->exists($pet->image_url)) {
            Storage::disk('public')->delete($pet->image_url);
        }

        $pet->delete();

        return redirect()->route('admin.pets.index')->with('success', 'Pet deleted successfully!');
    }
}
