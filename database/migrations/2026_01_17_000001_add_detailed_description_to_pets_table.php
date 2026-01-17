<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->longText('detailed_description')->nullable()->after('description');
            $table->string('breed')->nullable()->after('species');
            $table->string('color')->nullable()->after('breed');
            $table->decimal('weight', 8, 2)->nullable()->after('color');
            $table->string('vaccinated')->default('unknown')->after('weight');
            $table->string('neutered_spayed')->default('unknown')->after('vaccinated');
            $table->text('special_needs')->nullable()->after('neutered_spayed');
        });
    }

    public function down()
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropColumn([
                'detailed_description',
                'breed',
                'color',
                'weight',
                'vaccinated',
                'neutered_spayed',
                'special_needs'
            ]);
        });
    }
};
