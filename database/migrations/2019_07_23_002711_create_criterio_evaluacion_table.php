<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriterioEvaluacionTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('criterio_evaluacion', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('resultado_aprendizaje_id')->unsigned();
            //$table->foreign('resultado_aprendizaje_id')->references('id')->on('resultado_aprendizaje');
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
        Schema::drop('criterio_evaluacion');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
