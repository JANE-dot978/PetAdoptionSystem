<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('adoption_requests', function (Blueprint $table) {
            if (!Schema::hasColumn('adoption_requests', 'status')) {
                $table->string('status')->default('pending');
            }

            if (!Schema::hasColumn('adoption_requests', 'payment_amount')) {
                $table->decimal('payment_amount', 10, 2)->default(0);
            }
        });
    }

    public function down(): void
    {
        Schema::table('adoption_requests', function (Blueprint $table) {
            if (Schema::hasColumn('adoption_requests', 'status')) {
                $table->dropColumn('status');
            }

            if (Schema::hasColumn('adoption_requests', 'payment_amount')) {
                $table->dropColumn('payment_amount');
            }
        });
    }
};
