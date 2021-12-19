<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunidades', function (Blueprint $table) {
            $table->id();
            $table->char('rif',10)->unique();
            $table->string('nombre')->unique();
            $table->unsignedBigInteger('id_tipo_comunidad')->nullable();
            $table->integer('telefono_contacto')->unique();
            $table->string('persona_contacto',50);
            $table->string('email',60)->unique();
            $table->unsignedBigInteger('id_estado')->nullable();
            $table->unsignedBigInteger('id_municipio')->nullable();
            $table->unsignedBigInteger('id_parroquia')->nullable();
            $table->string('direccion');

            $table->foreign('id_tipo_comunidad')
                ->references('id')->on('tipos_comunidades')
                ->OnDelete('set null');
            $table->foreign('id_estado')
                ->references('id_estado')->on('estados')
                ->OnDelete('set null');
            $table->foreign('id_municipio')
                ->references('id_municipio')->on('municipios')
                ->OnDelete('set null');
            $table->foreign('id_parroquia')
                ->references('id_parroquia')->on('parroquias')
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
        Schema::dropIfExists('comunidades');
    }
}
