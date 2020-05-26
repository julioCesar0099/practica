<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class PostulantController extends Controller
{
    public function registroPost(){
            return view('postulantes.registroPost');
    }


    public function identificacion(Request $request){

        $request->validate([
           'codigo' => 'required|numeric'
        ]);

        $inputCom = $request->input('codigo');
        $codigoS = \DB::table('personas')->where('codigoSIS', $inputCom)->get()->first();
        //dd($codigoS);
          if($codigoS) {
            return redirect()->route('regPostulante', ['estudiante'=>$codigoS->id]);
        //    $areas= App\Area::all();
        //    $items= App\Item::all();
        //    return view('regPostulante', compact('areas','items','codigoS'));

          }else{
           
             return view('postulantes.registroPost')->with('mensaje','El codigo sis es incorrecto');
        }
    }
    

    public function regPostulante($id){
        $codigoS = \DB::table('personas')->where('id', $id)->first();
        //dd($codigoS);
        $areas= App\Area_Post::all();
        $items= App\Item_Post::all();
        $documentos = App\Documento_Post::all();
        return view('postulantes.regPostulante', compact('areas','items','codigoS'));
    }


    public function crear(Request $request){
        //return $request->all();

        $request->validate([
            'areas' => 'required',
            'items' => 'required',
            'documento_1' => 'required',
            'documento_2' => 'required',
            'documento_3' => 'required',
            'documento_4' => 'required',
            'documento_5' => 'required',
            'documento_6' => 'required',
            'documento_7' => 'required',
            'num_Hojas' => 'required'
        ]);
        
       // $codigoS = \DB::table('personas')->where('id', $request->id_est)->first();
        
        //dd($codigoS);


        $postulanteNuevo = new App\Postulante;
        $postulanteNuevo->area_nombre = $request->areas;
        $postulanteNuevo->item_nombre = $request->items;
        $postulanteNuevo->persona_id = $request->id_est;
        $postulanteNuevo->save();

        $documentosNuevo = new App\Documento_Post;
        $documentosNuevo->Doc_Ent = $request->documento_1;
        $documentosNuevo->Doc_Ent = $request->documento_2;
        $documentosNuevo->Doc_Ent = $request->documento_3;
        $documentosNuevo->Doc_Ent = $request->documento_4;
        $documentosNuevo->Doc_Ent = $request->documento_5;
        $documentosNuevo->Doc_Ent = $request->documento_6;
        $documentosNuevo->Doc_Ent = $request->documento_7;
        $documentosNuevo->num_Hojas= $request->num_Hojas;

        $documentosNuevo->save();

        return back()->with('mensaje','Registro agregado!');

    }
}