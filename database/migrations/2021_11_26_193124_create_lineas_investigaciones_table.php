<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineasInvestigacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineas_investigaciones', function (Blueprint $table) {
            $table->id();
            $table->string('linea_investigacion')->unique();

            $table->foreignId('id_carrera')
                ->nullable()
                ->constrained('carreras')
                ->nullOnUpdate()
                ->nullOnDelete();

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
        Schema::dropIfExists('lineas_investigaciones');
    }
}
