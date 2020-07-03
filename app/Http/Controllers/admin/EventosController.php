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
        return view('admin.eventos.create',compact('id'));
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
        $eventos=request()->except('_token');
        $eventos['fecha']= Carbon::parse($request->get('fecha'));
        $eventos['combocatoria_id']=$id;
        Eventos::insert($eventos);
        return view('admin.eventos.index',compact('id','combocatoria'));
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
