<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Jenssegers\Date\Date;
class Empleado extends Model
{

    protected $fillable = [
        'id', 'fecha_alta','RFC', 'telefono', 'genero',
        'ap_paterno','ap_materno','nombre','correo','avatar','estatus',
        'puesto','Tcontrato','contrato','creden_elect','acta_nac','curriculum',
        'solicitud','cert_medico','cart_recomend','fotografia','const_Noinhab',
        'comp_Dom','licencia','nss','infonavit','rfc_doc','cartilla','curp',
        'diploma'
    ];

    protected $dates =['fecha_alta',
    ];

}
