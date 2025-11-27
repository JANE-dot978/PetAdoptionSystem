<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VetController extends Controller
{
   public function dashboard() {
    $pets = Pet::whereHas('healthRecords', function($q){
        $q->where('added_by', auth()->id());
    })->get();

    return view('vet.dashboard', compact('pets'));
}

}
