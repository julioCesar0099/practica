<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subinciso extends Model
{

    public function inciso()
    {
            return $this->belongsTo(Inciso::class);
    }
}
