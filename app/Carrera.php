<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //
    public function Facultad($value='')
    {
            return $this->belongsTo(Facultad::class);
    }

    public function Area($value='')
    {
            return $this->belongsTo(Area::class);
    }
}
