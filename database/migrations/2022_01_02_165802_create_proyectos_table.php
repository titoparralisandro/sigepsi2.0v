<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique();

            // $table->foreign('id_situacion')
            //     ->references('id')->on('necesidades')
            //     ->OnDelete('set null');
            // $table->text('situacion');
            // $table->text('objetivo_general')->unique();

            $table->text('sinopsis');

            // $table->foreignId('id_estatus_proyecto')
            //     ->nullable()
            //     ->references('id')->on('estatus_proyectos')
            //     ->OnDelete('set null');

            // $table->text('conclusiones');
            // $table->text('recomendaciones');

            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            $table->foreignId('id_carrera')
                ->references('id')->on('carreras')
                ->OnDelete('set null');
            $table->foreignId('id_especialidad')
                ->references('id')->on('especialidades')
                ->OnDelete('set null');
            $table->foreignId('id_linea_investigacion')
                ->references('id')->on('lineas_investigaciones')
               ->OnDelete('set null');
            $table->foreignId('id_trayecto')
                ->references('id')->on('trayectos')
                 ->OnDelete('set null');

            $table->foreignId('id_comunidad')
                ->references('id')->on('comunidades')
                ->OnDelete('set null');
            $table->foreignId('id_estado')
               ->references('id_estado')->on('estados')
               ->OnDelete('set null');
            $table->foreignId('id_municipio')
               ->references('id_municipio')->on('municipios')
               ->OnDelete('set null');
            $table->foreignId('id_parroquia')
               ->references('id_parroquia')->on('parroquias')
               ->OnDelete('set null');
            $table->string('direccion');

            // $table->integer('cedula_tutor_comunitario');
            // $table->string('tutor_comunitario',50);
            // $table->integer('celular_tutor_comunitario');

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
        Schema::dropIfExists('proyectos');
    }
}
