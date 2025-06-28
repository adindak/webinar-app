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
        Schema::create('master_webinar', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->date('start_date');
            $table->time('start_time');
            $table->string('place_location')->nullable(false);
            $table->text('description')->nullable(true);
            $table->double('price', 8, 2)->default(0.00);
            $table->boolean('published')->default(false);
            $table->enum('access', ['public', 'private'])->nullable(true);
            $table->bigInteger('total_participants')->default(0);
            $table->string('image')->nullable(true);
            $table->string('link')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webinar');
    }
};
