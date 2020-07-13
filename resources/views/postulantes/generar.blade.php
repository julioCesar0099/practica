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
            font-size: 25px;
            text-align: center;
            font-weight: bold;
        }
        .Nota.td{
            
            font-weight: bold;
        }
        .notas{
            font-size: 11px;
        }
        .estudiante {
            font-size: 11px;
            text-align: center;
            font-weight: bold;
        }
        

    </style>
</head>
<body>
        <p  class="titulo">Registro de Postulante</p>
        <p >N° de convocatoria: #{{ $convocatoria->id }}</p>
        <hr class="my-5">
        <div class="d-flex">
        <p class="notas">Nombre Completo: {{ $codS->nombre." ".$codS->apellidoP." ".$codS->apellidoM }}</p>
        <hr class="my-5">  
        <p class="notas">Correo: {{ $codS->correo}}</p>
        <hr class="my-5">  
        </div>
        <p class="notas">Carrera: {{ $carrera->nombre}}</p>
        <hr class="my-5">  
        <p class="notas">CodSIS:{{ $codS->codigoSIS }}</p>
        <hr class="my-5">  
        <p class="notas">Area:{{ $convocatoria->area->nombre }}</p>
        <hr class="my-5">  
        <p class="notas">Item:{{ $item->item_nombre }}</p>
        </ul></ul>
        <hr class="my-5">  
        <p class="notas">Lista de Documentos: </p>        
        <ul>
        @foreach($convocatoria->documentos as $documento)
            <li><p class="notas">{{$documento->detalle}}</p></li>
        @endforeach
        </ul>             
        <hr class="my-5">  
        <p class="notas">N° de hojas a entregar: {{ $numHojas->num_Hojas}}</p>
        <hr class="my-5">  
        <br>
        <p class="estudiante">..............................</p>
        <p class="estudiante">Firma de Estudiante</p>

        

  
</body>
</html>