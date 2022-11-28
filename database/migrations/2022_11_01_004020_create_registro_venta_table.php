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
            //cambio de idventa a ventum_id por Relaciones atumaticas de make crud
            $table->unsignedInteger('ventum_id');
            $table->unsignedInteger('idLibro');
            $table->integer('cantidadLibros');
            //$table->decimal('precioLibro'); --> precio libro se obtine con la relacion en idlibro
            $table->decimal('subtotal');
            //$table->decimal('descuento');
            //$table->decimal('recargo');
            //$table->decimal('totalRegistro');

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
