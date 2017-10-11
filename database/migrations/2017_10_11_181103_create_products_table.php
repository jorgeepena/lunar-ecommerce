<?php

use Illuminate\Support\Facades\Schema;
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

            /* General Info */
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->string('image')->nullable();

            /* Inventory Info */
            $table->string('sku')->nullable();
            $table->string('stock')->nullable();
            $table->string('production_cost')->nullable();
            $table->integer('category_id')->nullable()->unsigned();

            /* Aditional Info */
            $table->string('depth')->nullable();
            $table->string('lenght')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();

            /* Images */
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            $table->string('image_5')->nullable();

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
        Schema::dropIfExists('products');
    }
}
