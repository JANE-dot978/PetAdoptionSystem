<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class HomeController extends Controller
{
    // Homepage
    public function home()
    {
        $availablePets = Pet::with('petType')
            ->where('status', 'available')
            ->whereIn('availability', ['adoption', 'both'])
            ->latest()
            ->take(2)
            ->get();

        return view('home', compact('availablePets'));
    }

    // About Page
    public function about()
    {
        return view('about');
    }

    // Contact Page
    public function contact()
    {
        return view('contact');
    }

    // In HomeController.php
public function userDashboard()
{
    return view('frontend.user.dashboard'); // create this view
}


    // Handle Contact Form message
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        // For now just return success (Later: store or send email)
        return back()->with('success', 'Your message has been sent!');
    }
}
