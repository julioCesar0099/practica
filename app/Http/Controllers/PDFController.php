<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \PDF;
use Carbon\Carbon;
use App\Combocatoria;
use App\tabla;
use App\seccion;
use App\personas;
use App\Carrera;
use App\Area;
use App\Item;
use App\Postulante;
use App\Documento_Post;

class PDFController extends Controller
{
    public function show(){
    	
    	$pdf = PDF::loadview('docPDF',['convocatorias'=>Combocatoria::latest('fecha_inicio')->get()]);
   		return $pdf->stream();
    }
    public function download(){
    	$pdf = PDF::loadview('docPDF');
   		return $pdf->download('doc.pdf');
    }
	public function index($id){
		$doc = Combocatoria::findOrFail($id);
		$idT=$doc->tabla_id;
		$tabla = Tabla::findOrFail($idT);
		
		$pdf = PDF::loadview('docPDF',compact('doc','tabla'));
		return $pdf->stream();
	}
	public function generar($codigoS,Combocatoria $convocatoria){
		$codS = \DB::table('personas')->where('id', $codigoS)->first();
		$areas= Area::all();
		$items= Item::all();
		$documentos = Documento_Post::all();

		$idCarrera = $codS->carrera_id;
		$carrera = Carrera::findOrFail($idCarrera);
		$pdf = PDF::loadview('postulantes.generar',compact('codS','convocatoria','carrera'));
		return $pdf->stream();
	}
}
