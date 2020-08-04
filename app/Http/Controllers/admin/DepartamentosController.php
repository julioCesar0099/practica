<?php

namespace App\Http\Controllers\Admin;


use App\Area;
use App\Combocatoria;
use App\Carrera;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos= Area::all();
        $carreras= Carrera::all();
        return view('admin.departamentos.index',compact('departamentos','carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $data= $request->validate( [
            'nombre'=> 'required|unique:areas'
            
        ]);

        $area=new Area;
        $area->nombre = $request->nombre;
        $area->facultad_id = 1;
        $area->save();
       
        if($request->has('carreras'))
        {
         $carreras= Carrera::find($request->carreras);
                foreach($carreras as $carrera){
                    $carrera->area_id= $area->id;
                    $carrera->save();
                }
        }
        return redirect()->route('admin.departamentos.index')->withFlash('El departamento fue creado Correctamente');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

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
    public function edit( Area $departamento)
    {
        $carreras = Carrera::all();
        return view('admin.departamentos.edit',compact('carreras','departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Area $departamento)
    {
        $data= $request->validate([
            'nombre' => 'required'
        ]);

        $departamento->nombre= $request->nombre;
        $departamento->save();
        
        if($departamento->has('carreras')){
            $carreras1=Carrera::find($departamento->carreras);
                foreach($carreras1 as $carrera){
                    $carrera->area_id= 0;
                    $carrera->save();
                }
        }

        if($request->has('carreras'))
        {
         $carreras= Carrera::find($request->carreras);
                foreach($carreras as $carrera){
                    $carrera->area_id= $departamento->id;
                    $carrera->save();
                }
        }

        return redirect()->route('admin.departamentos.index')->withFlash('El departamento fue actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $departamento)
    {

       if($departamento->carreras)
       {
        $carreras= Carrera::find($departamento->carreras);
        foreach($carreras as $carrera){
            $carrera->area_id= 0;
            $carrera->save();
        }
       }

       if($departamento->convocatorias)
       {
        $convocatorias = Combocatoria::find($departamento->convocatorias);
            foreach($convocatorias as $convocatoria){
            $convocatoria->area_id= null;
            $convocatoria->save();
             }
       }
       $departamento->delete();

       return redirect()->route('admin.departamentos.index')->with('flash','la combocatoria ha sido eliminado');

    }
}
