<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Combocatoria;

class InicioController extends Controller
{
    public function index(){
        return view('inicio', ['convocatorias'=>Combocatoria::all()]);
    }
}
