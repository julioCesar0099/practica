<?php

use App\Ocupacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class OcupacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ocupacion::truncate();

        Ocupacion::create([
            'nombre'=>'estudiante'
        ]);

        Ocupacion::create([
            'nombre'=>'docente'
        ]);
    }
}
