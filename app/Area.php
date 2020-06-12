<?php

namespace App;

use App\Facultad;
use App\Carrera;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    
    public function Facultad()
    {
            return $this->belongsTo(Facultad::class);
    }

    public function Carreras()
    {
         return $this->hasMany(Carrera::class);
    }
}
