<?php

namespace App\Http\Controllers\Admin;

use App\Tabla;
use App\Inciso_tabla;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TablaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAsig()
    {
        $tablasDoc = Tabla::where('tipo','Asignatura')->get();
        
        return view ('admin.tablas.tablaDoc',compact('tablasDoc')); 
    }

    public function indexLab()
    {
        $tablasLab = Tabla::where('tipo','Laboratorios')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titulos=Titulo_tabla::all();
        return view('admin.tablas.create',compact('titulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request,['nombreDoc' => 'required']);

        $tabla=new Tabla;
        $tabla->nombre = $request->get('nombreDoc');
        $tabla->tipo ='Asignatura';
        $tabla->valor =20;
        $tabla->save();
        
      

       return redirect()->route('admin.tablas.edit',compact('tabla'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tabla $tabla)
    {
        $id = $tabla->id;
    
        $incisos = Inciso_tabla::where('tabla_id', $id )->get();
      
       return view('admin.tablas.create',compact('tabla','incisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tabla $tabla)
    {
       
        $this->validate( $request,['nombreDoc' => 'required']);

        $tabla->nombre = $request->get('nombreDoc');
        $tabla->tipo ='Asignatura';
        $tabla->valor =20;
        $tabla->save();

        return redirect()->route('admin.tablas.indexAsig')->with('flash','Tabla de meritos creada');
    }

    public function update2(Request $request,Tabla $tabla)
    {
      
        $this->validate( $request,['inciso' => 'required',
                                    'puntaje'=> 'required']);

        $in = new Inciso_tabla;
        $in->nombre = $request->inciso;
        $in->tabla_id= $tabla->id;
        $in->puntaje= $request->puntaje;
        $in->save();

     

        return redirect()->route('admin.tablas.edit',compact('tabla'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tabla $tabla )
    {
      
        $tabla->Incisos()->delete();
        $tabla->Subincisos()->delete();
       

        $tabla->delete();

        return redirect()->route('admin.tablas.indexAsig')->with('flash','la tabla ha sido eliminado');
    }

    public function destroy2(Tabla $tabla,Inciso_tabla $inciso)
    {
      
        $inciso->delete();

        return  redirect()->route('admin.tablas.edit',compact('tabla'));
    }
}
