<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    public function persona()
    {
            return $this->belongsTo(personas::class);

    }
    public function documentos()
    {
            return $this->hasMany(Documento_Post::class);
            
    }
}
