<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notas extends Model
{
    public function Postulante()
    {
            return $this->belongsTo(Postulante::class);
    }
}
