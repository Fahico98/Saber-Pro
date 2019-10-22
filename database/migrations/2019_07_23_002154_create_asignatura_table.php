<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturaTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('asignatura', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('semestre');
            $table->string('no_creditos');
            $table->string('docente_encargado');
            $table->integer('programa_id')->unsigned();
            $table->foreign('programa_id')->references('id')->on('programa');
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
        Schema::table('asignatura', function (Blueprint $table){
            $table->dropForeign(['programa_id']);
        });
        Schema::dropIfExists('asignatura');
    }
}
