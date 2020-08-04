<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    
    public function Area()
    {
            return $this->belongsTo(Area::class);
    }

    public static function unidades($id)
    {
            return Unidad::where('area_id','=',$id)->get();
    }
}
