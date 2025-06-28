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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('webinar_id')->nullable(false);
            $table->bigInteger('user_id')->nullable(false);
            $table->string('payment_method')->nullable(false);
            $table->string('status')->nullable(false);
            $table->string('payment_proof')->nullable(true);
            $table->string('payment_link')->nullable(true);
            $table->string('amount')->nullable(false);
            $table->string('currency')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
