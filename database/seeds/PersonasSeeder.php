<?php

use App\Personas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //$ocupacion1 = DB::table('ocupacions')->whereNombre('docente')->value('id');
        //$ocupacion2 = DB::table('ocupacions')->whereNombre('estudiante')->value('id');
        

        personas::truncate();
        
        Personas::create([
             'nombre'=>'rudy',
             'apellidoP'=>'Veizaga',
             'apellidoM'=>'Zamudio',
             'codigoSIS'=>'201409412',
             'carrera'=>'sistemas',
             'correo'=>'rud@gmail.com',
             'telefono'=>'61607554',
             'facultad'=>'FCYT',
             'ocupacion'=>'estudiante',
             //'ocupacion_id'=> $ocupacion2,
        ]);

        Personas::create([
            'nombre'=>'monica',
            'apellidoP'=>'Galindo',
            'apellidoM'=>'Juas',
            'codigoSIS'=>'201509412',
            'carrera'=>'sistemas',
            'correo'=>'jua@gmail.com',
            'telefono'=>'61257554',
            'facultad'=>'FCYT',
            'ocupacion'=>'estudiante',
            //'ocupacion_id'=> $ocupacion2,
       ]);

       Personas::create([
        'nombre'=>'monica',
        'apellidoP'=>'Uruña',
        'apellidoM'=>'Caem',
        'codigoSIS'=>'201545812',
        'carrera'=>'informatica',
        'correo'=>'urus@gmail.com',
        'telefono'=>'61247554',
        'facultad'=>'FCYT',
        'ocupacion'=>'docente',
        //'ocupacion_id'=> $ocupacion1,
        ]);
        
        Personas::create([
        'nombre'=>'marco',
        'apellidoP'=>'Gutierrez',
        'apellidoM'=>'Fuente',
        'codigoSIS'=>'201578912',
        'carrera'=>'sistemas',
        'correo'=>'gut@gmail.com',
        'telefono'=>'71247554',
        'facultad'=>'FCYT',
        'ocupacion'=>'docente',
        //'ocupacion_id'=> $ocupacion1,
        ]);

    }
}
