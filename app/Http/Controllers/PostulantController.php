<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\personas;
use App\Documento_Post;
use App\Postulante;
use App\Combocatoria;
class PostulantController extends Controller
{
    public function registroPost(Combocatoria $convocatoria){
            return view('postulantes.registroPost',compact('convocatoria'));
    }


    public function listaHab(){
      $listaH = Postulante::all();
      return view('postulantes.listaHab',compact('listaH'));
    }



    public function habPostulante(){
        $listaPost = Postulante::all();
        //$listaPost= \DB::table('postulantes')->select('id','nombre','carrera','item_nombre');
        return view('postulantes.habPostulante',compact('listaPost'));
    }


    public function observacion(Request $request,Postulante $listaP){

       //$this->validate($request, ['observacion'=>'required']);
       
        $listaP->observacion = $request->observacion;
        $listaP->save();
        return back();
    }



    public function habilitar($id){
      $Postulantes=Postulante::findOrFail($id);
      $Postulantes->estado='Habilitado';
      $arrayName = array(
        'convocatoria_id' => $Postulantes->convocatoria_id,
        'item_nombre'=>$Postulantes->item_nombre,
        'estado'=>$Postulantes->estado,
        'persona_id'=>$Postulantes->persona_id,
       );
      Postulante::where('id','=',$id)->update($arrayName);
      return back();
    }

    public function deshabilitar($id){
      $Postulantes=Postulante::findOrFail($id);
      $Postulantes->estado='Deshabilitado';
      $arrayName = array(
        'convocatoria_id' => $Postulantes->convocatoria_id,
        'item_nombre'=>$Postulantes->item_nombre,
        'estado'=>$Postulantes->estado,
        'persona_id'=>$Postulantes->persona_id,
       );
      Postulante::where('id','=',$id)->update($arrayName);
      return back();
    }


    public function identificacion(Request $request,Combocatoria $convocatoria){
        
        $request->validate([
           'codigo' => 'required|numeric'
        ]);

        $inputCom = $request->input('codigo');
        $codigoS = personas::where('codigoSIS', $inputCom)->get()->first();
        //dd($codigoS);
          if($codigoS) {
            return view('postulantes.regPostulante',compact('codigoS','convocatoria'));
        //    $areas= App\Area::all();
        //    $items= App\Item::all();
        //    return view('regPostulante', compact('areas','items','codigoS'));

          }else{
           
             return view('postulantes.registroPost', compact('convocatoria'))->with('mensaje','El codigo sis es incorrecto');
        }
    }
    

    public function regPostulante(personas $codigoS,Combocatoria $convocatoria){
      return $convocatoria;
        $codigoS = \DB::table('personas')->where('id', $id)->first();
        //dd($codigoS);
        $areas= App\Area::all();
      //  $areas= App\Area_Post::all();
        $items= App\Item::all();
      //  $items= App\Item_Post::all();
        $documentos = App\Documento_Post::all();
    
        return view('postulantes.regPostulante', compact('codigoS','convocatoria'));
    }


    public function crear(Request $request,personas $codigoS,Combocatoria $convocatoria){
        //return $request->all();

        $request->validate([
            'items' => 'required',
            'documentos' => 'required',
            'num_Hojas' => 'required'
        ]);
        
       // $codigoS = \DB::table('personas')->where('id', $request->id_est)->first();
        
        //dd($codigoS);


        $postulanteNuevo = new App\Postulante;
        $postulanteNuevo->convocatoria_id = $convocatoria->id;
        $postulanteNuevo->item_nombre = $request->items;
        $postulanteNuevo->persona_id = $codigoS->id;
        $postulanteNuevo->estado = 'Deshabilitado';
        $postulanteNuevo->observacion = "";
        $postulanteNuevo->save();

        
        //$documentoNuevo->Doc_Ent = $request->documento[];
       
        
        $documentosNuevo = new Documento_Post;
        $documentosNuevo->postulantes_id = $codigoS->id;
        $documentosNuevo->Doc_Ent = count($request->documentos); 
        $documentosNuevo->num_Hojas= $request->num_Hojas;
        $documentosNuevo->save();

        return view('postulantes.regPostulante',compact('codigoS','convocatoria'))->with('mensaje','Registro agregado!');

    }
}