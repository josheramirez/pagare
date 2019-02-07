<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeudoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codeudores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->string('full_nombre')->nullable();
            $table->string('rut')->nullable();
            $table->string('pasaporte')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('profesion')->nullable();

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
        Schema::dropIfExists('codeudores');
    }
}
