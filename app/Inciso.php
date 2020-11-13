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

    public function tieneSubincisos(Inciso $inciso )
    {
        
        $subincisos=Subinciso::where('inciso_id', $inciso->id )->get();

        if( count($subincisos)!= 0 )
        {
            return 1 ;
        }else{
            return 0;
        }
        
    }
    
}
