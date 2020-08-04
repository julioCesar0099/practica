<?php

namespace App\Http\Controllers\Admin;


use App\Area;
use App\Combocatoria;
use App\Carrera;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $carreras= Carrera::all();

       return view('admin.carreras.index',compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->validate( [
            'nombre'=> 'required|unique:carreras'
            
        ]);

        $carrera = new Carrera ;
        $carrera->facultad_id=1;
        $carrera->area_id=0;
        $carrera->nombre= $request->nombre;
        $carrera->save();

        return redirect()->route('admin.carreras.index')->withFlash('la carrera fue creada Correctamente');


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        return view('admin.carreras.edit',compact('carrera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Carrera $carrera)
    {
        $data= $request->validate([
            'nombre' => 'required|unique:carreras'
        ]);

        $carrera->nombre= $request->nombre;
        $carrera->save();

        return redirect()->route('admin.carreras.index')->withFlash('la carrera fue actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrera $carrera)
    {
      
       $carrera->delete();

       return redirect()->route('admin.carreras.index')->with('flash','la carrera ha sido eliminada');

    }
}
