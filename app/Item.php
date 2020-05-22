<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{


    public function Combocatoria($value='')
    {
            return $this->belongsTo(Combocatoria::class);
    }

    public function Area($value='')
    {
            return $this->belongsTo(Area::class);
    }
}
