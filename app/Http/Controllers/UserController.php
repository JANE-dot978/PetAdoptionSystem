<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function browsePets() {
    $pets = Pet::where('status', 'Available')->get();
    return view('user.browse', compact('pets'));
}

}
