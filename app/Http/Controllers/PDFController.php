<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \PDF;
use Carbon\Carbon;
use App\Combocatoria;
use App\Tabla;
use App\Seccion;
use App\Requisito_Combocatoria;
use App\Documento_Combocatoria;
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
		
		$items= $doc->items;
		$cant='0';
		foreach($items as $it){
			$cant='1';
		}
		

		$idT=$doc->tabla_id;
		$tabla = Tabla::findOrFail($idT);
		$reqC= Requisito_Combocatoria::all();
		$docC= Documento_Combocatoria::all();
		
		$pdf = PDF::loadview('docPDF',compact('doc','tabla','cant','reqC','docC'));
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
