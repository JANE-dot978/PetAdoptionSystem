<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pet_type_id',
        'species',
        'age',
        'gender',
        'description',
        'image_url',
        'status', // available, pending, adopted
        'availability', // adoption, sale, both
        'price',        // only for sale
    ];

    // Relationship: Pet belongs to a PetType
    public function petType()
    {
        return $this->belongsTo(PetType::class);
    }

    // Relationship: Pet has many Adoptions
    public function adoptions()
    {
        return $this->hasMany(Adoption::class);
    }

    // Optional: latest adoption request
    public function latestAdoption()
    {
        return $this->hasOne(Adoption::class)->latestOfMany();
    }
}
