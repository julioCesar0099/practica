<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subseccion extends Model
{
    public function incisos()
    {
         return $this->hasMany(Inciso::class);
    }

}
