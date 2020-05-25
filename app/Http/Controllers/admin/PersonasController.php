<?php

namespace App\Http\Controllers\Admin;

use App\personas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['personas']=Personas::paginate(5);
        return view('admin.personas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.personas.createPersonas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosPersona=request()->all();

        $datosPersona=request()->except('_token');
        Personas::insert($datosPersona);
        //$ocupacion=$datosPersona->ocupacion;
        //return response()->json($ocupacion);
        
        return redirect('/admin/personas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show(personas $personas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona=Personas::findOrFail($id);

        return view('admin.personas.edit',compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosPersona=request()->except(['_token','_method']);
        Personas::where('id','=',$id)->update($datosPersona);

        $persona= Personas::findOrFail($id);
        return view('admin.personas.edit',compact('persona'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Personas::destroy($id);

        return redirect('/admin/personas');
    }
}
