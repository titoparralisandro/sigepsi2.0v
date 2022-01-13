<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')
                ->nullable()
                ->references('id')->on('users');
                
            $table->integer('cedula')->unique();

            $table->integer('nacionalidad');
            // $table->foreignId('nacionalidad')
            // ->nullable()
            // ->references('id')->on('nacionalidades');

            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();

            $table->integer('sexo');
            // $table->foreignId('sexo')
            // ->nullable()
            // ->references('id')->on('sexos');

            $table->string('fec_nac', 12);
            $table->string('email',100)->unique()->nullable();

            $table->integer('edo_res');
            // $table->foreignId('edo_res')
            // ->nullable()
            // ->references('id')->on('edo_res');
            
            $table->string('direccion');

            $table->integer('cod_carrera');
            // $table->foreignId('cod_carrera')
            // ->nullable()
            // ->references('id')->on('carreras');

            $table->integer('trayecto');
            // $table->foreignId('trayecto')
            // ->nullable()
            // ->references('id')->on('trayectos');

            $table->integer('trimestre');
            // $table->foreignId('trimestre')
            // ->nullable()
            // ->references('id')->on('trimestres');

            $table->integer('turno');
            // $table->foreignId('turno')
            // ->nullable()
            // ->references('id')->on('turnos');
            
            $table->integer('seccion');
            // $table->foreignId('seccion')
            // ->nullable()
            // ->references('id')->on('secciones');

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
        Schema::dropIfExists('personas');
    }
}
