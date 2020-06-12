<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabla extends Model
{
   
    public function incisos()
    {
         return $this->hasMany(Inciso_tabla::class);
    } 
    
    public function subincisos()
    {
         return $this->hasMany(Subinciso_tabla::class);
    }
}
