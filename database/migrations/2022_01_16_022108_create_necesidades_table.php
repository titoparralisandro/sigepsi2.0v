<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNecesidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('necesidades', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_comunidad')
                ->references('id')->on('comunidades')
                ->OnDelete('set null');

            $table->text('necesidad');

            $table->foreignId('id_estatus_necesidad')
                ->references('id')->on('estatus_necesidades')
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

            $table->text('direccion');

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
        Schema::dropIfExists('necesidades');
    }
}
