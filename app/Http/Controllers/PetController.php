<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Adoption;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Http\Controllers\MpesaController;
use App\Models\PetType;

class PetController extends Controller
{
    /**
     * BROWSE PETS with search, filters, pagination
     */
    public function browse(Request $request)
    {

        $query = Pet::where('status', 'available');

        // Get all unique pet types/species for the filter dropdown.
        // Prefer distinct `species` values from pets, but also include names from `pet_types` table
        $types = Pet::query()->distinct()->pluck('species')->filter()->map(function($v){ return trim($v); })->filter()->values()->toArray();
        $typeNames = PetType::query()->pluck('name')->map(function($v){ return trim($v); })->filter()->values()->toArray();
        $types = array_values(array_unique(array_merge($types, $typeNames)));

        // Search by name or species (typing "cats" will match "cat")
        if ($request->filled('search')) {
            $term = trim($request->search);
            $singular = Str::singular(Str::lower($term));

            $query->where(function($q) use ($term, $singular) {
                $q->where('name', 'like', '%'.$term.'%')
                  ->orWhere('species', 'like', '%'.$term.'%')
                  ->orWhereRaw('LOWER(species) LIKE ?', ['%'.$singular.'%']);
            });
        }

        // Filter by species
        if ($request->filled('species')) {
            $species = $request->species;
            $query->where(function($q) use ($species) {
                $q->where('species', $species)
                  ->orWhereHas('petType', function($q2) use ($species) {
                      $q2->where('name', $species);
                  });
            });
        }

        // Filter by gender
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // Filter by size
        if ($request->filled('size')) {
            $query->where('size', $request->size);
        }

        // Filter by age range
        if ($request->filled('age_min')) {
            $query->where('age', '>=', $request->age_min);
        }

        if ($request->filled('age_max')) {
            $query->where('age', '<=', $request->age_max);
        }

        // Pagination (8 pets per page)
        $pets = $query->paginate(8)->withQueryString();

        return view('browse', compact('pets', 'types'));
    }

    /**
     * PET DETAILS PAGE
     */
    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pets.show', compact('pet'));
    }

    /**
     * ADOPTION / BUY PAGE
     */
    public function process($id)
    {
        $pet = Pet::findOrFail($id);
        return view('frontend.user.pet_process', compact('pet'));
    }

    /**
     * USER DASHBOARD
     */
    public function userDashboard()
    {
        $userId = Auth::id();

        $adoptions = Adoption::with('pet')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        $purchases = Purchase::with('pet')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.user.dashboard', compact('adoptions', 'purchases'));
    }

    /**
     * FINALIZE ADOPTION
     */
    public function finalizeAdoption($id)
    {
        $pet = Pet::findOrFail($id);

        if ($pet->status !== 'available') {
            return back()->with('error', 'This pet is no longer available.');
        }

        Adoption::create([
            'user_id' => Auth::id(),
            'pet_id' => $pet->id,
            'status' => 'pending'
        ]);

        $pet->status = 'pending';
        $pet->save();

        return back()->with('success', 'Adoption request sent. Wait for admin approval.');
    }

    /**
     * FINALIZE BUY + STK PUSH
     */
    public function finalizeBuy(Request $request, $id)
    {
        $request->validate([
            'phone' => 'required'
        ]);

        $pet = Pet::findOrFail($id);

        if ($pet->status !== 'available') {
            return back()->with('error', 'Pet not available for sale.');
        }

        // STK PUSH STARTS
        $mpesa = new MpesaController();
        $response = $mpesa->stkPush($request->phone, $pet->price);

        Log::info("STK Push Full Response", $response);

        // SUCCESSFUL STK PUSH
        if (isset($response['ResponseCode']) && $response['ResponseCode'] === '0') {

            Purchase::create([
                'user_id' => Auth::id(),
                'pet_id' => $pet->id,
                'amount' => $pet->price,
                'status' => 'pending',
                'mpesa_checkout_request_id' => $response['CheckoutRequestID'] ?? null,
                'mpesa_response' => json_encode($response)
            ]);

            $pet->status = 'pending';
            $pet->save();

            return back()->with('success', 'STK Push sent. Enter your M-Pesa PIN to complete payment.');
        }

        // FAILED STK PUSH
        $message = $response['errorMessage']
                ?? $response['CustomerMessage']
                ?? $response['ResponseDescription']
                ?? 'Failed to initiate STK Push.';

        return back()->with('error', 'STK Push failed: ' . $message);
    }
}
