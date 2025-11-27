<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Insert additional pet types
        $petTypes = [
            ['name' => 'Dog', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cat', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rabbit', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hamster', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fish', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chicken', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Goat', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Turtle', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Parrot', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Guinea Pig', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ferret', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bird', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Check if pet types table exists and insert only if they don't already exist
        foreach ($petTypes as $type) {
            DB::table('pet_types')->updateOrInsert(
                ['name' => $type['name']],
                $type
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Delete the pet types we added
        DB::table('pet_types')->whereIn('name', [
            'Dog', 'Cat', 'Rabbit', 'Hamster', 'Fish', 'Chicken', 
            'Goat', 'Turtle', 'Parrot', 'Guinea Pig', 'Ferret', 'Bird'
        ])->delete();
    }
};
