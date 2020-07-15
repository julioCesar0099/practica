<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\personas;
use App\Documento_Post;
use App\Postulante;
use App\Combocatoria;
use App\Documento_Combocatoria;
use App\Item;
class PostulantController extends Controller
{
    public function registroPost(Combocatoria $convocatoria){
      
            return view('postulantes.registroPost',compact('convocatoria'));
    }


    public function listaHab(Combocatoria $convocatoria){
      $listaH = Postulante::where('convocatoria_id',$convocatoria->id)->get();
      return view('postulantes.listaHab',compact('listaH'));
    }




    public function identificacion(Request $request,Combocatoria $convocatoria){
        $docC= Documento_Combocatoria::all();
        $request->validate([
           'codigo' => 'required|numeric'
        ]);

        $inputCom = $request->input('codigo');
        $codigoS = personas::where('codigoSIS', $inputCom)->get()->first();
        //dd($codigoS);
          if($codigoS) {
            return view('postulantes.regPostulante',compact('codigoS','convocatoria','docC'));
        //    $areas= App\Area::all();
        //    $items= App\Item::all();
        //    return view('regPostulante', compact('areas','items','codigoS'));

          }else{
           
             return view('postulantes.registroPost', compact('convocatoria','docC'))->with('mensaje','El codigo sis es incorrecto');
        }
    }
    

    public function regPostulante(personas $codigoS,Combocatoria $convocatoria){
     
        $codigoS = \DB::table('personas')->where('id', $id)->first();
        //dd($codigoS);
        $areas= App\Area::all();
      //  $areas= App\Area_Post::all();
        $items= App\Item::all();
      //  $items= App\Item_Post::all();
        $documentos = App\Documento_Post::all();
        $docC= Documento_Combocatoria::all();
        return view('postulantes.regPostulante', compact('codigoS','convocatoria','docC'));
    }


    public function crear(Request $request,personas $codigoS,Combocatoria $convocatoria){
      $request->validate([
          'items' => 'required',
          'num_Hojas' => 'required'
             
      ]);
     // $idPersona = \DB::table('personas')->where('codigoSIS',$codigoS)->get();
      
       $destino = $request->items;
       $id = $codigoS->id;
       $comparar = \DB::table('personas')->where('persona_id',$id)
     ->join('postulantes','persona_id','=','personas.id')
     ->join('combocatorias','convocatoria_id','=','combocatorias.id')
     ->join('items','combocatoria_id','=','combocatorias.id')
     ->where('item_nombre',$destino)->get();
     //dd($comparar);
       $cantidadPost = count($comparar);
       if($cantidadPost>1){
       return view('postulantes.regPostulante',compact('convocatoria','codigoS'))->with('error','Ya se postulo a este item');
     }
     else {
      if($request->aceptar)
      {
        $postulanteNuevo = new App\Postulante;
        $postulanteNuevo->convocatoria_id = $convocatoria->id;
        $postulanteNuevo->item_nombre = $request->items;
        $postulanteNuevo->persona_id = $codigoS->id;
        $postulanteNuevo->estado = 'Deshabilitado';
        $postulanteNuevo->observacion = "";
        $postulanteNuevo->save();

        $documentosNuevo = new Documento_Post;
        $documentosNuevo->postulantes_id = $codigoS->id;
        $documentosNuevo->Doc_Ent = count($convocatoria->documentos); 
        $documentosNuevo->num_Hojas= $request->num_Hojas;
        $documentosNuevo->save();
        return view('postulantes.regPostulante',compact('codigoS','convocatoria'))->with('error','Registro agregado!');
      }else{
        return view('postulantes.regPostulante',compact('codigoS','convocatoria'))->with('error','Debe aceptar presentar todos los documentos!');
        }   
     }
    }

    


    public function verNotas(Combocatoria $convocatoria)
    {

      $postulantes;

      if($convocatoria->notas == 1)
      {
          $postulantes=  Postulante::where([ 'convocatoria_id' => $convocatoria->id ,'estado' => 'Habilitado'])->get();
      }
      else{
          $postulantes=[];
      }

      return view('notas' ,compact('convocatoria','postulantes'));

    }
}