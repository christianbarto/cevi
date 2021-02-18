<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelojsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relojs', function (Blueprint $table) {
            $table->string('id');
            $table->string('RFC');
            $table->string('nombre');
            $table->date('fecha');
            $table->time('entrada');
            $table->time('salida');
            $table->string('incidencia');
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
        Schema::dropIfExists('relojs');
    }
}
