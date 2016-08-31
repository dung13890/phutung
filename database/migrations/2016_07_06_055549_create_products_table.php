<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('code', 50);
            $table->string('slug')->index()->nullable();
            $table->string('image');
            $table->string('model');
            $table->string('origin');
            $table->text('description');
            $table->integer('price');
            $table->string('type', 20)->default('product');
            $table->string('locale', 10);
            $table->integer('provider_id');
            $table->tinyInteger('guarantee')->default(1);
            $table->boolean('locked')->default(false);
            $table->boolean('featured')->default(false);
            $table->integer('user_id')->unsigned()->index();
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
        Schema::drop('products');
    }
}
