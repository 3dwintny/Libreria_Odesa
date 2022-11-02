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
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre1');
            $table->string('nombre2')->nullable();
            $table->string('nombre3')->nullable();
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('apellido_casada')->nullable();
            $table->string('cui',20)->unique();
            $table->string('genero',25);
            $table->string('direccion',150);
            $table->string('telefono_casa',10)->unique()->nullable();
            $table->string('celular',10)->unique()->nullable();
            $table->string('correo',150)->unique();
            $table->string('foto',100)->nullable();
            $table->date('fecha_fotografia')->nullable();
            $table->string('nit',20)->unique()->nullable();
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
        Schema::dropIfExists('persona');
    }
};
