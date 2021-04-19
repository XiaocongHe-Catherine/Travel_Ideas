<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_ideas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->on('users')->onDelete('cascade');
            $table->integer('idea_id')->on('ideas')->onDelete('cascade');
            $table->longText('comment');
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
        Schema::dropIfExists('comments_ideas');
    }
}
