<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriterioEvidenciaTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('criterio_evidencia', function (Blueprint $table){
            $table->Increments('id');
            $table->integer('cirterio_id')->unsigned();
            $table->foreign('cirterio_id')->references('id')->on('criterio_evaluacion');
            $table->integer('evidencia_id')->unsigned();
            $table->foreign('evidencia_id')->references('id')->on('evidencia');
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
        Schema::dropIfExists('criterio_evidencia');
    }
}
