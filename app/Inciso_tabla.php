<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inciso_tabla extends Model
{
     public function Subincisos()
    {
         return $this->hasMany(Subinciso_tabla::class);
    }
 
  
    public function Tabla()
    {
            return $this->belongsTo(Tabla::class);
    }
}
