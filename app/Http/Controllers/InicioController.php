<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Combocatoria;

use  Illuminate\Support\Facades\Hash;
class InicioController extends Controller
{
    public function index(){
        return view('inicio', ['convocatorias'=>Combocatoria::latest('fecha_inicio')->get()]);
    }

    public function mostrar($id){
        $combocatoria=Combocatoria::findOrFail($id);
        return view('nota',compact('combocatoria'));
    }
}
