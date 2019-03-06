<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('email',150);
            $table->string('name');
            $table->string('lastname');
            $table->text('address');
            $table->string('state');
            $table->string('city');
            $table->integer('postalcode');
            $table->string('phone');
            $table->text('note')->nullable();
            $table->enum('status',['EN PROCESO','COMPRA','ENVIADO','CANCELADO'])->default('EN PROCESO');
            $table->string('payment');
            $table->string('serial_buy');

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
        Schema::dropIfExists('checkouts');
    }
}
