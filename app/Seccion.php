<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    public function subsecciones()
    {
         return $this->hasMany(Subseccion::class);
    }

    public function tabla()
    {
            return $this->belongsTo(Tabla::class);
    }
}
