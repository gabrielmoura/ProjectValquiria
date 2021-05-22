<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDispatchersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_dispatchers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('method')->default('correios')->comment('Método de envio');

            $table->string('type')->comment('Tipo');
            $table->string('format')->comment('Formato');
            $table->string('weight')->comment('Peso');
            $table->string('length')->comment('Comprimento');
            $table->string('height')->comment('Altura');
            $table->string('width')->comment('Largura');
            $table->string('diameter')->comment('Diâmetro');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_dispatchers');
    }
}
