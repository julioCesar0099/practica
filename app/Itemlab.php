<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itemlab extends Model
{
    
    public function Combocatoria()
    {
            return $this->belongsTo(Combocatoria::class);
    }

    public function Area()
    {
            return $this->belongsTo(Area::class);
    }
}
