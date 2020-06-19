<?php

use App\Combocatoria;
use App\Facultad;
use App\Area;
use App\Item;
use App\Carrera;
use App\Tabla;
use App\Area_Post;
use App\Item_Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CombocatoriasTbleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Combocatoria::truncate();
        Facultad::truncate();
        Area::truncate();
        Item::truncate();

        Tabla::truncate();

        $c= new Tabla;
        $c->nombre="tabla de meritos Asignatura por defecto";
        $c->valor= 20;
        $c->save();

        $c= new Tabla;
        $c->nombre="tabla de meritos Asignatura 2-19";
        $c->valor= 20;
        $c->save();
        
        $c= new Tabla;
        $c->nombre="tabla de meritos Asignatura 2-129";
        $c->valor= 20;
        $c->save();

        $c= new Tabla;
        $c->nombre="tabla de meritos Laboratorios por defecto";
        $c->valor= 20;
        $c->save();

        $c= new Tabla;
        $c->nombre="tabla de meritos Laboratorios 1-20";
        $c->valor= 20;
        $c->save();


        $a= new Area;
        $a->nombre='Informatica';
        $a->facultad_id=1;
        $a-> save();

        $a= new Area;
        $a->nombre='Matematicas';
        $a->facultad_id=1;
        $a-> save();

        $a= new Area;
        $a->nombre='Mecanica';
        $a->facultad_id=1;
        $a-> save();

        $a= new Facultad;
        $a->nombre='Fcyt';
        $a-> save();

        $i =new Item;
        $i ->combocatoria_id ='1';
        $i ->area_id ='1';
        $i ->cantidad_aux =5;
        $i ->horas = 8;
        $i ->destino = 'matematica discreta';
        $i -> save();

        $i =new Item;
        $i ->combocatoria_id ='1';
        $i ->area_id ='1';
        $i ->cantidad_aux =2;
        $i ->horas = 3;
        $i ->destino = 'matematica cuantica';
        $i -> save();

        $c1 = new Carrera;
        $c1 -> facultad_id = 1;
        $c1 -> area_id = 1 ;
        $c1 -> nombre ="LIC. ING. INFORMATICA";
        $c1 -> save();

        $c2 = new Carrera;
        $c2 -> facultad_id = 1;
        $c2 -> area_id = 2 ;
        $c2 -> nombre ="LIC. ING. MATEMATICA";
        $c2 -> save();

        $c3 = new Carrera;
        $c3 -> facultad_id = 1;
        $c3 -> area_id = 3 ;
        $c3 -> nombre ="LIC. ING. MECANICA";
        $c3 -> save();

        $c4 = new Carrera;
        $c4 -> facultad_id = 1;
        $c4 -> area_id = 3 ;
        $c4 -> nombre ="LIC. ING. ELECTROMECANICA";
        $c4 -> save();

        $c5 = new Carrera;
        $c5 -> facultad_id = 1;
        $c5 -> area_id = 1 ;
        $c5 -> nombre ="LIC. ING. SISTEMAS";
        $c5 -> save();



        $conv= new Combocatoria;
        $conv->titulo ='Primera Convocatoria';
        $conv->tipo = 'Asignatura';
        $conv->descripcion ='Descripcion primera convocatoria';
        $conv->fecha_inicio = Carbon::now();
        $conv->fecha_fin = Carbon::now()->addDays(15);
        $conv->area_id = 1;
        $conv->facultad_id = 1;
        $conv-> save();

        $conv->Carreras()->attach($c1);
        $conv->Carreras()->attach($c5);

        $conv= new Combocatoria;
        $conv->titulo ='Segunda Convocatoria';
        $conv->tipo = 'Asignatura';
        $conv->descripcion ='Descripcion segunda convocatoria';
        $conv->fecha_inicio = Carbon::now()->subDays(3);
        $conv->fecha_fin = Carbon::now()->addDays(20);
        $conv->area_id = 2;
        $conv->facultad_id = 1;
        $conv-> save();

        $conv->Carreras()->attach($c2);

        $conv= new Combocatoria;
        $conv->titulo ='Tercera Convocatoria';
        $conv->tipo = 'Laboratorios';
        $conv->descripcion ='Descripcion tercera convocatoria';
        $conv->fecha_inicio = Carbon::now()->subDays(5);
        $conv->fecha_fin = Carbon::now()->addDays(21);
        $conv->area_id = 1;
        $conv->facultad_id = 1;
        $conv-> save();

        $conv->Carreras()->attach($c5);

        $conv= new Combocatoria;
        $conv->titulo ='Cuarta Convocatoria';
        $conv->tipo = 'Asignatura';
        $conv->descripcion ='Descripcion cuarta convocatoria';
        $conv->fecha_inicio = Carbon::now()->subDays(7);
        $conv->fecha_fin = Carbon::now()->addDays(22);
        $conv->area_id = 2;
        $conv->facultad_id = 1;
        $conv-> save();

        $conv->Carreras()->attach($c2);

        $conv= new Combocatoria;
        $conv->titulo ='Quinta Convocatoria';
        $conv->tipo = 'Laboratorios';
        $conv->descripcion ='Descripcion quinta convocatoria';
        $conv->fecha_inicio = Carbon::now()->subDays(7);
        $conv->fecha_fin = Carbon::now()->addDays(25);
        $conv->area_id = 3;
        $conv->facultad_id = 1;
        $conv-> save();

        $conv->Carreras()->attach($c3);
        $conv->Carreras()->attach($c4);
    }
}
