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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('website')->nullable(true);
            $table->string('youtube')->nullable(true);
            $table->string('vk')->nullable(true);
            $table->string('odnoklassniki')->nullable(true);
            $table->string('telegram')->nullable(true);
            $table->string('instagram')->nullable(true);
            $table->string('twitter')->nullable(true);
            $table->string('threads')->nullable(true);
            // $table->foreignId('place_of_interests')->constrained()->onDelete('cascade')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
