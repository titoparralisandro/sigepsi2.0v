<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoAsesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_asesores', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_proyecto')
                ->nullable()
                ->references('id')->on('proyectos')
                ->OnDelete('set null');

            $table->foreignId('id_asesor')
                ->nullable()
                ->references('id')->on('profesores')
                ->OnDelete('set null');

            $table->foreignId('id_tipo_asesoria')
                ->nullable()
                ->references('id')->on('tipos_asesorias')
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
        Schema::dropIfExists('proyecto_asesores');
    }
}