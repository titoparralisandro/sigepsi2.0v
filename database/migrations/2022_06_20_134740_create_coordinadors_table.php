<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoordinadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinadors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->string('telefono_contacto');
            $table->string('email',60)->unique();
            $table->foreignId('id_user')
                ->nullable()
                ->references('id')->on('users')
                ->OnDelete('set null');
            $table->foreignId('id_carrera')
                ->references('id')->on('carreras')
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
        Schema::dropIfExists('coordinadors');
    }
}
