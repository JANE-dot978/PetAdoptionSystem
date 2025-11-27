<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
//     public function up(): void
// {
//     Schema::table('adoption_requests', function (Blueprint $table) {
//         $table->string('status')->default('pending'); // pending, approved, rejected
//         $table->decimal('payment_amount', 10, 2)->default(0);
//     });
// }

public function down(): void
{
    Schema::table('adoption_requests', function (Blueprint $table) {
        $table->dropColumn(['status', 'payment_amount']);
        $table->decimal('price', 10, 2)->nullable()->after('description');

    });
}

};
