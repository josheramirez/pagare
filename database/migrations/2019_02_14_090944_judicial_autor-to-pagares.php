<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JudicialAutorToPagares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagares', function(Blueprint $table){
            $table->integer('judicial');
            $table->string('judicial_autor');
            $table->timestamp('judicial_fecha')->nullable();

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
            $table->dropColumn('judicial');
            $table->dropColumn('judicial_fecha');
            $table->dropColumn('judicial_autor');

        });
    }
}
