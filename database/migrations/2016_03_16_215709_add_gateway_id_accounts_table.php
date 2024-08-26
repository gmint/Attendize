<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->unsignedInteger('payment_gateway_id')->default(config('attendize.payment_gateway_stripe'));
            $table->foreign('payment_gateway_id')->references('id')->on('payment_gateways');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign('accounts_payment_gateway_id_foreign');
            $table->dropColumn('payment_gateway_id');
        });
    }
};
