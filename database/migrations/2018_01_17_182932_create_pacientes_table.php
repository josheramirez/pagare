<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('paterno')->nullable();
            $table->string('materno')->nullable();
            $table->string('full_nombre')->nullable();
            $table->string('rut')->nullable();
            $table->string('pasaporte')->nullable();
            $table->string('vas')->nullable();
            $table->string('dau')->nullable();
            $table->string('medico')->nullable();

            $table->unsignedInteger('servicio_id')->nullable();
            $table->foreign('servicio_id')->references('id')->on('servicios');

            $table->unsignedInteger('prevision_id')->nullable();
            $table->foreign('prevision_id')->references('id')->on('previsiones');
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
        Schema::dropIfExists('pacientes');
    }
}
