<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'pet_id',
        'user_id',
        'amount',
    ];
}
