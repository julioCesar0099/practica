<?php

namespace App\Services;

 use App\Ocupacion;

 class Ocupaciones{
     public function getOp(){
        $ocupaciones = Ocupacion::get();

        $OcupacionesArray[''] = 'Seleccione una ocupacion';
        foreach($ocupaciones as $ocupacion){
            $OcupacionesArray[$ocupacion->id] = $ocupacion->nombre;
        }
 
        return $OcupacionesArray;
     }
 }