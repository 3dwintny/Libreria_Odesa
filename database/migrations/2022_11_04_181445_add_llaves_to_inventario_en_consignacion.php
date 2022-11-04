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
        Schema::table('inventario_en_consignacion', function (Blueprint $table) {
            $table->unsignedInteger('idDistribuidor');            
            $table->foreign('id_libro')->references('id')->on('libro');
            $table->foreign('idDistribuidor')->references('id')->on('distribuidor');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventario_en_consignacion', function (Blueprint $table) {
            //
        });
    }
};
