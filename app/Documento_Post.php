<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento_Post extends Model
{
    public function postulante()
    {
            return $this->belongsTo(Postulante::class);
    }
}
