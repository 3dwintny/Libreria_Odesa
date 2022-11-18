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
        Schema::table('registro_compra', function (Blueprint $table) {
            $table->foreign('idLibro')->references('id')->on('libro');
            $table->foreign('idCompra')->references('id')->on('compra_libro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registro_compra', function (Blueprint $table) {
            //
        });
    }
};
