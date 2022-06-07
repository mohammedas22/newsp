<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('viewer_id');
            $table->foreign('viewer_id')->on('viewers')->references('id');
            $table->foreignId('article_id');
            $table->foreign('article_id')->on('articles')->references('id');
            $table->foreignId('comment_id');
            $table->foreign('comment_id')->on('comments')->references('id');
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
        Schema::dropIfExists('likes');
    }
}
