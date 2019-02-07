<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaPrestaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestaciones',function(Blueprint $table){
            $table->increments('id');
            $table->string('prestacion',200);

            $table->unsignedInteger('pagare_id');
            $table->foreign('pagare_id')->references('id')->on('pagares');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
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
         Schema::dropIfExists('prestaciones');
    }
}
