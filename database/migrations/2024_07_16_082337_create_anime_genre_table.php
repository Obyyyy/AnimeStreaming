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
        Schema::create('anime_genre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('genre_id')->constrained('genres', 'id')->onDelete('cascade');
            $table->foreignId('anime_id')->constrained('animes', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anime_genre');
    }
};