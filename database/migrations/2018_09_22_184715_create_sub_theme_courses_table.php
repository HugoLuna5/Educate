<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubThemeCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_theme_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_course');
            $table->integer('id_theme');
            $table->integer('id_instructor');
            $table->text('nombre');
            $table->text('slug');
            $table->text('time');
            $table->text('url_video');
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
        Schema::dropIfExists('sub_theme_courses');
    }
}
