<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');
            $table->text('cart');
            
            /* Address */
            $table->string('street');
            $table->string('street_num');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('postal_code');

            $table->string('phone');
            $table->string('client_name');
            $table->string('payment_id');

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
        Schema::dropIfExists('orders');
    }
}
