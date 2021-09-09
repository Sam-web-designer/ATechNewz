<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('post_id')->unsigned();
            $table->BigInteger('user_id')->unsigned();
            $table->text('comment');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cacade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cacade');
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
        Schema::dropIfExists('post_comments');
    }
}
