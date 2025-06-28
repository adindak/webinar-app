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
        Schema::create('participant', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('webinar_id')->nullable(false);
            $table->bigInteger('user_id')->nullable(false);
            $table->string('status')->nullable(false);
            $table->boolean('is_participant')->default(false);
            $table->string('link_certificate')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participant');
    }
};
