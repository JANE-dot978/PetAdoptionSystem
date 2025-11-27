<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_id',
        'status', // pending, approved, rejected
    ];

    // Relationship: Adoption belongs to a Pet
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    // Relationship: Adoption belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
