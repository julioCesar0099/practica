<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabla extends Model
{
    public function secciones()
    {
         return $this->hasMany(Seccion::class);
    }
    
}
