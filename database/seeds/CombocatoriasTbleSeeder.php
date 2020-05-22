<?php

use App\Combocatoria;
use App\Facultad;
use App\Area;
use App\Item;
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
        $a->nombre='matematicas';
        $a->facultad_id=1;
        $a-> save();

        $a= new Area;
        $a->nombre='fisica';
        $a->facultad_id=1;
        $a-> save();

        $a= new Area;
        $a->nombre='biologia';
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




        $conv= new Combocatoria;
        $conv->titulo ='primera combocatoria';
        $conv->descripcion ='descripcion primera combocatoria';
        $conv->fecha_inicio = Carbon::now();
        $conv->fecha_fin = Carbon::now();
        $conv->area_id = 1;
        $conv->facultad_id = 1;
        $conv-> save();

        $conv= new Combocatoria;
        $conv->titulo ='segunda combocatoria';
        $conv->descripcion ='descripcion segunda combocatoria';
        $conv->fecha_inicio = Carbon::now();
        $conv->fecha_fin = Carbon::now();
        $conv->area_id = 2;
        $conv->facultad_id = 1;
        $conv-> save();

        $conv= new Combocatoria;
        $conv->titulo ='tercera combocatoria';
        $conv->descripcion ='descripcion tercera combocatoria';
        $conv->fecha_inicio = Carbon::now();
        $conv->fecha_fin = Carbon::now();
        $conv->area_id = 1;
        $conv->facultad_id = 1;
        $conv-> save();

        $conv= new Combocatoria;
        $conv->titulo ='cuarta combocatoria';
        $conv->descripcion ='descripcion cuarta combocatoria';
        $conv->fecha_inicio = Carbon::now();
        $conv->fecha_fin = Carbon::now();
        $conv->area_id = 2;
        $conv->facultad_id = 1;
        $conv-> save();

        $conv= new Combocatoria;
        $conv->titulo ='quinta combocatoria';
        $conv->descripcion ='descripcion quinta combocatoria';
        $conv->fecha_inicio = Carbon::now();
        $conv->fecha_fin = Carbon::now();
        $conv->area_id = 3;
        $conv->facultad_id = 1;
        $conv-> save();

    }
}
