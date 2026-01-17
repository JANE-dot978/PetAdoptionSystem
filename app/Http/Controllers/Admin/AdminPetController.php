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
            'species' => 'nullable|string',
            'breed' => 'nullable|string',
            'color' => 'nullable|string',
            'weight' => 'nullable|numeric',
            'description' => 'nullable|string',
            'detailed_description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'availability' => 'required|in:adoption,sale,both',
            'vaccinated' => 'required|in:yes,no,unknown',
            'neutered_spayed' => 'required|in:yes,no,unknown',
            'special_needs' => 'nullable|string',
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
            'species' => $request->species,
            'breed' => $request->breed,
            'color' => $request->color,
            'weight' => $request->weight,
            'description' => $request->description,
            'detailed_description' => $request->detailed_description,
            'vaccinated' => $request->vaccinated,
            'neutered_spayed' => $request->neutered_spayed,
            'special_needs' => $request->special_needs,
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
            'species' => 'nullable|string',
            'breed' => 'nullable|string',
            'color' => 'nullable|string',
            'weight' => 'nullable|numeric',
            'description' => 'nullable|string',
            'detailed_description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'availability' => 'required|in:adoption,sale,both',
            'vaccinated' => 'required|in:yes,no,unknown',
            'neutered_spayed' => 'required|in:yes,no,unknown',
            'special_needs' => 'nullable|string',
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
