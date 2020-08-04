<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected  $guarded = [];
     
    public function Facultad()
    {
            return $this->belongsTo(Facultad::class);
    }

    public function Carreras()
    {
         return $this->hasMany(Carrera::class);
    }

    public function convocatorias()
    {
        return $this->hasMany(Combocatoria::class);
    }

    public function unidades()
    {
        return $this->hasMany(Unidad::class);
    }
}
