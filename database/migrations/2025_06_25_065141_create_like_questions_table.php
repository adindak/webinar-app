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
        Schema::create('like_questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('question_id')->nullable(false);
            $table->bigInteger('user_id')->nullable(false);
            $table->boolean('is_like')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like_questions');
    }
};
