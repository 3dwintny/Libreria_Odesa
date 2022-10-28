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
        //
        Schema::create('venta', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_hora_venta');
            $table->string('nombre_cliente',100);
            $table->string('nit_cliente',45);
            $table->string('direccion',100);
            $table->decimal('subtotal_venta');
            $table->decimal('descuento_total_sobre_venta');
            $table->decimal('recargo_sobre_vemta');
            $table->decimal('total_venta');
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
        //
        Schema::dropIfExists('venta');
    }
};
