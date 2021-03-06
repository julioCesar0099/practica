<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Combocatoria;
use App\Postulante;
use App\Unidad;
use App\Area;

use  Illuminate\Support\Facades\Hash;
class InicioController extends Controller
{
    public function index(){
        $convocatorias=Combocatoria::latest('fecha_inicio')->paginate(3);
        
        return view('inicio',compact('convocatorias'));
    }

    public function mostrar($id){
        $combocatoria=Combocatoria::findOrFail($id);
        $idCom=$combocatoria->id;
        $post=Postulante::where('convocatoria_id', $idCom)->get();

        return view('nota',compact('combocatoria','post'));
    }


  

    
}
  