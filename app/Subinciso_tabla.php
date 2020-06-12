<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subinciso_tabla extends Model
{
   
    public function Inciso()
    {
            return $this->belongsTo(Inciso_tabla::class);
    }

    public function Tabla()
    {
            return $this->belongsTo(Tabla::class);
    }
}
