<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
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
                    <tr>
                        <th>Item</th>
                        <th>Cantidad</th>
                        <th>Hrs. Academicas</th>
                        <th>Destino</th>
                    </tr>
                 
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
                                                <td>{{$subinciso->nombre}}...........{{$subinciso->puntaje}}</td>
                                                
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

    <h4>8. De los tribunales</h4>
    <h4>9. Fecha de las pruebas</h4>
    <h4>10. Del nombramientos</h4>
</body>
</html>