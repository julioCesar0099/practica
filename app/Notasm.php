<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notasm extends Model
{
    public function Postulante()
    {
            return $this->belongsTo(Postulante::class);
    }
}
