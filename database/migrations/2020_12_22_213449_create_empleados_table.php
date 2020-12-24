<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->integer('id');
            $table->date('fecha_alta');
            $table->string('ap_paterno');
            $table->string('ap_materno');
            $table->string('nombre');
            $table->string('RFC');
            $table->string('telefono');
            $table->char('genero');
            $table->string('correo');
            $table->string('avatar')->nullable();
            $table->string('estatus')->default('activo');
            $table->string('puesto');
            $table->string('Tcontrato');
            //Documentos Escaneados
            $table->string('contrato');
            $table->string('creden_elect');
            $table->string('acta_nac');
            $table->string('curriculum');
            $table->string('solicitud');
            $table->string('cert_medico');
            $table->string('cart_recomend');
            $table->string('fotografia');
            $table->string('const_Noinhab');
            $table->string('comp_Dom');
            $table->string('licencia');
            $table->string('nss');
            $table->string('infonavit');
            $table->string('rfc_doc');
            $table->string('cartilla');
            $table->string('curp');
            $table->string('diploma');
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
        Schema::dropIfExists('empleados');
    }
}
