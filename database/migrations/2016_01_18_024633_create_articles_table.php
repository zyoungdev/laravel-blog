<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('uri');
            $table->string('meta_desc');
            $table->string('keywords');
            $table->integer('thumbnail_image');
            $table->integer('header_image');
            $table->date('published_at');
            $table->boolean('is_public')->default(false);
            $table->boolean('is_markdown')->default(true);
            $table->mediumText('body');
            $table->timestamps();

            // $table->integer('image_id')->unsigned()->nullable();
            // $table->foreign('image_id')
            //     ->references('id')
            //     ->on('multimeds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
