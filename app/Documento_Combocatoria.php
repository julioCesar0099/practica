<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento_Combocatoria extends Model
{
    //
    
    public function Combocatoria($value='')
    {
            return $this->belongsTo(Combocatoria::class);
    }
}
