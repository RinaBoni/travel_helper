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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('country')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('district')->nullable(true);
            $table->string('street')->nullable(false);
            $table->string('building')->nullable(false);
            $table->string('coordinates')->nullable(true);
            // $table->foreignId('place_of_interests')->constrained()->onDelete('cascade')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
