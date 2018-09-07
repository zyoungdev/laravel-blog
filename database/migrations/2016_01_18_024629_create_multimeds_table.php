<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultimedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multimeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('alt');
            $table->string('attr');
            $table->string('attr_link');
            $table->string('license');
            $table->string('license_link');
            $table->enum('image_use_type', ['thumbnail', 'header', 'general']);
            $table->string('safename');
            $table->string('folder');
            $table->string('filename');
            $table->string('filetype');
            $table->string('extension');
            $table->integer('filesize');
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
        Schema::drop('multimeds');
    }
}
