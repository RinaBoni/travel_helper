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
        Schema::create('image_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('image_id');
            $table->timestamps();

            $table->index('post_id', 'image_post_post_idx');//индекс ссылаемся на столбец category_id
            $table->foreign('post_id', 'image_post_post_fk')->on('posts')->references('id');//создаем фореинки, ссылаемся на  таблицу categories столбец id

            $table->index('image_id', 'image_post_image_idx');//индекс ссылаемся на столбец category_id
            $table->foreign('image_id', 'image_post_image_fk')->on('images')->references('id');//создаем фореинки, ссылаемся на  таблицу categories столбец id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_posts');
    }
};
