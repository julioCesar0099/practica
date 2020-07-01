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
            'nombre'=>'julio',
            'apellidoP'=>'Perez',
            'apellidoM'=>'Ayoroa',
            'codigoSIS'=>'201409412',
            'carrera_id'=>'2',
            'correo'=>'julio@gmail.com',
            'telefono'=>'68757554',
            'facultad_id'=>'1',
            'ocupacion_id'=>'2',
            'user_id'=>'1',
            //'ocupacion_id'=> $ocupacion2,
       ]);

        Personas::create([
            'nombre'=>'cesar',
            'apellidoP'=>'Flores',
            'apellidoM'=>'Galindo',
            'codigoSIS'=>'201412458',
            'carrera_id'=>'2',
            'correo'=>'cesar@gmail.com',
            'telefono'=>'78540754',
            'facultad_id'=>'1',
            'ocupacion_id'=>'2',
            'user_id'=>'1',
            //'ocupacion_id'=> $ocupacion2,
       ]);

        Personas::create([
             'nombre'=>'rudy',
             'apellidoP'=>'Veizaga',
             'apellidoM'=>'Zamudio',
             'codigoSIS'=>'201409432',
             'carrera_id'=>'2',
             'correo'=>'rud@gmail.com',
             'telefono'=>'61607554',
             'facultad_id'=>'1',
             'ocupacion_id'=>'1',
             'user_id'=>'0',
             //'ocupacion_id'=> $ocupacion2,
        ]);

        Personas::create([
            'nombre'=>'monica',
            'apellidoP'=>'Galindo',
            'apellidoM'=>'Juas',
            'codigoSIS'=>'201509412',
            'carrera_id'=>'1',
            'correo'=>'jua@gmail.com',
            'telefono'=>'61257554',
            'facultad_id'=>'1',
            'ocupacion_id'=>'1',
            'user_id'=>'0',
            //'ocupacion_id'=> $ocupacion2,
       ]);

       Personas::create([
        'nombre'=>'monica',
        'apellidoP'=>'Uruña',
        'apellidoM'=>'Caem',
        'codigoSIS'=>'201545812',
        'carrera_id'=>'1',
        'correo'=>'urus@gmail.com',
        'telefono'=>'61247554',
        'facultad_id'=>'1',
        'ocupacion_id'=>'2',
        'user_id'=>'0',
        //'ocupacion_id'=> $ocupacion1,
        ]);
        
        Personas::create([
        'nombre'=>'marco',
        'apellidoP'=>'Gutierrez',
        'apellidoM'=>'Fuente',
        'codigoSIS'=>'201578912',
        'carrera_id'=>'2',
        'correo'=>'gut@gmail.com',
        'telefono'=>'71247554',
        'facultad_id'=>'1',
        'ocupacion_id'=>'2',
        'user_id'=>'0',
        //'ocupacion_id'=> $ocupacion1,
        ]);

        Personas::create([
            'nombre'=>'fernando',
            'apellidoP'=>'Milan',
            'apellidoM'=>'Herbas',
            'codigoSIS'=>'201422236',
            'carrera_id'=>'2',
            'correo'=>'nando@gmail.com',
            'telefono'=>'61607888',
            'facultad_id'=>'1',
            'ocupacion_id'=>'2',
            'user_id'=>'0',
        ]);

        Personas::create([
            'nombre'=>'julio',
            'apellidoP'=>'Hugarte',
            'apellidoM'=>'Camacho',
            'codigoSIS'=>'201288236',
            'carrera_id'=>'2',
            'correo'=>'julito@gmail.com',
            'telefono'=>'71607488',
            'facultad_id'=>'1',
            'ocupacion_id'=>'1',
            'user_id'=>'0',
        ]);
        
        Personas::create([
            'nombre'=>'esteban',
            'apellidoP'=>'Quiroz',
            'apellidoM'=>'Cossio',
            'codigoSIS'=>'201011557',
            'carrera'=>'informatica',
            'correo'=>'estebanquito@gmail.com',
            'telefono'=>'7778111',
            'facultad'=>'FCYT',
            'ocupacion'=>'estudiante',
        ]);


        Personas::create([
            'nombre'=>'Carolina',
            'apellidoP'=>'Veizaga',
            'apellidoM'=>'Cespedes',
            'codigoSIS'=>'200855887',
            'carrera'=>'Mecanica',
            'correo'=>'caroVez@gmail.com',
            'telefono'=>'78811000',
            'facultad'=>'FCYT',
            'ocupacion'=>'estudiante',
        ]);



        Personas::create([
            'nombre'=>'Yolanda',
            'apellidoP'=>'Fernandez',
            'apellidoM'=>'Fuentes',
            'codigoSIS'=>'200899887',
            'carrera'=>'Mecanica',
            'correo'=>'yolita111@gmail.com',
            'telefono'=>'65530215',
            'facultad'=>'FCYT',
            'ocupacion'=>'estudiante',
        ]);





        Personas::create([
            'nombre'=>'Cesar',
            'apellidoP'=>'Peredo',
            'apellidoM'=>'Cruz',
            'codigoSIS'=>'201188000',
            'carrera'=>'Industrial',
            'correo'=>'Cesapolio1@gmail.com',
            'telefono'=>'77220065',
            'facultad'=>'FCYT',
            'ocupacion'=>'estudiante',
        ]);





        

    }
}
