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
        Schema::table('images', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id')->nullable();

            $table->index('post_id', 'image_post_idx');
            $table-> foreign('post_id', 'image_post_fk')->on('posts')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('images', function (Blueprint $table) {
            // Drop the foreign key first
            $table->dropForeign('image_post_fk');

            // Drop the index next
            $table->dropIndex('image_post_idx');

            // Finally, drop the column
            $table->dropColumn('post_id');
        });
    }
};
