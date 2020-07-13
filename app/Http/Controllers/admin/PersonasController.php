<?php

namespace App\Http\Controllers\Admin;
use  Illuminate\Support\Facades\Hash;
use App\Carreras;
use App\personas;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$datos['personas']=Personas::paginate(5);

        $datos['personas']=DB::table('personas')
        ->join('ocupacions', 'ocupacions.id','=','personas.ocupacion_id')
        ->select('personas.id','personas.nombre','personas.apellidoP','personas.apellidoM',
        'personas.telefono','personas.correo','ocupacions.nombre as ocunombre','personas.user_id')
        ->get();
        
        return view('admin.personas.index',$datos);
    }
    

    public function index3($id){
        $persona=Personas::findOrFail($id);
        
        
        if($persona->user_id == '0'){

            /*
            $nombres   = ['nombre' => 'Rafael'];
            $telefonos = ['telefono' => '5353647'];
            $datos = Arr::collapse([$nombres, $telefonos]);
 
            print_r($datos);
            // ['nombre' => 'Rafael', 'telefono' => '5353647']
            */
            $persona->user_id='1';
            

            $arrayName = array(
             'nombre' => $persona->nombre,
             'apellidoP'=>$persona->apellidoP,
             'apellidoM'=>$persona->apellidoM,
             'codigoSIS'=>$persona->codigoSIS,
             'carrera_id'=>$persona->carrera_id,
             'correo'=>$persona->correo,
             'telefono'=>$persona->telefono,
             'facultad_id'=>$persona->facultad_id,
             'ocupacion_id'=>$persona->ocupacion_id,
             'user_id'=>$persona->user_id
            );
            
            
            
            Personas::where('id','=',$id)->update($arrayName);

            $contras=$persona->codigoSIS;
            $nuevo= new User;
            $nuevo -> name = $persona->nombre;
            $nuevo -> email= $persona->correo;
            $nuevo -> password = Hash::make($contras);
            $nuevo -> save();

            return redirect('/admin/personas');
        }else{

            return redirect('/admin/personas'); 
        }
        

        //return view('admin.agregar',compact('persona'));

        //return redirect('/admin/personas');
        
    }
    public function index4($id){
        $persona=Personas::findOrFail($id);
        $user=User::where('email','=',$persona->correo)->delete();

        $persona->user_id='0';
            

            $arrayName = array(
             'nombre' => $persona->nombre,
             'apellidoP'=>$persona->apellidoP,
             'apellidoM'=>$persona->apellidoM,
             'codigoSIS'=>$persona->codigoSIS,
             'carrera_id'=>$persona->carrera_id,
             'correo'=>$persona->correo,
             'telefono'=>$persona->telefono,
             'facultad_id'=>$persona->facultad_id,
             'ocupacion_id'=>$persona->ocupacion_id,
             'user_id'=>$persona->user_id
            );

        Personas::where('id','=',$id)->update($arrayName);

        return redirect('/admin/personas'); 
    }

    


    public function contra(Request $request){
        $dato['docentes']=DB::table('personas')
        ->join('ocupacions', 'ocupacions.id','=','personas.ocupacion_id')
        ->select('personas.id','personas.nombre','personas.apellidoP','personas.apellidoM',
        'personas.telefono','personas.correo','ocupacions.nombre as ocunombre')
        ->get();
        dd($dato);
        //return view('admin.personas.index',$datos);
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
        $campos=[
            'codigoSIS'=>'required|integer|max:999999999999|min:99999999',
            'nombre'=>'required|string|regex:/^[\pL\s\-]+$/u|max:50',
            'apellidoP'=>'required|string|regex:/^[\pL\s\-]+$/u|max:50',
            'apellidoM'=>'required|string|regex:/^[\pL\s\-]+$/u|max:50',
            'correo'=>'required|email|unique:personas',
            'telefono'=>'required|integer|max:99999999|min:9999999',
            'facultad_id'=>'required',
            'carrera_id'=>'required',
            'ocupacion_id'=>'required'
        ];
        $Mensaje=[
            "required"=>'El campo :attribute es requerido',
            "regex"=>'Solo se admiten letras',
            "max"=>'Excedio el numero de digitos permitido',    
            "min"=>'Número digitos invalido',
            "unique"=>'El correo es existente ingrese uno nuevo'
        ];
        $this->validate($request,$campos,$Mensaje);
        $datosPersona=request()->except('_token');
        $datosPersona['user_id']='0';

        
        Personas::insert($datosPersona);
        //$ocupacion=$datosPersona->ocupacion;
        //return response()->json($ocupacion);
        
        return redirect('/admin/personas');
    }
    public function getCarreras(Request $request){
        
        if($request -> ajax()){
            $carreras = Carrera::where('facultad_id', $request->facultad_id)->get();
            foreach($carreras as $carrera){
                $carrerasArray[$carrera->id] = $carrera->nombre;
            }
            return response()->json($carrerasArray);
        }

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
        $campos=[
            'codigoSIS'=>'required|integer|max:999999999999|min:99999999',
            'nombre'=>'required|string|regex:/^[\pL\s\-]+$/u|max:50',
            'apellidoP'=>'required|string|regex:/^[\pL\s\-]+$/u|max:50',
            'apellidoM'=>'required|string|regex:/^[\pL\s\-]+$/u|max:50',
            'correo'=>'required|email|unique:personas',
            'telefono'=>'required|integer|max:99999999|min:9999999',
            'facultad_id'=>'required',
            'carrera_id'=>'required',
            'ocupacion_id'=>'required'
        ];
        $Mensaje=[
            "required"=>'El campo :attribute es requerido',
            "regex"=>'Solo se admiten letras',
            "max"=>'Excedio el numero de digitos permitido',    
            "min"=>'Número digitos invalido',
            "unique"=>'El correo es existente ingrese uno nuevo'
        ];
        $this->validate($request,$campos,$Mensaje);
        
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

