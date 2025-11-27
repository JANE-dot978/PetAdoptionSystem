<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('purchases', function (Blueprint $table) {
            $table->string('mpesa_checkout_request_id')->nullable()->after('status');
            $table->string('mpesa_transaction_id')->nullable()->after('mpesa_checkout_request_id');
            $table->longText('mpesa_response')->nullable()->after('mpesa_transaction_id');
        });
    }

    public function down()
    {
        Schema::table('purchases', function (Blueprint $table) {
            $table->dropColumn(['mpesa_checkout_request_id', 'mpesa_transaction_id', 'mpesa_response']);
        });
    }
};
