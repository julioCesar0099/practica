<?php

namespace App\Services;

 use App\Facultad;

 class Facultades{
     public function get(){
        $facultades = Facultad::get();

        $facultadesArray[''] = 'Seleccione una facultad';
        foreach($facultades as $facultad){
            $facultadesArray[$facultad->id] = $facultad->nombre;
        }
 
        return $facultadesArray;
     }
 }