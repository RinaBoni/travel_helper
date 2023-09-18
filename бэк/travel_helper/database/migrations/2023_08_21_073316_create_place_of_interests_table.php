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
        Schema::create('place_of_interests', function (Blueprint $table) {
            $table->id();
            $table->string('info');
            $table->float('price');
            $table->string('work schedule');
            $table->float('rating');
            // $table->foreignId('addresses_id')->constrained()->onDelete('cascade');
            // $table->foreignId('phone_numbers_id')->constrained()->onDelete('cascade');
            // $table->foreignId('links_id')->constrained()->onDelete('cascade');
            // $table->foreignId('comments_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // $table->index('address_id', 'place_of_interests_address_idx');
            // $table->foreign('address_id')->references('id')->on('address')->onDelete('cascade');
            // $table->foreignId('address_id')->constrained()>onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place_of_interests');
    }
};
