<?php

namespace App\Http\Controllers\Admin;

use App\Combocatoria;
use App\Documento_Combocatoria;
use App\Requisito_Combocatoria;
use App\Item;
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

        $doc = new Documento_Combocatoria;
        $doc-> combocatoria_id = $conv->id;
        $doc-> detalle = $request->get('detalle_documento');
        $doc-> save();

        $doc = new Requisito_Combocatoria;
        $doc-> combocatoria_id = $conv->id;
        $doc-> detalle = $request->get('detalle_requisito');
        $doc-> save();


        $doc = new Item;
        $doc-> combocatoria_id = $conv->id;
        $doc-> area_id = $request->get('area');
        $doc-> cantidad_aux= $request->get('cantidad_aux');
        $doc-> horas = $request->get('horas');
        $doc-> destino = $request->get('destino');
        $doc-> save();

        

        return back()->with('flash','La combocatoria a sido publicada');
    }

    public function destroy(Combocatoria $combocatoria){

        $combocatoria->delete();

        return redirect()->route('admin.combocatorias.index')->with('flash','la combocatoria ha sido eliminado');
    }
}
