<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCirterioVSevidenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cirterio_v_sevidencia', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('cirterio_id')->unsigned();
            $table->foreign('cirterio_id')->references('id')->on('criterio_evaluacion');

            $table->timestamps();
            $table->softDeletes();

            $table->integer('evidencia_id')->unsigned();
            $table->foreign('evidencia_id')->references('id')->on('evidencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cirterio_v_sevidencia');
    }
}
