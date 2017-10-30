<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('email');
            $table->text('review');
            $table->boolean('approved');
            $table->integer('product_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('product_reviews', function($table){
            // onDelete 'cascade' elimina la referencia del comentario publicación al eliminarlo. Es preferible usar detach, desde el destroy del controlador. pero en metodos sencillos no es enfático.
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_reviews');
    }
}
