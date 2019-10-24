<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DefineForeignKeys extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::table('users', function(Blueprint $table){
            $table->foreign('role_id')->references('id')->on('roles');
        });

        Schema::table('programa', function(Blueprint $table){
            $table->foreign('facultad_id')->references('id')->on('facultad');
        });

        Schema::table('competencia', function(Blueprint $table){
            $table->foreign('asignatura_id')->references('id')->on('asignatura');
        });

        Schema::table('asignatura', function(Blueprint $table){
            $table->foreign('programa_id')->references('id')->on('programa');
        });

        Schema::table('resultado_aprendizaje', function(Blueprint $table){
            $table->foreign('asignatura_id')->references('id')->on('asignatura');
        });

        Schema::table('criterio_evaluacion', function(Blueprint $table){
            $table->foreign('resultado_aprendizaje_id')->references('id')->on('resultado_aprendizaje');
        });

        Schema::table('afirmacion', function(Blueprint $table){
            $table->foreign('modulo_id')->references('id')->on('modulo_icfes');
        });

        Schema::table('evidencia', function(Blueprint $table){
            $table->foreign('afirmacion_id')->references('id')->on('afirmacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        //
    }
}
