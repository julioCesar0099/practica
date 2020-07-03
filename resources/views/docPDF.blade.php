<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Convocatoria</title>
    <style>
        p {
            font-family: Arial, Helvetica, sans-serif;
        }
        .titulo {
            font-size: 20px;
            text-align: center;
            font-weight: bold;
        }
        .Nota.td{
            
            font-weight: bold;
        }
        .req{
            
        }
        .espacio{
            color: white;
        }
    </style>
</head>
<body>

    <p>{{ $doc->fecha_inicio->format('d , M , Y')}}</p>
    <p class="titulo">{{ $doc->titulo }}</p>
    <br>
    <p class="descp">Area de : {{ $doc->area->nombre}}</p>
    <p class="descp" style="text-align: justify">{{ $doc->descripcion }}<p>
    </br>
    <h4>1. Requerimientos</h4>
    <div class="box-body">
              
              <table id="user-table" class="table table-bordered table-striped">
                <thead>
                    
                    @if($cant == '0')
                        <tr>
                            <th>Item</th>
                            <th>Cantidad</th>
                            <th>Hrs. Academicas</th>
                            <th>Destino</th>
                            <th>codigo</th>
                        </tr>
                    @endif
                    @if($cant == '1')
                        <tr>
                            <th>Item</th>
                            <th>Cantidad</th>
                            <th>Hrs. Academicas</th>
                            <th>Destino</th>
                        </tr>
                    @endif
                    
                </thead>
                <tbody>
                        @foreach($doc->items as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->cantidad_aux}}</td>
                                <td>{{ $item->horas}}</td>
                                <td>{{ $item->destino}}</td>
                            </tr>
                        @endforeach
                        @foreach($doc->itemlabs as $itemlab)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$itemlab->cantidad_aux}}</td>
                                <td>{{ $itemlab->horas}}</td>
                                <td>{{ $itemlab->nombre}}</td>
                                <td>{{ $itemlab->codigo}}</td>
                            </tr>
                        @endforeach
                </tbody>
              </table>
            </div>

    <h4>2. Requisitos</h4>
    @foreach($doc->requisitos as $requisito)
        <p class="req" style="text-align: justify">{{ $requisito->detalle }}</p>
    @endforeach


    <h4>3. Documentos a presentar</h4>
    @foreach($doc->documentos as $documento)
        <p class="doc" style="text-align: justify">{{ $documento->detalle }}</p>
    @endforeach
    <p class="Nota" style="text-align: justify">Nota: Toda la documentación se legalizará gratuitamente en 
    Secretaria del Departamento de Informática y Sistemas. (Presentar original
    y fotocopias). La documentación no será devuelta.</p>

    <h4>4. De la forma</h4>
    <p class="req" style="text-align: justify">Presentación de la documentación
    en sobre manila cerrado y rotulado con con el SISTEMA</p>

    <h4>5. Fecha de presentación</h4>
    <p class="req" style="text-align: justify">La calificación de méritos se basará en los documentos presentados por el postulante y se
    realizará sobre la base de 100 puntos que representa el 20% del puntaje final y se ponderará
    de la siguiente manera.</p>

    <h4>6. De la calificacion de meritos</h4>
    <div class="box-body">
        <table id="user-table" class="table  table-sm table-bordered">
            <thead>
                <tr>
                     <th>Descripcion Meritos</th>
                     <th>Porcentaje</th>
                 </tr>
              </thead>
                <tbody>
                    <template>{{$tit=6, $titulo=1}}</template>
                    @foreach($tabla->secciones as $seccion)
                    <tr class="table-secondary">    
                        <td>{{$tit}}.{{$titulo}}.{{$seccion->nombre}}</td>
                        <td class="table-secondary">{{$seccion->valor}}</td>
                        <template>{{$subtitulo=1}}</template>
                        @foreach($seccion->subsecciones as $subseccion)
                            <tr>
                                <td>{{$subseccion->nombre}}</td>
                                <td>{{$subseccion->puntaje}}</td>
                                
                                @foreach($subseccion->incisos as $inciso)
                                    <tr>
                                        <td>{{$inciso->nombre}}</td>
                                        <td>{{$inciso->puntaje}}</td>
                                        @foreach ($inciso->subincisos as $subinciso)
                                            <tr>
                                                <td style="border:0;">{{$subinciso->nombre}}...........{{$subinciso->puntaje}}</td>
                                                <td style="border:0;"></td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tr>
                            <template>{{$subtitulo++}}</template>
                        @endforeach
                    </tr>
                    <template>{{$titulo++}}</template>
                    @endforeach 
              </tbody>
        </table>
    </div>
    <h4>7. Calificacion de conocimientos</h4>
    <p class="Nota" style="text-align: justify">La calificacion de conocimientos se realiza sobre la base de 100 puntos, equivalentes al 80%
    de la calificacion final. Se ralizan las siguientes pruebas:</p>
    <p>a) Examen escrito de conocimientos(prueba de preselección).........40%
    </p>
    <p class="Nota" style="text-align: justify">
    b) Examen oral, donde se evaluaran aspectos didácticos y pedagógicos sobre conocimiento y dominio
    de la materia. Tendrá una duracion maxima de 25 minutos:</p>
    <p class="Nota" style="text-align: justify">15 minutos de exposicion y 10 minutos de preguntas.......................60%</p>
    <h4>8. De los tribunales</h4>
    <p class="Nota" style="text-align: justify">Los Honorables Consejos de Carrera de Informaática de Sistemas designarán respectivamente; para
    la calificacion de méritos 1 docente y 1 delegado estudiante y para la comisión de conocimientos 1
    docente por asignatura convocada más un estudiante veedor</p>
    <h4>9. Fecha de las pruebas</h4>
    <p class="Nota" style="text-align: justify">Las pruebas escritas serán sobre el contenido de la materia a la que postula y la nota de 
    aprobación mayor o igual a 51.</p>
    <p class="Nota" style="text-align: justify">Las pruebas orales, se tomarán solo a los postulantes que hayan vencido la prueba escrita y de 
    acuerdo a pertinencia y contenido de la materia a la que postula.</p>
    <p class="Nota" style="text-align: justify">Fechas importantes a considerar:</p>

    <div class="box-body">
              
        <table id="user-table" class="table table-bordered table-striped">
        <thead>
                <tr>
                    <th>Eventos</th>
                    <th>Fechas</th>
                </tr>
        </thead>
        <tbody>
                <tr>
                    <td>Publicacion de convocatoria</td>
                    <td>{{$doc->fecha_inicio->format('d - M - Y')}}</td>
                </tr>
                @foreach($doc->eventos as $evento)
                    <tr>
                        <td>{{ $evento->detalle}}</td>
                        <td>{{ $evento->fecha->format('d - M - Y')}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td>Fin de la convocatoria</td>
                    <td>{{$doc->fecha_fin->format('d - M - Y')}}</td>
                </tr>
        </tbody>
        </table>
    </div>

    <h4>10. Del nombramientos</h4>
    <p class="Nota" style="text-align: justify">Los nombramientos de auxilar universitario titular recaerán sobre aquellos postulantes que 
    hubieran y optenido mayor calificacion. Caso contrario se procederá con el nombramiento de 
    aquel que tenga la calificacion mayor como invitado.</p>
    <p class="Nota" style="text-align: justify">Cabe resaltar que un auxiliar invitado solo tendrá nombramiento por los periodos académicos 
    del semestre I y II del presente año.</p>
    <p class="Nota" style="text-align: center"> Cochabamba, {{$doc->fecha_inicio->format('d - M - Y')}}</p>
    
    <p class="espacio">.</p>
    <p class="espacio">.</p>
    <p class="Nota" style="text-align: center">..................................................</p>
    <p class="Nota" style="text-align: center">DIRECTOR DE CARRERA</p>
    
    <p class="espacio">.</p>
    <p class="espacio">.</p>
    <p class="Nota" style="text-align: center">..................................................</p>
    <p class="Nota" style="text-align: center">JEFE DPTO DE CARRERA</p>
    
    <p class="espacio">.</p>
    <p class="espacio">.</p>
    <p class="Nota" style="text-align: center">..................................................</p>
    <p class="Nota" style="text-align: center">DECANO - FCyT</p>

</body>
</html>