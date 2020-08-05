<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    public function user()
    {
            return $this->belongsTo(User::class);
    }

    public function convocatorias($id)
    {

            $idConv = Asignacion::where('user_id','=',$id)->select('convocatoria_id')->get();
            $convocatoria = Combocatoria::find($idConv);
            return $convocatoria;
    }


    public function convocatoria()
    {
        return $this->belongsTo(Combocatoria::class);
    }

}
