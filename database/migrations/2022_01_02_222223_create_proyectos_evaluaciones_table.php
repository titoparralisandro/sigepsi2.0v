<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosEvaluacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos_evaluaciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_proyecto')
                ->nullable()
                ->references('id')->on('proyectos')
                ->OnDelete('set null');

            $table->foreignId('id_estructura')
                ->nullable()
                ->references('id')->on('estructuras')
                ->OnDelete('set null');
            
            $table->foreignId('id_estatus_progreso')
                ->nullable()
                ->references('id')->on('estatus_progresos')
                ->OnDelete('set null');

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
        Schema::dropIfExists('proyectos_evaluaciones');
    }
}
