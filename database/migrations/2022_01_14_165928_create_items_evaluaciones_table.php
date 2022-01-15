<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsEvaluacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_producto')
                ->nullable()
                ->references('id')->on('productos')
                ->OnDelete('set null');
            $table->foreignId('id_items')
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
        Schema::dropIfExists('items_evaluaciones');
    }
}
