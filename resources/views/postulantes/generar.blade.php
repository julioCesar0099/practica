<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Rotulo</title>
    <style>
        p {
            font-family: Arial, Helvetica, sans-serif;
        }
        .titulo {
            font-size: 30px;
            text-align: center;
            font-weight: bold;
        }
        .Nota.td{
            
            font-weight: bold;
        }
        .notas{
            font-size: 12px;
        }
        .estudiante {
            font-size: 12px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
        <p  class="titulo">Registro de Postulante</h2>
        <p >N° de convocatoria: #{{ $convocatoria->id }}</p>
        <hr class="my-4">   
        <p class="notas">Nombre Completo: {{ $codS->nombre." ".$codS->apellidoP." ".$codS->apellidoM }}</p>
        <hr class="my-4">  
        <p class="notas">Correo: {{ $codS->correo}}</p>
        <hr class="my-4">  
        <p class="notas">Carrera: {{ $carrera->nombre}}</p>
        <hr class="my-4">  
        <p class="notas">CodSIS:{{ $codS->codigoSIS }}</p>
        <hr class="my-4">  
        <p class="notas">Area:{{ $convocatoria->area->nombre }}</p>
        <hr class="my-4">  
        <p class="notas">Lista de Items (Opciones):</p>
        <ul><ul>
        @foreach ($convocatoria->items as $item)
            <li><p class="notas">{{$item->destino}}</p></li>
        @endforeach 
        </ul></ul>
        <p class="notas">Lista de Documentos (Opciones):</p>
        <hr class="my-4">  
        <ul><ul>
        @foreach($convocatoria->documentos as $documento)
            <li><p class="notas">{{$documento->detalle}}</p></li>
        @endforeach
        </ul></ul>              
        <hr class="my-4">  
        <p class="notas">N° de hojas a entregar:</p>
        <hr class="my-4">  
        <br>
        <br>
        
        <br>
        <p class="estudiante">..............................</p>
        <p class="estudiante">Firma de Estudiante</p>
  
</body>
</html>