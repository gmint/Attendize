<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_access_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('event_id');
            $table->string('code')->default('');
            $table->timestamps();
            $table->softDeletes();

            // Add events table foreign key
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_access_codes');
    }
};
