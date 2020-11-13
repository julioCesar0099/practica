<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    public function convocatoria()
    {
            return $this->belongsTo(Combocatoria::class);

    }

    public function persona()
    {
            return $this->belongsTo(personas::class);

    }
    public function documentos()
    {
            return $this->hasMany(Documento_Post::class);
            
    }
    public function notas()
   {
         return $this->hasMany(notas::class);
   }

   public function notasm()
   {
         return $this->hasMany(Notasm::class);
   }
}
