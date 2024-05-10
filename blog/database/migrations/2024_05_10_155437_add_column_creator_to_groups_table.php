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
        Schema::table('groups', function (Blueprint $table) {
            $table->string('creator')->nullable();
            $table->index('creator', 'group_user_idx');
            $table-> foreign('creator', 'group_user_fk')->on('users')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('groups', function (Blueprint $table) {
            // Drop the foreign key first
            $table->dropForeign('group_user_fk');

            // Drop the index next
            $table->dropIndex('group_user_idx');

            // Finally, drop the column
            $table->dropColumn('creator');
        });
    }
};
