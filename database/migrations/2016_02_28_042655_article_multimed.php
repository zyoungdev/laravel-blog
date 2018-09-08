<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticleMultimed extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('article_multimed', function (Blueprint $table) {
      $table->integer('article_id')->unsigned()->index();
      $table->foreign('article_id')
            ->references('id')
            ->on('articles')
            ->onDelete('cascade');

      $table->integer('multimed_id')->unsigned()->index();
      $table->foreign('multimed_id')
            ->references('id')
            ->on('multimeds')
            ->onDelete('cascade');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('article_multimed');
  }
}
