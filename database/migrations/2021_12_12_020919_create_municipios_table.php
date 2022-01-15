<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->unsignedBigInteger('id_estado')->nullable();
            $table->string('municipio');
            $table->id('id_municipio');

            $table->foreign('id_estado')
                ->references('id_estado')->on('estados')
                ->OnDelete('set null');
        });
    }

}
