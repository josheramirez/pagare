<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeudoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deudores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno')->nullable();
            $table->string('full_nombre');
            $table->string('rut')->nullable();
            $table->string('pasaporte')->nullable();
            $table->string('nacionalidad')->nullable();

            $table->unsignedInteger('direccion_id')->nullable();
            $table->foreign('direccion_id')->references('id')->on('direcciones');

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
        Schema::dropIfExists('deudores');
    }
}
