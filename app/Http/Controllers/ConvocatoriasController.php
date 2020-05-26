<?php

namespace App\Http\Controllers;

use App\Convocatorias;
use Illuminate\Http\Request;

class ConvocatoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $datos['convocatorias']=Convocatorias::paginate(5);

         return view('convocatorias.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('convocatorias.create');
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
       // $datosConvocatoria=request()->all();
       $datosConvocatoria=request()->except('_token');

       Convocatorias::insert($datosConvocatoria);

        return response()->json($datosConvocatoria);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Convocatorias  $convocatorias
     * @return \Illuminate\Http\Response
     */
    public function show(Convocatorias $convocatorias)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Convocatorias  $convocatorias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $convocatoria= Convocatorias::FindOrFail($id);

        return view('convocatorias.edit',compact('convocatoria'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Convocatorias  $convocatorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosConvocatoria=request()->except(['_token','_method']);
        Convocatorias::where('id','=',$id)->update($datosConvocatoria);

        $convocatoria= Convocatorias::FindOrFail($id);

        return view('convocatorias.edit',compact('convocatoria'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Convocatorias  $convocatorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Convocatorias::destroy($id);

        return redirect('convocatorias');

    }
}
