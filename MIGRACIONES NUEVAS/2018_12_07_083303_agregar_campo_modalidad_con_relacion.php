<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarCampoModalidadConRelacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes', function(Blueprint $table){
            $table->integer('modalidad_id')->unsigned();
            $table->foreign('modalidad_id')->references('id')->on('modalidad')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            //relacion
        });   //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
