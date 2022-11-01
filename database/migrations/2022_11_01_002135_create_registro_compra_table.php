<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_compra', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idCompra');
            $table->unsignedInteger('idLibro');
            $table->integer('cantidadLibros');
            $table->decimal('precioCompraLibro'); //este valor se almacena en libro en precio Compra
            $table->decimal('totalRegistro');
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
        Schema::dropIfExists('registro_compra');
    }
};
