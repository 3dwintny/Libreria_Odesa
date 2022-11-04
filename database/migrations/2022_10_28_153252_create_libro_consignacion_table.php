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
        Schema::create('libro_consignacion', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cantidad');
            $table->date('fecha_egreso');
            $table->unsignedInteger('idLibro');
            $table->unsignedInteger('idDistribuidor');
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
        Schema::dropIfExists('libro_consignacion');
    }
};
