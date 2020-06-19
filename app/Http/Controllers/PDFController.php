<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \PDF;
use Carbon\Carbon;
use App\Combocatoria;
use App\tabla;
use App\seccion;
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
}
