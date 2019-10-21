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
        Schema::create('criterio_evaluacion', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->integer('result_id')->unsigned();
            $table->foreign('result_id')->references('id')->on('resultado_aprendizaje');
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
