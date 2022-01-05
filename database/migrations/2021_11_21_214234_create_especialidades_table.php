<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidades', function (Blueprint $table) {
            $table->id();
            $table->string('especialidad')->unique();
            $table->text('descripcion');
            $table->foreignId('id_carrera')
                ->nullable()
                ->references('id')->on('carreras')
                ->OnDelete('set null');
            $table->boolean('estatus');
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
        Schema::dropIfExists('especialidades');
    }
}
