<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class files extends Model
{
    protected $fillable = [
        'nombre','empleado_id','dir'
    ];
}
