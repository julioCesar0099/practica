<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Postulante;
use App\Combocatoria;
class habilitadosController extends Controller
{
    


    public function observacion(Request $request,Postulante $listaP){

        //$this->validate($request, ['observacion'=>'required']);
        
         $listaP->observacion = $request->observacion;
         $listaP->save();
         return back();
     }


     public function itemsPost(Combocatoria $combocatoria){

          return view('postulantes.itemsPost', compact('combocatoria'));
      }


      public function postulante(Combocatoria $combocatoria,$destino){
        $postulante = Postulante::where(['convocatoria_id'=> $combocatoria->id,'item_nombre'=>$destino])->get();
      
        return view('postulantes.habPostulante',compact('postulante'));
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







}
