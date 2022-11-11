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
        Schema::create('inventario_libreria', function (Blueprint $table) {
            $table->increments('id');
            $table->double('cantidad_stock');
            $table->unsignedInteger('id_libro');
            $table->foreign('id_libro')->references('id')->on('libro');
            
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
        Schema::dropIfExists('inventario_libreria');
    }
};
