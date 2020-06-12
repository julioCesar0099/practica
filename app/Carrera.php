<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //

    protected $table = 'carreras';
    protected $fillable =['nombre'];

    public function Facultad($value='')
    {
            return $this->belongsTo(Facultad::class);
    }

    public function Area($value='')
    {
            return $this->belongsTo(Area::class);
    }
}
