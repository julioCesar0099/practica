<?php

namespace App\Http\Controllers\Admin;

use App\Combocatoria;
use App\Facultad;
use App\Area;
use App\Carrera;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CombocatoriaController extends Controller
{
    //

    public function index()
    {
        $combocatorias= Combocatoria::all();

        return view('admin.combocatorias.index',compact('combocatorias')); 
    }

    public function create(){

        $carreras= Carrera::all();
        $facultades = Facultad::all();
        $areas = Area::all();
        return view ('admin.combocatorias.create',compact('facultades','areas','carreras'));
    }

    public function store ( Request $request){

        $this->validate($request, [
            'titulo'=> 'required',
            'descripcion'=> 'required',
            'area'=> 'required',
            'tabla'=> 'required',
            'carreras'=> 'required'
        ]);


        $conv = new Combocatoria;
        $conv-> titulo = $request->get('titulo');
        $conv-> descripcion = $request->get('descripcion');
        $conv-> fecha_inicio = Carbon::now();
        $conv-> fecha_fin = Carbon::parse($request->get('fecha_fin'));
        $conv-> area_id = $request->get('area');
        $conv-> tabla_id = $request->get('tabla');
        $conv-> facultad_id = $request->get('facultad');

        $conv-> save();

        $conv->Carreras()->attach($request->get('carreras'));


        return back()->with('flash','La combocatoria a sido publicada');
    }

    public function destroy(Combocatoria $combocatoria){

        $combocatoria->delete();

        return redirect()->route('admin.combocatorias.index')->with('flash','la combocatoria ha sido eliminado');
    }
}
