<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
          'id'          =>'2S0101A',
          'descripcion' =>'AUXILIAR 1A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2S0108A',
          'descripcion' =>'AUXILIAR DE OFICINA 1A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2S0302A',
          'descripcion' =>'AUXILIAR 3A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2S0313A',
          'descripcion' =>'AUXILIAR DE OFICINA 3A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2Y0307',
          'descripcion' =>'ADMINISTRATIVO',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2A0404A',
          'descripcion' =>'AUX. TECNICO 4A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2A0417A',
          'descripcion' =>'OFICIAL ADMINISTRATIVO 4A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2A0508A',
          'descripcion' =>'OFICIAL ADMINISTRATIVO 5A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2A0508C',
          'descripcion' =>'OFICIAL ADMINISTRATIVO 5C',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2Y0503',
          'descripcion' =>'SECRETARIA DE JEFE DE DEPTO.',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2A0609A',
          'descripcion' =>'OFICIAL ADMINISTRATIVO 6A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2A0609B',
          'descripcion' =>'OFICIAL ADMINISTRATIVO 6B',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2A0609C',
          'descripcion' =>'OFICIAL ADMINISTRATIVO 6C',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2A0706A',
          'descripcion' =>'OFICIAL ADMINISTRATIVO 7A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2A0706C',
          'descripcion' =>'OFICIAL ADMINISTRATIVO 7C',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2Y0702',
          'descripcion' =>'SECRETARIA EJECUTIVA DE DIRECTOR',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2A0801A',
          'descripcion' =>'OFICIAL ADMINISTRATIVO 8A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2A0801C',
          'descripcion' =>'OFICIAL ADMINISTRATIVO 8C',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2A0901A',
          'descripcion' =>'OFICIAL ADMINISTRATIVO 9A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2A0901C',
          'descripcion' =>'OFICIAL ADMINISTRATIVO 9C',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2M1014A',
          'descripcion' =>'TECNICO 10A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2M1014C',
          'descripcion' =>'TECNICO 10C',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2M1109A',
          'descripcion' =>'TECNICO 11A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2M1109B',
          'descripcion' =>'TECNICO 11B',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2M1109C',
          'descripcion' =>'TECNICO 11C',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2N1111',
          'descripcion' =>'TRABAJADOR SOCIAL',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2E1207A',
          'descripcion' =>'TECNICO 12A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2E1207C',
          'descripcion' =>'TECNICO 12C',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2Y1202',
          'descripcion' =>'ANALISTA',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2N1325',
          'descripcion' =>'SUPERVISOR DE OBRA',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2P1304A',
          'descripcion' =>'ANALISTA 13A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2P1304B',
          'descripcion' =>'ANALISTA 13B',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2P1304C',
          'descripcion' =>'ANALISTA 13C',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2P1307C',
          'descripcion' =>'CONTADOR 13C',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2P1309A',
          'descripcion' =>'INGENIERO 13A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2P1309C',
          'descripcion' =>'INGENIERO 13C',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2P1312C',
          'descripcion' =>'PROYECTISTA 13C',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2P1329A',
          'descripcion' =>'TECNICO ESPECIALIZADO 13A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2P1329B',
          'descripcion' =>'TECNICO ESPECIALIZADO 13B',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2P1329C',
          'descripcion' =>'TECNICO ESPECIALIZADO 13C',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2N1504',
          'descripcion' =>'JEFE DE OFICINA',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'2Y1504',
          'descripcion' =>'JEFE DE OFICINA',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'0J1702A',
          'descripcion' =>'JEFE DE DEPARTAMENTO',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'0J1710B',
          'descripcion' =>'JEFE DE DEPARTAMENTO',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'0S1810A',
          'descripcion' =>'JEFE DE UNIDAD',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'0C1909A',
          'descripcion' =>'JEFE DE UNIDAD ',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'0C1917A',
          'descripcion' =>'COORDINADOR 19A',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'0F2014A',
          'descripcion' =>'DIRECTOR DE AREA DESCENT.',
          'status'      =>'activo',
          ]);

        DB::table('categorias')->insert([
          'id'          =>'0D2210B',
          'descripcion' =>'DIRECTOR GENERAL',
          'status'      =>'activo',
          ]);

    }
}
