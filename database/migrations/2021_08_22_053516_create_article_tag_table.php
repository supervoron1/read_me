<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // сводная pivot таблица
        Schema::create('article_tag', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger('article_id');
//            $table->foreign('article_id')->references('id')->on('articles');
//            $table->unsignedBigInteger('tag_id');
//            $table->foreign('tag_id')->references('id')->on('tags');
            // оптимизируем верхние 4 строчки и добавляем поведение для связанных таблиц при удалении
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_tag');
    }
}
