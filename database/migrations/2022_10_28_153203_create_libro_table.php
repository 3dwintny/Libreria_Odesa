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
        Schema::create('libro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',100);
            $table->unsignedInteger('edicion');
            $table->unsignedInteger('volumen')->nullable();
            $table->unsignedInteger('tomo')->nullable();
            $table->string('foto',100)->nullable();
            $table->date('fecha_fotografia')->nullable();
            $table->unsignedInteger('paginas')->nullable();
            $table->string('isbn',30)->nullable();
            $table->unsignedInteger('anio')->nullable();
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
        Schema::dropIfExists('libro');
    }
};
