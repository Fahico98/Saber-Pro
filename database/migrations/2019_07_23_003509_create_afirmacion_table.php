<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfirmacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afirmacion', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->integer('modulo_id')->unsigned();



            $table->foreign('modulo_id')->references('id')->on('modulo_icfes');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afirmacion');
    }
}
