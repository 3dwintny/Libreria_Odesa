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
        Schema::create('inventario_en_consignacion', function (Blueprint $table) {
            $table->increments('id');
            $table->double('cantidad_enviada');
            $table->dateTime('fecha_egreso');

            $table->unsignedInteger('id_libro');
            $table->foreign('id_libro')->references('id')->on('libro');

            $table->unsignedInteger('id_distribuidor');
            $table->foreign('id_distribuidor')->references('id')->on('distribuidor');

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
        Schema::dropIfExists('inventario_en_consignacion');
    }
};
