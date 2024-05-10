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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->unsignedBigInteger('post_id');
            $table->string('additional_information');
            $table->timestamps();

            $table->index('post_id', 'group_post_idx');
            $table-> foreign('post_id', 'group_post_fk')->on('posts')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
