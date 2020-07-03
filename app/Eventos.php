<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    protected $dates =['fecha'];
    public function Combocatoria()
    {
            return $this->belongsTo(Combocatoria::class);
    }
}
