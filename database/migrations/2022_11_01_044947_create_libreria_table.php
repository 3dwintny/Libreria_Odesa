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
        Schema::create('libreria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_libreria',30);
            $table->string('telefono1',30);
            $table->string('telefono2',30);
            $table->string('direccion1',30);
            $table->unsignedInteger('id_municipio');            
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
        Schema::dropIfExists('libreria');
    }
};
