<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('matricula')->unique();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('apellido_materno')->nullable();
            $table->string('correo_electronico')->unique();
            $table->unsignedBigInteger('sede_id');
            $table->timestamps();

            $table->foreign('sede_id')->references('id')->on('sedes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
