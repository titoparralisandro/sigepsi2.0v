<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BancaSituaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banca_situaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_necesidad')
                ->references('id')->on('necesidades')
                ->OnDelete('set null');
            $table->foreignId('id_carrera')
                ->references('id')->on('carreras')
                ->OnDelete('set null');
            $table->foreignId('id_especialidad')
                ->references('id')->on('especialidades')
                ->OnDelete('set null');
            $table->foreignId('id_linea_investigacion')
                ->references('id')->on('lineas_investigaciones')
                ->OnDelete('set null');
            $table->string('situacion');
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
        //
        Schema::dropIfExists('banca_situaciones');
    }
}
