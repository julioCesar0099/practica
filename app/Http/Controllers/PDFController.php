<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \PDF;
use Carbon\Carbon;
use App\Combocatoria;

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
		$pdf = PDF::loadview('docPDF',compact('doc'));
		return $pdf->stream();
	}
}
