<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTrazasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos_trazas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_proyecto')
                ->nullable()
                ->references('id')->on('proyectos')
                ->OnDelete('set null');
            $table->foreignId('id_estatus_proyecto')
                ->nullable()
                ->references('id')->on('estatus_proyectos')
                ->OnDelete('set null');
            $table->foreignId('id_usuario')
                ->nullable()
                ->references('id')->on('users')
                ->OnDelete('set null');
            $table->text('descripcion');
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
        Schema::dropIfExists('proyectos_trazas');
    }
}