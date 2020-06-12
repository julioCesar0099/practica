<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //
    public function Facultad()
    {
            return $this->belongsTo(Facultad::class);
    }

    public function Area()
    {
            return $this->belongsTo(Area::class);
    }
}
