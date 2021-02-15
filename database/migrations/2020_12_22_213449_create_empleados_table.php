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
            $table->bigIncrements('id');
            $table->date('fecha_alta');
            $table->date('fecha_baja')->nullable('yes');
            $table->date('fecha_nombramiento')->nullable('yes');
            $table->string('ap_paterno');
            $table->string('ap_materno');
            $table->string('nombre');
            $table->string('RFC');
            $table->string('telefono');
            $table->string('genero');
            $table->string('correo')->nullable('yes');
            $table->string('avatar')->default('/storage/avatardefalut.png')->nullable('yes');
            $table->string('estatus')->default('activo');
            $table->string('puesto');
            $table->string('Tcontrato');
            $table->integer('quinquenio')->nullable('yes')->default(0);
            //Documentos Escaneados
            $table->string('contrato')->nullable('yes');
            $table->string('creden_elect');
            $table->string('acta_nac');
            $table->string('curriculum');
            $table->string('solicitud');
            $table->string('cert_medico');
            $table->string('cart_recomend');
            $table->string('fotografia');
            $table->string('const_Noinhab');
            $table->string('comp_Dom');
            $table->string('licencia')->nullable('yes');
            $table->string('nss');
            $table->string('infonavit')->nullable('yes');
            $table->string('rfc_doc');
            $table->string('cartilla')->nullable('yes');
            $table->string('curp');
            $table->string('diploma');
            $table->string('nombramiento')->nullable('yes');
            $table->string('dictamen');
            $table->string('adicionales')->nullable('yes');
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
