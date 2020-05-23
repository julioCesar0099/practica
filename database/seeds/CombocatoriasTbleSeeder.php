<?php

use App\Combocatoria;
use App\Facultad;
use App\Area;
use App\Item;
use App\Carrera;
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

        $a= new Area;
        $a->nombre='INFORMATICA';
        $a->facultad_id=1;
        $a-> save();

        $a= new Area;
        $a->nombre='MATEMATICAS';
        $a->facultad_id=1;
        $a-> save();

        $a= new Area;
        $a->nombre='MECANICA';
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
        $conv->titulo ='primera combocatoria';
        $conv->descripcion ='descripcion primera combocatoria';
        $conv->fecha_inicio = Carbon::now();
        $conv->fecha_fin = Carbon::now()->addDays(15);
        $conv->area_id = 1;
        $conv->facultad_id = 1;
        $conv-> save();

        $conv->Carreras()->attach($c1);
        $conv->Carreras()->attach($c5);

        $conv= new Combocatoria;
        $conv->titulo ='segunda combocatoria';
        $conv->descripcion ='descripcion segunda combocatoria';
        $conv->fecha_inicio = Carbon::now()->addDays(3);
        $conv->fecha_fin = Carbon::now()->addDays(20);
        $conv->area_id = 2;
        $conv->facultad_id = 1;
        $conv-> save();

        $conv->Carreras()->attach($c2);

        $conv= new Combocatoria;
        $conv->titulo ='tercera combocatoria';
        $conv->descripcion ='descripcion tercera combocatoria';
        $conv->fecha_inicio = Carbon::now()->addDays(5);
        $conv->fecha_fin = Carbon::now()->addDays(21);
        $conv->area_id = 1;
        $conv->facultad_id = 1;
        $conv-> save();

        $conv->Carreras()->attach($c5);

        $conv= new Combocatoria;
        $conv->titulo ='cuarta combocatoria';
        $conv->descripcion ='descripcion cuarta combocatoria';
        $conv->fecha_inicio = Carbon::now()->addDays(7);
        $conv->fecha_fin = Carbon::now()->addDays(22);
        $conv->area_id = 2;
        $conv->facultad_id = 1;
        $conv-> save();

        $conv->Carreras()->attach($c2);

        $conv= new Combocatoria;
        $conv->titulo ='quinta combocatoria';
        $conv->descripcion ='descripcion quinta combocatoria';
        $conv->fecha_inicio = Carbon::now()->addDays(7);
        $conv->fecha_fin = Carbon::now()->addDays(25);
        $conv->area_id = 3;
        $conv->facultad_id = 1;
        $conv-> save();

        $conv->Carreras()->attach($c3);
        $conv->Carreras()->attach($c4);
    }
}
