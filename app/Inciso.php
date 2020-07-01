<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inciso extends Model
{
    public function subincisos()
    {
         return $this->hasMany(Subinciso::class);
    }

    public function subseccion()
    {
            return $this->belongsTo(Subseccion::class);
    }
    
}
