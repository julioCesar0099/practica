<?php

namespace App\Http\Controllers\Admin;


use App\Area;
use App\Combocatoria;
use App\Carrera;
use App\Unidad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades= Unidad::all();
        $departamentos= Area::all();

        return view('admin.unidades.index',compact('unidades','departamentos'));
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
        $request->validate( [
            'nombre'=> 'required|unique:areas',
            'departamento' => 'required'
        ]);

        if($request->codigo){
            $area=new Unidad;
            $area->area_id = $request->departamento;
            $area->nombre= $request->nombre;
            $area->codigo= $request->codigo;
            $area->save();
        }
        else{
            $area=new Unidad;
            $area->area_id = $request->departamento;
            $area->nombre= $request->nombre;
            $area->save();
        }
       
      
        return redirect()->route('admin.unidades.index')->withFlash('La Unidad fue creada Correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidad $unidad)
    {
        $departamentos= Area::all();
        return view('admin.unidades.edit',compact('unidad','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Unidad $unidad)
    {
        $request->validate( [
            'nombre'=> 'required|unique:areas',
            'departamento' => 'required'
        ]);


            $unidad->area_id = $request->departamento;
            $unidad->nombre= $request->nombre;
            $unidad->codigo=$request->codigo;
            $unidad->save();
        

        return redirect()->route('admin.unidades.index')->withFlash('La Unidad fue Actualizada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidad $unidad)
    {
       
       $unidad->delete();

       return redirect()->route('admin.unidades.index')->with('flash','la unidad ha sido eliminado');
    }
}
