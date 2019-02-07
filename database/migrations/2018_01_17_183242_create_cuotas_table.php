<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuotas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('n_cuota');
            $table->integer('monto');
            $table->date('f_pago');
            $table->mediumText('detalle')->nullable();
            $table->integer('n_boleta');

            $table->unsignedInteger('deuda_id');
            $table->foreign('deuda_id')->references('id')->on('deudas');

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
        Schema::dropIfExists('cuotas');
    }
}
