<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvidenciaTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('evidencia', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('afirmacion_id')->unsigned();
            //$table->foreign('afirmacion_id')->references('id')->on('afirmacion');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('evidencia');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
