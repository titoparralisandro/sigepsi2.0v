<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemEstructurasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_estructuras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_estructura')
                ->nullable()
                ->references('id')->on('estructuras')
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
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_estructuras');
    }
}
