<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slogan');
            $table->string('slug')->nullable();
            $table->integer('parent_id')->index();
            $table->string('type', 20)->default('product');
            $table->string('locale', 10)->default('vi');
            $table->string('slogan_color_bg')->default('#ffe100');
            $table->string('slogan_color_text')->default('#231f20');
            $table->integer('order')->default(0);
            $table->text('description');
            $table->boolean('locked')->default(false);
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
        Schema::drop('categories');
    }
}
