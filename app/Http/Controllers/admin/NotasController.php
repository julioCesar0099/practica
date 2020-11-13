<?php

namespace App\Http\Controllers\Admin;


use App\Combocatoria;
use App\Postulante;
use App\notas;
use App\Notasm;
use App\Seccion;
use App\Asignacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if( auth()->user()->id == 1){

            $convocatorias = Combocatoria::all();
             return view('admin.calificaciones.index', compact('convocatorias'));
        }
     
        $id= auth()->user()->id;
        $idconv= Asignacion::where('user_id','=',$id )->select('convocatoria_id')->get();

        $convocatorias= Combocatoria::find($idconv);
       
        return view('admin.calificaciones.index', compact('convocatorias'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function items(Combocatoria $convocatoria)
    {
        return view('admin.calificaciones.items',compact('convocatoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postulantes($destino ,Combocatoria $convocatoria  )
    {
           $postulantes=Postulante::where(['convocatoria_id' => $convocatoria->id, 'item_nombre' => $destino , 'estado' => 'Habilitado'])->get();

         
           return view('admin.calificaciones.postulantes' ,compact('postulantes','destino','convocatoria'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function calificar(Postulante $postulante ,$destino ,Combocatoria $convocatoria )
    {
        return view('admin.calificaciones.calificar',compact('postulante','destino','convocatoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function calif(Request $request,Postulante $postulante , $destino ,Combocatoria $convocatoria)
    {

        
          

            $postulante->notas()->delete();

            $descripcion=$request->descripcion;
            $nota=$request->nota;
            $z=0;
            $a=count($request->descripcion);
            for($i=0; $i< $a ; $i++){
                $n=new notas;
                $n->postulante_id=$postulante->id;
                $n->descripcion=$descripcion[$i];
                $n->nota=$nota[$i];
                $n->save();

                $z=$z+$nota[$i];
            }

            $za=$z/$a;
            
            $mer=$postulante->nota_meritos;
            $con=$za;

            $tab=$postulante->convocatoria->tabla->valor;
            $por=100-$tab;

            $fin= ($za*$por+$mer*$tab)/100;
            $postulante->nota_conocimientos=$za;
            $postulante->nota_final=$fin;
             $postulante->save();
         

             return redirect()->route('admin.calificaciones.postulantes',compact('destino','convocatoria'));
         
              

    }


    public function meritos(Postulante $postulante ,$destino ,Combocatoria $convocatoria )
    {
        $sumaseccion=0;
        $sumasubseccion=0;
        $sumainciso=0;

        return view('admin.calificaciones.meritos',compact('postulante', 'destino', 'convocatoria','sumainciso','sumaseccion','sumasubseccion'));
    }

   
    public function mer(Request $request,Postulante $postulante , $destino ,Combocatoria $convocatoria )
    {

        $postulante->notasm()->delete();

            $descripcion=$request->subseccionN;
            $nota=$request->subseccion;
            $a=count($request->subseccionN);
            for($i=0; $i< $a ; $i++){
                $n=new Notasm;
                $n->postulante_id=$postulante->id;
                $n->descripcion=$descripcion[$i];
                $n->nota=$nota[$i];
                $n->save();
            }

            $descripcion=$request->incisoN;
            $nota=$request->inciso;
            $a=count($request->incisoN);
            for($i=0; $i< $a ; $i++){
                $n=new Notasm;
                $n->postulante_id=$postulante->id;
                $n->descripcion=$descripcion[$i];
                $n->nota=$nota[$i];
                $n->save();
            }

            $descripcion=$request->subincisoN;
            $nota=$request->subinciso;
            $a=count($request->subincisoN);
            for($i=0; $i< $a ; $i++){
                $n=new Notasm;
                $n->postulante_id=$postulante->id;
                $n->descripcion=$descripcion[$i];
                $n->nota=$nota[$i];
                $n->save();
            }


        $subseccion=$request->subseccion;
        $subinciso=$request->subinciso;

       $sumsubseccion=0;
       $sumsubinciso=0;


        $a=count($request->subseccion);
        for($i=0;$i<$a;$i++)
        {
            $sumsubseccion=$sumsubseccion+$subseccion[$i];

          
        }

        $a=count($request->subinciso);
        for($i=0;$i<$a;$i++)
        {
            $sumsubinciso=$sumsubinciso+$subinciso[$i];

        }

        $tablasumasubseccion=$request->sumasubseccion;
        $tablasumainciso=$request->sumainciso;

        if($sumsubinciso > $tablasumainciso){
            $sumsubinciso=$tablasumainciso;
        }

        $total= $sumsubseccion +$sumsubinciso;

        $conocimientos=$postulante->nota_conocimientos;


        $tab=$postulante->convocatoria->tabla->valor;
        $por=100-$tab;

        $fin= ($conocimientos*$por+$total*$tab)/100;

        
        $postulante->nota_meritos=$total;
        $postulante->nota_final=$fin;
        $postulante->save();

        return redirect()->route('admin.calificaciones.postulantes',compact('destino','convocatoria'));
    }


    public function notas(Combocatoria $convocatoria)
    {

        $postulantes = Postulante::where([ 'convocatoria_id' => $convocatoria->id ,'estado' => 'Habilitado'])->get();

         return view('admin.calificaciones.notas',compact('postulantes','convocatoria'));
    }


    public function publicar(Combocatoria $convocatoria)
    {   
        $convocatoria->notas= 1 ;
        $convocatoria->save();

        return redirect()->route('admin.calificaciones.index')->with('flash','las Notas han sido publicadas');

    }
}

