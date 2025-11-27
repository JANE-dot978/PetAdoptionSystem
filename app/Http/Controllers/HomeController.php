<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class HomeController extends Controller
{
    // Homepage
    public function home()
    {
        // Show only pets that are not adopted yet  
       $featuredPets = Pet::where('status', 'available')->take(3)->get();


        return view('home', compact('featuredPets'));
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
