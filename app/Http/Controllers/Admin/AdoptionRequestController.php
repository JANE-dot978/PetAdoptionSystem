<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adoption;
use Illuminate\Http\Request;

class AdoptionRequestController extends Controller
{
    // List all adoption requests for admin
    public function index()
    {
        $requests = Adoption::with(['user', 'pet'])->latest()->get();
        return view('admin.adoptions.index', compact('requests'));
    }

    // Approve adoption request
    public function approve($id)
    {
        $request = Adoption::findOrFail($id);
        $request->status = 'approved';
        $request->save();

        // Optionally mark pet as adopted
        $request->pet->status = 'adopted';
        $request->pet->save();

        return back()->with('success', 'Adoption approved!');
    }

    // Reject adoption request
    public function reject($id)
    {
        $request = Adoption::findOrFail($id);
        $request->status = 'rejected';
        $request->save();

        // Optionally mark pet back to available
        $request->pet->status = 'available';
        $request->pet->save();

        return back()->with('success', 'Adoption rejected!');
    }
}
