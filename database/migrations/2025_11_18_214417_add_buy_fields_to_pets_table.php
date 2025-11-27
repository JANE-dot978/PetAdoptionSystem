<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pets', function (Blueprint $table) {
            
            // $table->decimal('price', 10, 2)->nullable();
            $table->string('gender')->nullable()->change(); // optional, if you want to standardize
        });
    }

    public function down()
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropColumn(['availability', 'price']);
        });
    }
};
