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
        Schema::create('criterio_evidencia', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->bigInteger("criterio_id")->unsigned();
            $table->bigInteger("evidencia_id")->unsigned();
            $table->timestamps();
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
