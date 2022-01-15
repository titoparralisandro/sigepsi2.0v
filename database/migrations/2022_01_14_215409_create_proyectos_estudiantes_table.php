<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos_estudiantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_proyecto')
                ->nullable()
                ->references('id')->on('proyectos')
                ->OnDelete('set null');

            $table->foreignId('id_estudiante')
                ->nullable()
                ->references('id')->on('personas')
                ->OnDelete('set null');

            $table->foreignId('id_estatus_estudiante')
                ->nullable()
                ->references('id')->on('estatus_proyectos_estudiantes')
                ->OnDelete('set null');

            $table->string('observacion');
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
        Schema::dropIfExists('proyectos_estudiantes');
    }
}
