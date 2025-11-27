<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetHealthRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'vet_name',
        'checkup_date',
        'notes',
    ];

    // Relationship: Health record belongs to a Pet
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
