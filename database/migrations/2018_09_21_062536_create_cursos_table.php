<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_instructor');
            $table->integer('id_nivel');
            $table->text('nombre');
            $table->text('slug');
            $table->text('descripcion');
            $table->text('icon');
            $table->text('color');
            $table->text('duracion')->nullable();
            $table->text('alumnos')->nullable();
            $table->boolean('examen')->nullable();
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
        Schema::dropIfExists('cursos');
    }
}
