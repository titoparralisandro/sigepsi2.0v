<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')
                ->nullable()
                ->references('id')->on('users')
                ->OnDelete('set null');
            $table->string('primer_nombre',15);
            $table->string('segundo_nombre',15);
            $table->string('primer_apellido',15);
            $table->string('segundo_apellido',15);
            $table->integer('cedula')->unique();
            $table->text('telefono')->unique();
            $table->string('email',100)->unique()->nullable();
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
        Schema::dropIfExists('profesores');
    }
}
