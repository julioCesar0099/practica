<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected  $guarded = [];
    
    protected $table = 'facultads';
    protected $fillable =['nombre']; 
}
