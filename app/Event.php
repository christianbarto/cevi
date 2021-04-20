<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table= 'evento';

    //
    protected $fillable = [
        'titulo','detalleTitulo','empleado', 'descripcion', 'fecha',
    ];

    public $timestamps = false;
}