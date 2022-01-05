<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstructurasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estructuras', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_carrera')
                ->nullable()
                ->references('id')->on('carreras')
                ->OnDelete('set null');

            $table->foreignId('id_linea_investigacion')
                ->nullable()
                ->references('id')->on('lineas_investigaciones')
                ->OnDelete('set null');
            
            $table->foreignId('id_trayecto')
                ->nullable()
                ->references('id')->on('trayectos')
                ->OnDelete('set null');
            
            $table->foreignId('id_producto')
                ->nullable()
                ->references('id')->on('productos')
                ->OnDelete('set null');

            $table->foreignId('id_items')
                ->nullable()
                ->references('id')->on('items_estructuras')
                ->OnDelete('set null');

            $table->integer('peso');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations. carrera trayecto linea_investigacio producto item
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estructuras');
    }
}
