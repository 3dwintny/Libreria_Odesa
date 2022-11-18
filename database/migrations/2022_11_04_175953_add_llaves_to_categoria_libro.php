<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::table('categoria_libro', function (Blueprint $table) {
            $table->dropColumn('id_categoria');
            $table->dropColumn('id_libro');

            $table->unsignedInteger('idLibro');
            $table->unsignedInteger('idCategoria');
            
            $table->foreign('idCategoria')->references('id')->on('categoria');
            $table->foreign('idLibro')->references('id')->on('libro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categoria_libro', function (Blueprint $table) {
            //
        });
    }
};
