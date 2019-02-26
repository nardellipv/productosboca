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

            $table->string('name');
            $table->integer('price');
            $table->integer('offer')->nullable();
            $table->integer('quantity');
            $table->text('description');
            $table->enum('section',['BANNER','NEW','MOSTSELL','OTHER']);
            $table->string('photo');
            $table->float('rating',3,0);
            $table->string('slug');
            $table->date('time_offer')->nullable();

            $table->integer('category_id')->unsigned();

            $table->timestamps();

            // Relaciones

            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
