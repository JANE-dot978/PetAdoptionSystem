<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pet;
use App\Models\AdoptionRequest;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalPets' => Pet::count(),
            'totalSales' => AdoptionRequest::where('status', 'approved')->sum('payment_amount'),
            'adoptionRequests' => AdoptionRequest::with(['user', 'pet'])->latest()->get(),
        ]);
    }

    // Approve/Reject methods
    public function approve($id)
    {
        $request = AdoptionRequest::findOrFail($id);
        $request->status = 'approved';
        $request->save();

        return redirect()->back()->with('success', 'Request approved!');
    }

    public function reject($id)
    {
        $request = AdoptionRequest::findOrFail($id);
        $request->status = 'rejected';
        $request->save();

        return redirect()->back()->with('success', 'Request rejected!');
    }
}
