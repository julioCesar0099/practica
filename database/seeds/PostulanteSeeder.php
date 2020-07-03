<?php
use App\Postulante;
use App\Combocatoria;
use App\Item;
use App\Area;
use App\Facultad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostulanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Postulante::truncate();
      


        $post = new Postulante;
        $post->convocatoria_id = 1;
        $post->item_nombre = 'Introduccion a la programacion';
        $post->estado = 'Deshabilitado';
        $post->observacion = '';
        $post->persona_id = 7; 
        $post->save();


        $post = new Postulante;
        $post->convocatoria_id = 1;
        $post->item_nombre = 'Introduccion a la programacion';
        $post->estado = 'Deshabilitado';
        $post->observacion = '';
        $post->persona_id = 8; 
        $post->save();

        $post = new Postulante;
        $post->convocatoria_id = 1;
        $post->item_nombre = 'Introduccion a la programacion';
        $post->estado = 'Deshabilitado';
        $post->observacion = '';
        $post->persona_id = 9; 
        $post->save();


        $post = new Postulante;
        $post->convocatoria_id = 1;
        $post->item_nombre = 'Elementos de programacion';
        $post->estado = 'Deshabilitado';
        $post->observacion = '';
        $post->persona_id = 10; 
        $post->save();
       

        $post = new Postulante;
        $post->convocatoria_id = 1;
        $post->item_nombre = 'Elementos de programacion';
        $post->estado = 'Deshabilitado';
        $post->observacion = '';
        $post->persona_id = 11; 
        $post->save();

        $post = new Postulante;
        $post->convocatoria_id = 1;
        $post->item_nombre = 'Elementos de programacion';
        $post->estado = 'Deshabilitado';
        $post->observacion = '';
        $post->persona_id = 12; 
        $post->save();


        $post = new Postulante;
        $post->convocatoria_id = 1;
        $post->item_nombre = 'Taller de computacion';
        $post->estado = 'Deshabilitado';
        $post->observacion = '';
        $post->persona_id = 3; 
        $post->save();
       

        $post = new Postulante;
        $post->convocatoria_id = 1;
        $post->item_nombre = 'Taller de computacion';
        $post->estado = 'Deshabilitado';
        $post->observacion = '';
        $post->persona_id = 4; 
        $post->save();

    }
}
