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
        Schema::table('autor_libro', function (Blueprint $table) {
            $table->dropColumn('id_autor');
            $table->dropColumn('id_libro');

            $table->unsignedInteger('idLibro');
            $table->unsignedInteger('idAutor');

            $table->foreign('idLibro')->references('id')->on('libro');
            $table->foreign('idAutor')->references('id')->on('autor');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('autor_libro', function (Blueprint $table) {
            //
        });
    }
};
