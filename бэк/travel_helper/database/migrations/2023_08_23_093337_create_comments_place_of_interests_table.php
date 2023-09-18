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
        Schema::create('comments_place_of_interests', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('place_of_interests_id')->constrained()->onDelete('cascade');
            // $table->foreignId('comments_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments_place_of_interests');
    }
};
