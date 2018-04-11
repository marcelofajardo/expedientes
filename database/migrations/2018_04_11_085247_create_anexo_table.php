<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnexoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anexo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expediente_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('clasificacion_id')->unsigned();
            $table->string('username');
            $table->string('descripcion');
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anexo');
    }
}
