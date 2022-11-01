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
        Schema::create('editorial_libro', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('id_autor');
            $table->foreign('id_autor')->references('id')->on('autor');

            $table->unsignedInteger('id_libro');
            $table->foreign('id_autor')->references('id')->on('libro');

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
        Schema::dropIfExists('editorial_libro');
    }
};
