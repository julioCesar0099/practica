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
use App\Eventos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CombocatoriaController extends Controller
{
    //

    public function edit(Combocatoria $combocatoria){
        $carreras= Carrera::all();
        $facultades = Facultad::all();
        $areas = Area::all();
        $tablasDoc = Tabla::all();
        $tablasLab = Tabla::all();
        $reqC= Requisito_Combocatoria::all();
        $docC= Documento_Combocatoria::all();
        if( $combocatoria->tipo == 'Asignatura' ){

            return view ('admin.combocatorias.edit',compact('facultades','areas','carreras','tablasDoc','tablasLab','combocatoria','reqC','docC')); 

        }else{

            return view ('admin.combocatorias.edit2',compact('facultades','areas','carreras','tablasDoc','tablasLab','combocatoria','reqC','docC')); 

        }

    }

    public function update(Request $request , Combocatoria $combocatoria){
     
        if($request->tituloDoc)
        {
         
        $this->validate($request, [
            'tituloDoc'=> 'required',
            'descripcion'=> 'required',
            'fecha_fin'=> 'required',

        ]);
        $docC= Documento_Combocatoria::all();
       
        $combocatoria->titulo = $request->get('tituloDoc');

        $combocatoria->descripcion = $request->get('descripcion');
        $combocatoria->tipo = 'Asignatura';
        $combocatoria->fecha_inicio = Carbon::now();
        $combocatoria->fecha_fin = Carbon::parse($request->get('fecha_fin'));
        $combocatoria->tabla_id = $request->get('tabla');
        $combocatoria->facultad_id = $request->get('facultad');
        
        $combocatoria->area_id = $request->get('area');
        $combocatoria->save();

        $combocatoria->Carreras()->sync($request->get('carreras'));

        $combocatoria->documentos()->delete();
        $combocatoria->items()->delete();
        $combocatoria->requisitos()->delete();

        if( $request->documentos && $request->documentos != [null]){

            $array= $request->get('documentos');
            $a= count($request->get('documentos'));
            for ($i=0; $i<$a;$i++)
            {
                $doc = new Documento_Combocatoria;
                $doc->combocatoria_id = $combocatoria->id;
                $doc->detalle = $array[$i];
                $doc->save();
            }
        }

        if( $request->requisito && $request->requisito != [null]){
            $array2= $request->get('requisito');
            $a2= count($request->get('requisito'));
            for ($i=0; $i<$a2;$i++)
                {
                    $doc= new Requisito_Combocatoria;
                    $doc->combocatoria_id = $combocatoria->id;
                    $doc->detalle = $array2[$i];
                    $doc->save();
                }
        }

        if( $request->destino && $request->destino != [null]){
            $array3= $request->get('cantidad_aux');
            $array4= $request->get('horas');
            $array5= $request->get('destino');
            $a3= count($request->get('horas'));
            for ($i=0; $i<$a3;$i++)
                {
                    $doc = new Item;
                    $doc->combocatoria_id = $combocatoria->id;
                    $doc->area_id = $request->get('area');
                    $doc->cantidad_aux= $array3[$i];
                    $doc->horas = $array4[$i];
                    $doc->destino = $array5[$i];
                    $doc->save();
                }
         }

        return redirect()->route('admin.combocatorias.index')->with('flash','La combocatoria a sido actualizada ');
        }
        else{
            $this->validate($request, [
                'tituloLab'=> 'required',
                'descripcion'=> 'required',
                'fecha_fin'=> 'required',
                
                
    
            ]);
    
            $combocatoria->titulo = $request->get('tituloLab');
            $combocatoria->descripcion = $request->get('descripcion');
            $combocatoria->tipo = 'Laboratorios';
            $combocatoria->fecha_inicio = Carbon::now();
            $combocatoria->fecha_fin = Carbon::parse($request->get('fecha_fin'));
            $combocatoria->area_id = $request->get('area');
            $combocatoria->tabla_id = $request->get('tabla');
            $combocatoria->facultad_id = $request->get('facultad');
            $combocatoria->save();
    
            $combocatoria->Carreras()->sync($request->get('carreras'));
    
            $combocatoria->documentos()->delete();
            $combocatoria->itemlabs()->delete();
            $combocatoria->requisitos()->delete();
    
            if($request->documentos && $request->documentos != [null]){

                $array= $request->get('documentos');    
                $a= count($request->get('documentos'));
                for ($i=0; $i<$a;$i++)
                {
                    $doc = new Documento_Combocatoria;
                    $doc->combocatoria_id = $combocatoria->id;
                    $doc->detalle = $array[$i];
                    $doc->save();
                }
            }
    
            if($request->requisito && $request->requisito != [null]){
    
                $array2= $request->get('requisito');
                $a2= count($request->get('requisito'));
                for ($i=0; $i<$a2;$i++)
                    {
                        $doc= new Requisito_Combocatoria;
                        $doc->combocatoria_id = $combocatoria->id;
                        $doc->detalle = $array2[$i];
                        $doc->save();
                    }
            }
    
            if($request->codigo && $request->codigo != [null]){

                $array3= $request->get('cantidad_aux');
                $array4= $request->get('horas');
                $array5= $request->get('nombre');
                $array6= $request->get('codigo');
                $a3= count($request->get('horas'));
                for ($i=0; $i<$a3;$i++)
                    {
                        $doc = new Itemlab;
                        $doc->combocatoria_id = $combocatoria->id;
                        $doc->area_id = $request->get('area');
                        $doc->cantidad_aux= $array3[$i];
                        $doc->horas = $array4[$i];
                        $doc->nombre = $array5[$i];
                        $doc->codigo = $array6[$i];
                        $doc-> save();
                    }
            }
    
            return redirect()->route('admin.combocatorias.index')->with('flash','La combocatoria a sido actualizada');
        }
    }
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
                $tablasDoc = Tabla::all();
                $tablasLab = Tabla::all();
                
                return view ('admin.combocatorias.create',compact('facultades','areas','carreras','tablasDoc','tablasLab')); 
            }
    
            return view('admin.dashboard');

    }

    public function store ( Request $request){


        if($request->tituloDoc)
        {
         
        $this->validate($request, [
            'tituloDoc'=> 'required',
            'descripcion'=> 'required'
          

        ]);


        $conv = new Combocatoria;
        $conv->titulo = $request->get('tituloDoc');
        $conv->descripcion = $request->get('descripcion');
        $conv->tipo = 'Asignatura';
        $conv->fecha_inicio = Carbon::now();
        $conv->fecha_fin = Carbon::parse($request->get('fecha_fin'));
        $conv->tabla_id = $request->get('tabla');
        $conv->facultad_id = $request->get('facultad') ;
        $conv->area_id = Area::find($area = $request->get('area'))
                             ?$area : 
                             Area::create(['nombre' => $area , 'facultad_id' => $request->get('facultad') ])->id ;
        $conv-> save();

        $carreras= [];
        if($request->carreras){

            foreach($request->get('carreras') as $carrera)
            {
                $carreras[] = Carrera::find($carrera) 
                ? $carrera
                : Carrera::create(['facultad_id' => $conv->facultad_id , 'area_id' => $conv->area_id ,'nombre'=> $carrera ])->id;
            }
            
            
            $conv->Carreras()->attach($carreras);
            
        }

        if( $request->documentos && $request->documentos != [null] )
        {

            $array= $request->get('documentos');
            $a= count($request->get('documentos'));
            for ($i=0; $i<$a;$i++)
                {
                $doc = new Documento_Combocatoria;
                $doc->combocatoria_id = $conv->id;
                $doc->detalle = $array[$i];
                $doc->save();
             }
        }

        if($request->requisito && $request->requisito != [null])
        {

            $array2= $request->get('requisito');
            $a2= count($request->get('requisito'));
            for ($i=0; $i<$a2;$i++)
                {
                    $doc = new Requisito_Combocatoria;
                    $doc-> combocatoria_id = $conv->id;
                    $doc-> detalle = $array2[$i];
                    $doc-> save();
                }
         }

         if($request->destino && $request->destino != [null])
         {
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
        }

        return redirect()->route('admin.combocatorias.index')->with('flash','La combocatoria a sido publicada');
        }
        else{
            $this->validate($request, [
                'tituloLab'=> 'required',
                'descripcion'=> 'required'
              
        
    
            ]);
    
    
            $conv = new Combocatoria;
            $conv-> titulo = $request->get('tituloLab');
            $conv-> descripcion = $request->get('descripcion');
            $conv-> tipo = 'Laboratorios';
            $conv-> fecha_inicio = Carbon::now();
            $conv-> fecha_fin = Carbon::parse($request->get('fecha_fin'));
            $conv-> tabla_id = $request->get('tabla');
            $conv-> facultad_id = $request->get('facultad');
            $conv-> area_id = Area::find($area = $request->get('area'))
                            ?$area : 
                            Area::create(['nombre' => $area , 'facultad_id' => $request->get('facultad') ])->id ;
            $conv-> save();

            $carreras= [];
            if($request->carreras){
                 foreach($request->get('carreras') as $carrera)
                    {
                            $carreras[] = Carrera::find($carrera) 
                            ? $carrera
                    : Carrera::create(['facultad_id' => $conv->facultad_id , 'area_id' => $conv->area_id ,'nombre'=> $carrera ])->id;
                    }


                    $conv->Carreras()->attach($carreras);
             }

    
            if( $request->documentos && $request->documentos != [null] ){

                $array= $request->get('documentos');
                $a= count($request->get('documentos'));
                for ($i=0; $i<$a;$i++)
                {
                    $doc = new Documento_Combocatoria;
                    $doc-> combocatoria_id = $conv->id;
                    $doc-> detalle = $array[$i];
                    $doc-> save();
                }
            }
    
            if( $request->requisito && $request->requisito != [null] ) {

                $array2= $request->get('requisito');
                $a2= count($request->get('requisito'));
                for ($i=0; $i<$a2;$i++)
                    {
                        $doc = new Requisito_Combocatoria;
                        $doc-> combocatoria_id = $conv->id;
                        $doc-> detalle = $array2[$i];
                        $doc-> save();
                    }
            }
    
            if( $request->codigo && $request->codigo != [null] ){
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
            }
    
            return redirect()->route('admin.combocatorias.index')->with('flash','La combocatoria a sido publicada');
        }
    }


    public function destroy(Combocatoria $combocatoria){

                $reqC= Requisito_Combocatoria::all();
                $docC= Documento_Combocatoria::all();
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
