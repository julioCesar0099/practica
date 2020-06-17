<?php

namespace App\Http\Controllers\Admin;

use App\Tabla;
use App\Inciso;
use App\Subinciso;
use App\Subseccion;
use App\Seccion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TituloController extends Controller
{

    public function titulo(Tabla $tabla )
    { 
        $i=0;
        $sum=0;
         $a= count($tabla->secciones);
        while($i< $a){
           $sum= $sum + $tabla->secciones[$i]->valor;
           $i++;
        }
        $val = ((100/$tabla->valor)*$tabla->valor)-$sum;


     
       return view('admin.tablas.titulo',compact('tabla','val'));
    }

    public function tituloDestroy(Tabla $tabla,Seccion $seccion)
    {
        $seccion->subsecciones()->delete();
        $seccion->delete();
        return redirect()->route('admin.tablas.edit',compact('tabla'))->with('flash','el titulo ha sido eliminado');
  
    }
    public function tituloStore(Request $request ,Tabla $tabla)
    {
        $this->validate($request,[ 'nombre'=>'required', 'valor'=> 'required']);

        $seccion= new Seccion;
        $seccion->nombre = $request->nombre;
        $seccion->valor = $request->valor;
        $seccion->tabla_id = $tabla->id;
        $seccion->save();

       return redirect()->route('admin.tablas.edit',compact('tabla'));
    }


    public function subtitulo(Tabla $tabla,Seccion $seccion)
    {
        $i=0;
        $sum=0;
         $a= count($seccion->subsecciones);
        while($i< $a){
           $sum= $sum + $seccion->subsecciones[$i]->puntaje;
           $i++;
        }
        $val = $seccion->valor-$sum;
       return view('admin.tablas.subtitulo',compact('tabla','seccion','val'));
    }

    public function subtituloDestroy(Tabla $tabla,Subseccion $subseccion)
    {
        $subseccion->incisos()->delete();
        $subseccion->delete();
        return redirect()->route('admin.tablas.edit',compact('tabla'))->with('flash','el subtitulo ha sido eliminado');
  
    }
    public function subtituloStore(Request $request ,Tabla $tabla,Seccion $seccion)
    {
        
        $this->validate($request,[ 'nombre'=>'required', 'valor'=> 'required']);
        $id= $seccion->id;
        $seccion= new Subseccion;
        $seccion->nombre = $request->nombre;
        $seccion->puntaje = $request->valor;
        $seccion->seccion_id= $id;
        $seccion->save();

       return redirect()->route('admin.tablas.edit',compact('tabla'));
    }

    public function inciso(Tabla $tabla,Subseccion $subseccion)
    {
        $i=0;
        $sum=0;
         $a= count($subseccion->incisos);
        while($i< $a){
           $sum= $sum + $subseccion->incisos[$i]->puntaje;
           $i++;
        }
        $val = $subseccion->puntaje-$sum;

       return view('admin.tablas.inciso',compact('tabla','subseccion','val'));
    }
    public function incisoDestroy(Tabla $tabla,Inciso $inciso)
    {
        $inciso->subincisos()->delete();
        $inciso->delete();
        return redirect()->route('admin.tablas.edit',compact('tabla'))->with('flash','el inciso ha sido eliminado');
  
    }
    public function incisoStore(Request $request ,Tabla $tabla,Subseccion $subseccion)
    {
        
        $this->validate($request,[ 'nombre'=>'required', 'valor'=> 'required']);
        $id= $subseccion->id;
        $seccion= new Inciso;
        $seccion->nombre = $request->nombre;
        $seccion->puntaje = $request->valor;
        $seccion->subseccion_id= $id;
        $seccion->save();

       return redirect()->route('admin.tablas.edit',compact('tabla'));
    }

    public function subinciso(Tabla $tabla,Inciso $inciso)
    {
        $i=0;
        $sum=0;
         $a= count($inciso->subincisos);
        while($i< $a){
           $sum= $sum + $inciso->subincisos[$i]->puntaje;
           $i++;
        }
        $val = $inciso->puntaje-$sum;

       return view('admin.tablas.subinciso',compact('tabla','inciso','val'));
    }
    public function subincisoDestroy(Tabla $tabla,Subinciso $subinciso)
    {
        $subinciso->delete();
        return redirect()->route('admin.tablas.edit',compact('tabla'))->with('flash','el subinciso ha sido eliminado');
  
    }
    public function subincisoStore(Request $request ,Tabla $tabla,Inciso $inciso)
    {
        
        $this->validate($request,[ 'nombre'=>'required', 'valor'=> 'required']);
        $id= $inciso->id;
        $seccion= new Subinciso;
        $seccion->nombre = $request->nombre;
        $seccion->puntaje = $request->valor;
        $seccion->inciso_id= $id;
        $seccion->save();

       return redirect()->route('admin.tablas.edit',compact('tabla'));
    }


}
