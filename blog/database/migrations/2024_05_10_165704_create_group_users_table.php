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
        Schema::create('group_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('group_id', 'group_user_group_idx');//индекс ссылаемся на столбец category_id
            $table->foreign('group_id', 'group_user_group_fk')->on('groups')->references('id');//создаем фореинки, ссылаемся на  таблицу categories столбец id

            $table->index('user_id', 'group_user_user_idx');//индекс ссылаемся на столбец category_id
            $table->foreign('user_id', 'group_user_user_fk')->on('users')->references('id');//создаем фореинки, ссылаемся на  таблицу categories столбец id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_users');
    }
};
