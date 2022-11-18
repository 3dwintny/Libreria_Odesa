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
        Schema::create('proveedor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres',50);
            $table->string('apellidos',50);
            $table->string('telefono1',50); //lo dejamos como string xq puede ser un proveedor del extranjero y para colocar el codigo del pais y mas digitos
            $table->string('telefono2',50);
            $table->string('correo',50);
            $table->string('direccion',100);
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
        Schema::dropIfExists('proveedor');
    }
};
