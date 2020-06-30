<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subseccion extends Model
{
    public function incisos()
    {
         return $this->hasMany(Inciso::class);
    }

    public function tieneIncisos(Subseccion $subseccion )
    {
        
        $incisos=Inciso::where('subseccion_id', $subseccion->id )->get();

        if( count($incisos)!= 0 )
        {
            return 1 ;
        }else{
            return 0;
        }
        
    }
}
