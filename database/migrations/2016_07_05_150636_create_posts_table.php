<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('locale', 10)->default('vi');
            $table->string('slug')->index()->nullable();
            $table->string('image');
            $table->text('intro');
            $table->text('description');
            $table->boolean('featured')->default(false);
            $table->boolean('locked')->default(false);
            $table->integer('user_id')->index()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('posts');
    }
}
