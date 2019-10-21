<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramaTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('programa', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->integer('facultad_id')->unsigned();
            $table->foreign('facultad_id')->references('id')->on('facultad');
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
        Schema::table('programa', function (Blueprint $table){
            $table->dropForeign(['facultad_id']);
        });
        Schema::dropIfExists('programa');
    }
}
