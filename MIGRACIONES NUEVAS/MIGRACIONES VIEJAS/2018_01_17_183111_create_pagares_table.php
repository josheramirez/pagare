<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numeracion')->nullable();
            $table->integer('codigo');
            $table->dateTime('fecha')->nullable();
            $table->unsignedInteger('paciente_id')->nullable();
            $table->foreign('paciente_id')->references('id')->on('pacientes');

            $table->unsignedInteger('deudor_id');
            $table->foreign('deudor_id')->references('id')->on('deudores');

            $table->unsignedInteger('codeudor_id')->nullable();
            $table->foreign('codeudor_id')->references('id')->on('codeudores');

            $table->unsignedInteger('deuda_id');
            $table->foreign('deuda_id')->references('id')->on('deudas');

            $table->unsignedInteger('mandato_id')->nullable();
            $table->foreign('mandato_id')->references('id')->on('mandatos');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estados');

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
        Schema::dropIfExists('pagares');
    }
}
