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
        Schema::create('registro_venta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idVenta');
            $table->unsignedInteger('idLibro');
            $table->integer('cantidadLibros');
            $table->decimal('precioLibro'); 
            $table->decimal('subtotal');
            $table->decimal('descuento');
            $table->decimal('recargo');
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
        Schema::dropIfExists('registro_venta');
    }
};
