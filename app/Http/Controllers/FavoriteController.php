<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle(Request $request, $petId)
    {
        $user = Auth::user();
        $pet = Pet::findOrFail($petId);

        $favorite = Favorite::where('user_id', $user->id)->where('pet_id', $pet->id)->first();
        if ($favorite) {
            $favorite->delete();
            return response()->json(['favorited' => false]);
        } else {
            Favorite::create(['user_id' => $user->id, 'pet_id' => $pet->id]);
            return response()->json(['favorited' => true]);
        }
    }
}
