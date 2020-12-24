<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
        'id', 'fecha_alta','RFC', 'telefono', 'role_id','genero',
        'ap_paterno','ap_materno','nombre','correo','avatar','estatus',
        'puesto','Tcontrato','contrato','creden_elect','acta_nac','curriculum',
        'solicitud','cert_medico','cart_recomend','fotografia','const_Noinhab',
        'comp_Dom','licencia','nss','infonavit','rfc_doc','cartilla','curp',
        'diploma'
    ];
}
