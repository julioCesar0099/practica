<?php

use App\Combocatoria;
use App\Facultad;
use App\Area;
use App\Item;
use App\Carrera;
use App\Tabla;
use App\Seccion;
use App\Subseccion;
use App\Subinciso;
use App\inciso;
use App\Requisito_Combocatoria;
use App\Documento_Combocatoria;
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
        Inciso::truncate();
        Subinciso::truncate();
        Subseccion::truncate();
        Seccion::truncate();
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
        $c->nombre="tabla de meritos Asignatura 2-20";
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

        $sec = new Seccion;
        $sec->nombre = 'Rendimiento Academico';
        $sec->valor = '65';
        $sec->tabla_id = '2';
        $sec->save();

        $subsec = new Subseccion;
        $subsec->nombre = 'Promedio de aprobación de la materia a la que postula (incluye reprobadas y
        abandonos):';
        $subsec->puntaje = '35';
        $subsec->seccion_id = '1';
        $subsec->save();

        $subsec = new Subseccion;
        $subsec->nombre = 'Promedio general de materias';
        $subsec->puntaje = '30';
        $subsec->seccion_id = '1';
        $subsec->save();

        $sec = new Seccion;
        $sec->nombre = 'Experiencia general';
        $sec->valor = '35';
        $sec->tabla_id = '2';
        $sec->save();

        $subsec = new Subseccion;
        $subsec->nombre = 'Documentos de experiencia universitaria:';
        $subsec->puntaje = '25';
        $subsec->seccion_id = '2';
        $subsec->save();


        $inci = new Inciso;
        $inci->nombre = 'Auxiliar docente en materias del área troncal';
        $inci->puntaje = '15';
        $inci->subseccion_id = '3';
        $inci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto por semestre y materia de aux. titular';
         $Subinci->puntaje = '2';
         $Subinci->inciso_id = '1';
         $Subinci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto por semestre y materia de aux. invitado';
         $Subinci->puntaje = '1';
         $Subinci->inciso_id = '1';
         $Subinci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto por semestre y materia de aux. de practicas';
         $Subinci->puntaje = '1';
         $Subinci->inciso_id = '1';
         $Subinci->save();

        $inci = new Inciso;
        $inci->nombre = 'Auxiliar en otras ramas o carreras';
        $inci->puntaje = '5';
        $inci->subseccion_id = '3';
        $inci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto por semestre x materia de aux. invitado o titular';
         $Subinci->puntaje = '1';
         $Subinci->inciso_id = '2';
         $Subinci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto por semestre x materia de aux. de practicas';
         $Subinci->puntaje = '1';
         $Subinci->inciso_id = '2';
         $Subinci->save();

        $inci = new Inciso;
        $inci->nombre = 'Disertación cursillos y/o participación en Proyectos';
        $inci->puntaje = '5';
        $inci->subseccion_id = '3';
        $inci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto por dirección de cursillo';
         $Subinci->puntaje = '3';
         $Subinci->inciso_id = '3';
         $Subinci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto por participación en proyectos';
         $Subinci->puntaje = '2';
         $Subinci->inciso_id = '3';
         $Subinci->save();

        $subsec = new Subseccion;
        $subsec->nombre = 'Documentos de experiencia extrauniversitaria';
        $subsec->puntaje = '10';
        $subsec->seccion_id = '3';
        $subsec->save();

        $inci = new Inciso;
        $inci->nombre = 'Experiencia como operador, programador, analista de sistemas, cargo
        directivo en centro de cómputo';
        $inci->puntaje = '5';
        $inci->subseccion_id = '1';
        $inci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto cargo/semestre';
         $Subinci->puntaje = '1';
         $Subinci->inciso_id = '4';
         $Subinci->save();

        $inci = new Inciso;
        $inci->nombre = 'Experiencia docente en colegios, institutos, etc';
        $inci->puntaje = '5';
        $inci->subseccion_id = '1';
        $inci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto cargo/semestre y certificado';
         $Subinci->puntaje = '1';
         $Subinci->inciso_id = '5';
         $Subinci->save();





         $sec = new Seccion;
        $sec->nombre = 'Rendimiento Academico';
        $sec->valor = '65';
        $sec->tabla_id = '3';
        $sec->save();

        $subsec = new Subseccion;
        $subsec->nombre = 'Promedio de aprobación de la materia a la que postula (incluye reprobadas y
        abandonos):';
        $subsec->puntaje = '35';
        $subsec->seccion_id = '3';
        $subsec->save();

        $subsec = new Subseccion;
        $subsec->nombre = 'Promedio general de materias';
        $subsec->puntaje = '30';
        $subsec->seccion_id = '3';
        $subsec->save();

        $sec = new Seccion;
        $sec->nombre = 'Experiencia general';
        $sec->valor = '35';
        $sec->tabla_id = '3';
        $sec->save();

        $subsec = new Subseccion;
        $subsec->nombre = 'Documentos de experiencia universitaria:';
        $subsec->puntaje = '25';
        $subsec->seccion_id = '4';
        $subsec->save();


        $inci = new Inciso;
        $inci->nombre = 'Auxiliar docente en materias del área troncal';
        $inci->puntaje = '15';
        $inci->subseccion_id = '7';
        $inci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto por semestre y materia de aux. titular';
         $Subinci->puntaje = '2';
         $Subinci->inciso_id = '6';
         $Subinci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto por semestre y materia de aux. invitado';
         $Subinci->puntaje = '1';
         $Subinci->inciso_id = '6';
         $Subinci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto por semestre y materia de aux. de practicas';
         $Subinci->puntaje = '1';
         $Subinci->inciso_id = '6';
         $Subinci->save();

        $inci = new Inciso;
        $inci->nombre = 'Auxiliar en otras ramas o carreras';
        $inci->puntaje = '5';
        $inci->subseccion_id = '7';
        $inci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto por semestre x materia de aux. invitado o titular';
         $Subinci->puntaje = '1';
         $Subinci->inciso_id = '7';
         $Subinci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto por semestre x materia de aux. de practicas';
         $Subinci->puntaje = '1';
         $Subinci->inciso_id = '7';
         $Subinci->save();

        $inci = new Inciso;
        $inci->nombre = 'Disertación cursillos y/o participación en Proyectos';
        $inci->puntaje = '5';
        $inci->subseccion_id = '7';
        $inci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto por dirección de cursillo';
         $Subinci->puntaje = '3';
         $Subinci->inciso_id = '8';
         $Subinci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto por participación en proyectos';
         $Subinci->puntaje = '2';
         $Subinci->inciso_id = '8';
         $Subinci->save();

        $subsec = new Subseccion;
        $subsec->nombre = 'Documentos de experiencia extrauniversitaria';
        $subsec->puntaje = '10';
        $subsec->seccion_id = '4';
        $subsec->save();

        $inci = new Inciso;
        $inci->nombre = 'Experiencia como operador, programador, analista de sistemas, cargo
        directivo en centro de cómputo';
        $inci->puntaje = '5';
        $inci->subseccion_id = '8';
        $inci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto cargo/semestre';
         $Subinci->puntaje = '1';
         $Subinci->inciso_id = '9';
         $Subinci->save();

        $inci = new Inciso;
        $inci->nombre = 'Experiencia docente en colegios, institutos, etc';
        $inci->puntaje = '5';
        $inci->subseccion_id = '8';
        $inci->save();

         $Subinci = new Subinciso;
         $Subinci->nombre = 'punto cargo/semestre y certificado';
         $Subinci->puntaje = '1';
         $Subinci->inciso_id = '10';
         $Subinci->save();


       


      


        $a= new Area;
        $a->nombre='Informatica';
        $a->facultad_id=1;
        $a-> save();

        $a= new Area;
        $a->nombre='Industrial';
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

        // $i =new Item;
        // $i ->combocatoria_id ='1';
        // $i ->area_id ='1';
        // $i ->cantidad_aux =5;
        // $i ->horas = 8;
        // $i ->destino = 'matematica discreta';
        // $i -> save();

        // $i =new Item;
        // $i ->combocatoria_id ='1';
        // $i ->area_id ='1';
        // $i ->cantidad_aux =2;
        // $i ->horas = 3;
        // $i ->destino = 'matematica cuantica';
        // $i -> save();


        $i =new Item;
        $i ->combocatoria_id ='1';
        $i ->area_id ='1';
        $i ->cantidad_aux =5;
        $i ->horas = 8;
        $i ->destino = 'Introduccion a la programacion';
        $i -> save();

        $i =new Item;
        $i ->combocatoria_id ='1';
        $i ->area_id ='1';
        $i ->cantidad_aux =4;
        $i ->horas = 7;
        $i ->destino = 'Elementos de programacion';
        $i -> save();

        $i =new Item;
        $i ->combocatoria_id ='1';
        $i ->area_id ='1';
        $i ->cantidad_aux =3;
        $i ->horas = 6;
        $i ->destino = 'Taller de computacion';
        $i -> save();

        $i =new Item;
        $i ->combocatoria_id ='2';
        $i ->area_id ='2';
        $i ->cantidad_aux =3;
        $i ->horas = 6;
        $i ->destino = 'Ingles 1';
        $i -> save();

        $i =new Item;
        $i ->combocatoria_id ='2';
        $i ->area_id ='2';
        $i ->cantidad_aux =3;
        $i ->horas = 6;
        $i ->destino = 'ingles 2';
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


        $requisito= new Requisito_Combocatoria;
        $requisito->combocatoria_id = '1';
        $requisito->detalle = 'Ser estudiante regular y con rendimiento académico de las carreras de
        Licenciatura en Ingeniería Informática o Licenciatura en Ingeniería de Sistemas,
        que cursa regularmente en la Universidad.';
        $requisito->save();

        $requisito= new Requisito_Combocatoria;
        $requisito->combocatoria_id = '1';
        $requisito->detalle = 'Haber concluido el pensum con la totalidad de materias, teniendo pendiente
        tan solo la aprobación de la Modalidad de Graduación, pudiendo postular a la
        Auxiliatura Universitaria dentro del siguiente periodo académico (dos años o
        cuatro semestres), a partir de la fecha de conclusión de pensum de materias.';
        $requisito->save();

        $requisito= new Requisito_Combocatoria;
        $requisito->combocatoria_id = '1';
        $requisito->detalle = 'Queda expresamente prohibido la participación de estudiantes que hubiesen
        obtenido ya un título profesional en alguna de las carreras de la Universidad
        Mayor de San Simon o de cualquier otra del Sistema de la Universidad Boliviana
        (RCU No. 63/2018).';
        $requisito->save();


        $requisito= new Requisito_Combocatoria;
        $requisito->combocatoria_id = '1';
        $requisito->detalle = 'Haber Aprobado la totalidad de las materias del semestre a la materia a la que
        se postula.';
        $requisito->save();


        $requisito= new Requisito_Combocatoria;
        $requisito->combocatoria_id = '1';
        $requisito->detalle = 'No tener deudas de libros en la biblioteca de la FCyT.';
        $requisito->save();

        $requisito= new Requisito_Combocatoria;
        $requisito->combocatoria_id = '1';
        $requisito->detalle = 'Participar y aprobar el Concurso de Méritos y proceso de pruebas de selección y
        admisión, conforme a convocatoria.';
        $requisito->save();


        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '1';
        $documento->detalle = 'Presentar Solicitud escrita para la(s) auxiliatura(s) a la(s) que se postula, dirigida
        a la Jefatura de Departamento.';
        $documento->save();

        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '1';
        $documento->detalle = 'Presentar certificado de condición de estudiante expedido por el Departamento
        de Registros e Inscripciones.';
        $documento->save();

        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '1';
        $documento->detalle = 'Kardex actualizado a la gestión 1/2019 (periodos cumplidos a la fecha), expedido
        por oficina de Kardex de la Facultad de Ciencias y Tecnología.';
        $documento->save();

        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '1';
        $documento->detalle = 'Fotocopia del carnet de identidad.';
        $documento->save();

        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '1';
        $documento->detalle = 'Certificado expedido por la biblioteca de la Facultad De Ciencias y Tecnología de
        no tener deudas de libros.';
        $documento->save();

        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '1';
        $documento->detalle = 'Kardex actualizado a la gestión 1/2019 (periodos cumplidos a la fecha), expedido
        por Oficina de Kardex de la Facultad de Ciencias y Tecnología.';
        $documento->save();

        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '1';
        $documento->detalle = 'Presentar resumen de currículum Vitae de acuerdo al subtítulo 6.- DE LA
        CALIFICACIÓN DE MÉRITOS de esta convocatoria';
        $documento->save();

        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '1';
        $documento->detalle = 'Presentar documentación que respalde el currículum vitae, ORGANIZADO Y
        SEPARADO de acuerdo a la tabla de calificación de méritos.';
        $documento->save();
        // $conv= new Combocatoria;
        // $conv->titulo ='Primera Convocatoria';
        // $conv->descripcion ='Descripcion primera convocatoria';
        // $conv->fecha_inicio = Carbon::now();
        // $conv->fecha_fin = Carbon::now()->addDays(15);
        // $conv->area_id = 1;
        // $conv->facultad_id = 1;
        // $conv-> save();

        // $conv->Carreras()->attach($c1);
        // $conv->Carreras()->attach($c5);

        $conv= new Combocatoria;
        $conv->titulo ='Segunda Convocatoria';
        $conv->tipo = 'Asignatura';
        $conv->descripcion ='Descripcion segunda convocatoria';
        $conv->fecha_inicio = Carbon::now()->subDays(3);
        $conv->fecha_fin = Carbon::now()->addDays(20);
        $conv->area_id = 2;
        $conv->facultad_id = 1;
        $conv-> save();


        $requisito= new Requisito_Combocatoria;
        $requisito->combocatoria_id = '2';
        $requisito->detalle = 'Ser estudiante regular y con rendimiento académico de las carreras de
        Licenciatura en Ingeniería Informática o Licenciatura en Ingeniería de Sistemas,
        que cursa regularmente en la Universidad.';
        $requisito->save();

        $requisito= new Requisito_Combocatoria;
        $requisito->combocatoria_id = '2';
        $requisito->detalle = 'Haber concluido el pensum con la totalidad de materias, teniendo pendiente
        tan solo la aprobación de la Modalidad de Graduación, pudiendo postular a la
        Auxiliatura Universitaria dentro del siguiente periodo académico (dos años o
        cuatro semestres), a partir de la fecha de conclusión de pensum de materias.';
        $requisito->save();

        $requisito= new Requisito_Combocatoria;
        $requisito->combocatoria_id = '2';
        $requisito->detalle = 'Queda expresamente prohibido la participación de estudiantes que hubiesen
        obtenido ya un título profesional en alguna de las carreras de la Universidad
        Mayor de San Simon o de cualquier otra del Sistema de la Universidad Boliviana
        (RCU No. 63/2018).';
        $requisito->save();


        $requisito= new Requisito_Combocatoria;
        $requisito->combocatoria_id = '2';
        $requisito->detalle = 'Haber Aprobado la totalidad de las materias del semestre a la materia a la que
        se postula.';
        $requisito->save();


        $requisito= new Requisito_Combocatoria;
        $requisito->combocatoria_id = '2';
        $requisito->detalle = 'No tener deudas de libros en la biblioteca de la FCyT.';
        $requisito->save();

        $requisito= new Requisito_Combocatoria;
        $requisito->combocatoria_id = '2';
        $requisito->detalle = 'Participar y aprobar el Concurso de Méritos y proceso de pruebas de selección y
        admisión, conforme a convocatoria.';
        $requisito->save();


        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '2';
        $documento->detalle = 'Presentar Solicitud escrita para la(s) auxiliatura(s) a la(s) que se postula, dirigida
        a la Jefatura de Departamento.';
        $documento->save();

        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '2';
        $documento->detalle = 'Presentar certificado de condición de estudiante expedido por el Departamento
        de Registros e Inscripciones.';
        $documento->save();

        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '2';
        $documento->detalle = 'Kardex actualizado a la gestión 1/2019 (periodos cumplidos a la fecha), expedido
        por oficina de Kardex de la Facultad de Ciencias y Tecnología.';
        $documento->save();

        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '2';
        $documento->detalle = 'Fotocopia del carnet de identidad.';
        $documento->save();

        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '2';
        $documento->detalle = 'Certificado expedido por la biblioteca de la Facultad De Ciencias y Tecnología de
        no tener deudas de libros.';
        $documento->save();

        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '2';
        $documento->detalle = 'Kardex actualizado a la gestión 1/2019 (periodos cumplidos a la fecha), expedido
        por Oficina de Kardex de la Facultad de Ciencias y Tecnología.';
        $documento->save();

        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '2';
        $documento->detalle = 'Presentar resumen de currículum Vitae de acuerdo al subtítulo 6.- DE LA
        CALIFICACIÓN DE MÉRITOS de esta convocatoria';
        $documento->save();

        $documento = new Documento_Combocatoria;
        $documento->combocatoria_id = '2';
        $documento->detalle = 'Presentar documentación que respalde el currículum vitae, ORGANIZADO Y
        SEPARADO de acuerdo a la tabla de calificación de méritos.';
        $documento->save();
        // $conv= new Combocatoria;
        // $conv->titulo ='Segunda Convocatoria';
        // $conv->descripcion ='Descripcion segunda convocatoria';
        // $conv->fecha_inicio = Carbon::now()->subDays(3);
        // $conv->fecha_fin = Carbon::now()->addDays(20);
        // $conv->area_id = 2;
        // $conv->facultad_id = 1;
        // $conv-> save();

        // $conv->Carreras()->attach($c2);

        $conv= new Combocatoria;
        $conv->titulo ='Tercera Convocatoria';
        $conv->tipo = 'Laboratorios';
        $conv->descripcion ='Descripcion tercera convocatoria';
        $conv->fecha_inicio = Carbon::now()->subDays(5);
        $conv->fecha_fin = Carbon::now()->addDays(21);
        $conv->area_id = 1;
        $conv->facultad_id = 1;
        $conv-> save();
        // $conv= new Combocatoria;
        // $conv->titulo ='Tercera Convocatoria';
        // $conv->descripcion ='Descripcion tercera convocatoria';
        // $conv->fecha_inicio = Carbon::now()->subDays(5);
        // $conv->fecha_fin = Carbon::now()->addDays(21);
        // $conv->area_id = 1;
        // $conv->facultad_id = 1;
        // $conv-> save();

        // $conv->Carreras()->attach($c5);

        // $conv= new Combocatoria;
        // $conv->titulo ='Cuarta Convocatoria';
        // $conv->descripcion ='Descripcion cuarta convocatoria';
        // $conv->fecha_inicio = Carbon::now()->subDays(7);
        // $conv->fecha_fin = Carbon::now()->addDays(22);
        // $conv->area_id = 2;
        // $conv->facultad_id = 1;
        // $conv-> save();

        // $conv->Carreras()->attach($c2);

        // $conv= new Combocatoria;
        // $conv->titulo ='Quinta Convocatoria';
        // $conv->descripcion ='Descripcion quinta convocatoria';
        // $conv->fecha_inicio = Carbon::now()->subDays(7);
        // $conv->fecha_fin = Carbon::now()->addDays(25);
        // $conv->area_id = 3;
        // $conv->facultad_id = 1;
        // $conv-> save();

        // $conv->Carreras()->attach($c3);
        // $conv->Carreras()->attach($c4);

        $conv= new Combocatoria;
        $conv->titulo ='Cuarta Convocatoria';
        $conv->tipo = 'Asignatura';
        $conv->descripcion ='Descripcion cuarta convocatoria';
        $conv->fecha_inicio = Carbon::now()->subDays(7);
        $conv->fecha_fin = Carbon::now()->addDays(22);
        $conv->area_id = 2;
        $conv->facultad_id = 1;
        $conv-> save();


        $conv= new Combocatoria;
        $conv->titulo ='Quinta Convocatoria';
        $conv->tipo = 'Laboratorios';
        $conv->descripcion ='Descripcion quinta convocatoria';
        $conv->fecha_inicio = Carbon::now()->subDays(7);
        $conv->fecha_fin = Carbon::now()->addDays(25);
        $conv->area_id = 1;
        $conv->facultad_id = 1;
        $conv-> save();

        $conv->Carreras()->attach($c5);
        $conv->Carreras()->attach($c1);
    }
}
