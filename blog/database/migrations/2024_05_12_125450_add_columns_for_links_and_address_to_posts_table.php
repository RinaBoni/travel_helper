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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('website')->nullable();
            $table->string('youtube')->nullable();
            $table->string('vk')->nullable();
            $table->string('telegram')->nullable();
            $table->string('odnoklassniki')->nullable();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('street ')->nullable();
            $table->string('building')->nullable();
            $table->string('coordinates')->nullable();
            $table->string('map')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('website');
            $table->dropColumn('youtube');
            $table->dropColumn('vk');
            $table->dropColumn('telegram');
            $table->dropColumn('odnoklassniki');
            $table->dropColumn('country');
            $table->dropColumn('region');
            $table->dropColumn('district');
            $table->dropColumn('city');
            $table->dropColumn('street ');
            $table->dropColumn('building');
            $table->dropColumn('coordinates');
            $table->dropColumn('map');
        });
    }
};
