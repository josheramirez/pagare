<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MotivoAutorMotivoFechaToPagare extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagares', function(Blueprint $table){
            $table->string('motivo_autor');
            $table->timestamp('motivo_fecha')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagares', function (Blueprint $table) {
            $table->dropColumn('motivo_autor');
            $table->dropColumn('motivo_fecha');
        });
    }
}
