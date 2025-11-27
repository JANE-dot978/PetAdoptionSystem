<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\User;
use App\Models\Adoption;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.dashboard', [
            'totalPets' => Pet::count(),
            'totalUsers' => User::count(),
            'pendingAdoptions' => Adoption::where('status', 'pending')->count(),
             'totalSales' => \App\Models\Sale::sum('amount') ?? 0,
             'adoptionRequests' => Adoption::with(['user', 'pet'])->get(),
        ]);
    }
}
