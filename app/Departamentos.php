<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    protected $fillable = [
        'id','descripcion','status',
    ];
}
