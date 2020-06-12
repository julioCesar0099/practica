<?php

namespace App\Http\Controllers\Admin;

use App\Combocatoria;
use App\Documento_Combocatoria;
use App\Requisito_Combocatoria;
use App\Item;
use App\Itemlab;
use App\Facultad;
use App\Area;
use App\Tabla;
use App\Carrera;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CombocatoriaController extends Controller
{
    //

    public function index()
    {

            if( auth()->user()->hasPermissionTo('ver convocatorias')){

                $combocatorias= Combocatoria::all();

                return view('admin.combocatorias.index',compact('combocatorias')); 
            }

            return view('admin.dashboard');
                
            
    }

    public function create(){


            if( auth()->user()->hasPermissionTo('crear convocatorias')){

                $carreras= Carrera::all();
                $facultades = Facultad::all();
                $areas = Area::all();
                $tablasDoc = Tabla::where('tipo','Asignatura')->get();
                $tablasLab = Tabla::where('tipo','Laboratorios')->get();
                return view ('admin.combocatorias.create',compact('facultades','areas','carreras','tablasDoc','tablasLab')); 
            }
    
            return view('admin.dashboard');

    }

    public function store ( Request $request){

        if($request->tituloDoc)
        {
         
        $this->validate($request, [
            'tituloDoc'=> 'required',
            'descripcion'=> 'required',
            'fecha_fin'=> 'required',
            'facultad'=> 'required',
            'area'=> 'required',
            'tabla'=> 'required',
            'carreras'=> 'required',
            'documentos'=> 'required',
            'requisito'=> 'required',
            'cantidad_aux'=> 'required',
            'horas'=> 'required',
            'destino'=> 'required'

        ]);


        $conv = new Combocatoria;
        $conv-> titulo = $request->get('tituloDoc');
        $conv-> descripcion = $request->get('descripcion');
        $conv-> tipo = 'Asignatura';
        $conv-> fecha_inicio = Carbon::now();
        $conv-> fecha_fin = Carbon::parse($request->get('fecha_fin'));
        $conv-> area_id = $request->get('area');
        $conv-> tabla_id = $request->get('tabla');
        $conv-> facultad_id = $request->get('facultad');

        $conv-> save();
        $conv->Carreras()->attach($request->get('carreras'));


        $array= $request->get('documentos');
        $a= count($request->get('documentos'));
        for ($i=0; $i<$a;$i++)
            {
            $doc = new Documento_Combocatoria;
            $doc-> combocatoria_id = $conv->id;
            $doc-> detalle = $array[$i];
            $doc-> save();
         }


        $array2= $request->get('requisito');
        $a2= count($request->get('requisito'));
        for ($i=0; $i<$a2;$i++)
            {
                $doc = new Requisito_Combocatoria;
                $doc-> combocatoria_id = $conv->id;
                $doc-> detalle = $array2[$i];
                $doc-> save();
            }


        $array3= $request->get('cantidad_aux');
        $array4= $request->get('horas');
        $array5= $request->get('destino');
        $a3= count($request->get('horas'));
        for ($i=0; $i<$a3;$i++)
            {
                $doc = new Item;
                $doc-> combocatoria_id = $conv->id;
                $doc-> area_id = $request->get('area');
                $doc-> cantidad_aux= $array3[$i];
                $doc-> horas = $array4[$i];
                $doc-> destino = $array5[$i];
                $doc-> save();
            }

        return redirect()->route('admin.combocatorias.index')->with('flash','La combocatoria a sido publicada');
        }
        else{
            $this->validate($request, [
                'tituloLab'=> 'required',
                'descripcion'=> 'required',
                'fecha_fin'=> 'required',
                'facultad'=> 'required',
                'area'=> 'required',
                'tabla'=> 'required',
                'carreras'=> 'required',
                'documentos'=> 'required',
                'requisito'=> 'required',
                'cantidad_aux'=> 'required',
                'horas'=> 'required',
                'nombre'=> 'required',
                'codigo'=> 'required'
    
            ]);
    
    
            $conv = new Combocatoria;
            $conv-> titulo = $request->get('tituloLab');
            $conv-> descripcion = $request->get('descripcion');
            $conv-> tipo = 'Laboratorios';
            $conv-> fecha_inicio = Carbon::now();
            $conv-> fecha_fin = Carbon::parse($request->get('fecha_fin'));
            $conv-> area_id = $request->get('area');
            $conv-> tabla_id = $request->get('tabla');
            $conv-> facultad_id = $request->get('facultad');
    
            $conv-> save();
            $conv->Carreras()->attach($request->get('carreras'));
    
    
            $array= $request->get('documentos');
            $a= count($request->get('documentos'));
            for ($i=0; $i<$a;$i++)
                {
                $doc = new Documento_Combocatoria;
                $doc-> combocatoria_id = $conv->id;
                $doc-> detalle = $array[$i];
                $doc-> save();
             }
    
    
            $array2= $request->get('requisito');
            $a2= count($request->get('requisito'));
            for ($i=0; $i<$a2;$i++)
                {
                    $doc = new Requisito_Combocatoria;
                    $doc-> combocatoria_id = $conv->id;
                    $doc-> detalle = $array2[$i];
                    $doc-> save();
                }
    
    
            $array3= $request->get('cantidad_aux');
            $array4= $request->get('horas');
            $array5= $request->get('nombre');
            $array6= $request->get('codigo');
            $a3= count($request->get('horas'));
            for ($i=0; $i<$a3;$i++)
                {
                    $doc = new Itemlab;
                    $doc-> combocatoria_id = $conv->id;
                    $doc-> area_id = $request->get('area');
                    $doc-> cantidad_aux= $array3[$i];
                    $doc-> horas = $array4[$i];
                    $doc-> nombre = $array5[$i];
                    $doc-> codigo = $array6[$i];
                    $doc-> save();
                }
    
            return redirect()->route('admin.combocatorias.index')->with('flash','La combocatoria a sido publicada');
        }
    }


    public function destroy(Combocatoria $combocatoria){

                 if( auth()->user()->hasPermissionTo('eliminar convocatorias')){
                    $combocatoria->Carreras()->detach();
                    $combocatoria->Documentos()->delete();
                    $combocatoria->Requisitos()->delete();
                    $combocatoria->Items()->delete();
                    $combocatoria->Itemlabs()->delete();
    
                    $combocatoria->delete();
            
                    return redirect()->route('admin.combocatorias.index')->with('flash','la combocatoria ha sido eliminado');
                 }
                 return back()->with('flash','no puedes');
        

        
        
       
    }

    public function getCarreras($id)
    {


        if($request->ajax()){


            $carreras = Carrera::where('area_id', $id)->get();
            foreach ($carreras as $carrera ){
                    $carrerasArray[$carrera->id] = $carrera->nombre ;
            }
            return response()->json($carrerasArray);
        }


    }
}
