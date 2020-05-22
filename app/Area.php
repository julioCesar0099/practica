<?php

namespace App;

use App\Facultad;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    
    public function Facultad($value='')
    {
            return $this->belongsTo(Facultad::class);
    }
}
