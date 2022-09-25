<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstructurasEvaluacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estructuras_evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_evaluacion')
                ->nullable()
                ->references('id')->on('evaluaciones')
                ->OnDelete('set null');
            $table->foreignId('id_estructura')
                ->nullable()
                ->references('id')->on('estructuras')
                ->OnDelete('set null');
            $table->foreignId('id_items_estructura')
                ->nullable()
                ->references('id')->on('items_estructuras')
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
        Schema::dropIfExists('estructuras_evaluaciones');
    }
}
