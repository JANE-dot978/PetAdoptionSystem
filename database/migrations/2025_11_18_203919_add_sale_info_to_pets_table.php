<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->enum('availability', ['adoption', 'sale', 'both'])->default('adoption')->after('status');
            $table->decimal('price', 8, 2)->nullable()->after('availability'); // Only for pets for sale
        });
    }

    public function down()
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropColumn(['availability', 'price']);
        });
    }
};
