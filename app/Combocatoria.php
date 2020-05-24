<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combocatoria extends Model
{
    protected $dates =['fecha_inicio','fecha_fin'];



    public function Facultad()
    {
            return $this->belongsTo(Facultad::class);
    }

    
    public function Area()
    {
            return $this->belongsTo(Area::class);
    }

    public function Carreras()
    {
            return $this->belongsToMany(Carrera::class);
    }

   
}
