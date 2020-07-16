<?php

namespace App\Http\Controllers\Admin;
use App\Combocatoria;
use App\Eventos;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $combocatoria=Combocatoria::findOrFail($id);

        return view('admin.eventos.index',compact('id','combocatoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $combocatoria=Combocatoria::findOrFail($id);
        
        
        return view('admin.eventos.create',compact('combocatoria'));
    }

    public function guardar($id, Request $request)
    {
        $combocatoria=Combocatoria::findOrFail($id);
        $campos=[
            'detalle'=>'required',
            'fecha'=>'required',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $fechaFin=$combocatoria->fecha_fin->format('m/d/y');
        $fechaInicio=$combocatoria->fecha_inicio->format('m/d/y');
        $fechaIngresada=$request->fecha;
        

        if($fechaIngresada > $fechaInicio){
            if($fechaIngresada <= $fechaFin){
                $eventos=request()->except('_token');
                $eventos['fecha']= Carbon::parse($request->get('fecha'));
                $eventos['combocatoria_id']=$id;
                Eventos::insert($eventos);
                return view('admin.eventos.index',compact('id','combocatoria'));
            }
            else{
                return redirect()->route('admin.eventos.create',compact('id'))->with('flash2','ingrese una fecha correcta');
            }
        }
        else{
            return redirect()->route('admin.eventos.create',compact('id'))->with('flash2','ingrese una fecha correcta');
        }
    }
    public function eliminar($id)
    {
        $combocatoria=Combocatoria::findOrFail($id);

        Eventos::destroy($id);

        return view('admin.eventos.index',compact('id','combocatoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function show(Eventos $eventos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function edit(Eventos $eventos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eventos $eventos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eventos $evento)
    {
        $id=$evento->id;

        Eventos::destroy($id);
        
        return back();
    }
}
