<?php

namespace App\Http\Controllers\Admin;

use App\Tabla;
use App\Inciso;
use App\Subinciso;
use App\Subseccion;
use App\Seccion;
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
        $tablas = Tabla::all();
        
        return view ('admin.tablas.tablaDoc',compact('tablas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request,['nombre' => 'required']);

        $tabla=new Tabla;
        $tabla->nombre = $request->get('nombre');
        $tabla->valor =$request->get('valor') ;
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
        
       return view('admin.tablas.create',compact('tabla'));
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
        $this->validate( $request,['nombre' => 'required']);

        $tabla->nombre = $request->get('nombre');
        $tabla->valor =$request->get('valor');
        $tabla->save();

        return redirect()->route('admin.tablas.indexAsig')->with('flash','Tabla de meritos creada');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tabla $tabla )
    {
        
        $tabla->secciones()->delete();
        $tabla->delete();

        return redirect()->route('admin.tablas.indexAsig')->with('flash','la tabla ha sido eliminado');
    }

   
}
