<?php

namespace App\Services;

 use App\Carrera;

 class Carreras{
     public function getCar(){
        $carreras = Carrera::get();

        $carrerasArray[''] = 'Seleccione una carrera';
        foreach($carreras as $carrera){
            $carrerasArray[$carrera->id] = $carrera->nombre;
        }
 
        return $carrerasArray;
     }
 }