<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reloj extends Model
{
    protected $fillable = [
        'id','RFC', 'nombre','entrada','salida',
    ];
}
