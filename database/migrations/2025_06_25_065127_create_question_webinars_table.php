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
        Schema::create('question_webinar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('webinar_id')->nullable(false);
            $table->string('question')->nullable(false);
            $table->bigInteger('user_id')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_webinar');
    }
};
