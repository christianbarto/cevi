<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Jenssegers\Date\Date;
class Empleado extends Model
{

    protected $fillable = [
        'id', 'fecha_alta','fecha_nombramiento','RFC', 'telefono', 'genero',
        'ap_paterno','ap_materno','nombre','correo','avatar','estatus',
        'puesto','Tcontrato','contrato','creden_elect','acta_nac','curriculum',
        'solicitud','cert_medico','cart_recomend','fotografia','const_Noinhab',
        'comp_Dom','licencia','nss','infonavit','rfc_doc','cartilla','curp',
        'diploma','dictamen','nombramiento',
    ];

    protected $dates =['fecha_alta','fecha_nombramiento'
    ];

    public function scopeNombre($query, $nombre)
    {
        if($nombre)
            return $query->where('nombre', 'LIKE', "%$nombre%")->get();
    }

    public function scopeId($query, $id)
    {
        if($id)
            return $query->where('id', 'LIKE', "%$id%")->get();
    }

    public function scopeRFC($query, $RFC)
    {
        if($RFC)
            return $query->where('RFC', 'LIKE', "%$RFC%")->get();
    }

}
