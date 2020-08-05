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
    
    public function asignaciones()
    {
            return $this->hasMany(Asignacion::class);
    }

    
    public function Area()
    {
            return $this->belongsTo(Area::class);
    }

    public function Carreras()
    {
            return $this->belongsToMany(Carrera::class);
    }

    public function Documentos()
   {
        return $this->hasMany(Documento_combocatoria::class);
   }

   public function Requisitos()
   {
         return $this->hasMany(Requisito_combocatoria::class);
   }

    public function Items()
    {
        return $this->hasMany(Item::class);
    }
    public function Itemlabs()
    {
        return $this->hasMany(Itemlab::class);
    }

    public function Tabla()
    {
            return $this->belongsTo(Tabla::class);
    }
    public function postulantes()
    {
            return $this->hasMany(Postulante::class);
    }

    public function Eventos()
    {
        return $this->hasMany(Eventos::class);
    }
   

    public function ocupado( $id , $idconv )
    {  
           
           $ocupado = Asignacion::where([ 'user_id' => $id ,'convocatoria_id' =>$idconv])->select('id')->get();
        
            
                if( !$ocupado->isEmpty())
                {
                        return 1;
                }
                else{

                        return 0;
                }
    }
}
