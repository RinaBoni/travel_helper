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
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->index('post_id', 'post_tag_post_idx');//индекс ссылаемся на столбец category_id
            $table->foreign('post_id', 'post_tag_post_fk')->on('posts')->references('id');//создаем фореинки, ссылаемся на  таблицу categories столбец id

            $table->index('tag_id', 'post_tag_tag_idx');//индекс ссылаемся на столбец category_id
            $table->foreign('tag_id', 'post_tag_tag_fk')->on('tags')->references('id');//создаем фореинки, ссылаемся на  таблицу categories столбец id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_post_tags');
    }
};
