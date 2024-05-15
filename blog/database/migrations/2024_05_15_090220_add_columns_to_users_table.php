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
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_image')->nullable();
            $table->string('lastname')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('car')->nullable();
            $table->boolean('newsletter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_image');
            $table->dropColumn('lastname');
            $table->dropColumn('phone_number');
            $table->dropColumn('car');
            $table->dropColumn('newsletter');
        });
    }
};
