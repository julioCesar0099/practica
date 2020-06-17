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
            font-size: 40px;
            text-align: center;
            font-weight: bold;
        }
        .descp{
            font-weight: bold;
            
        }
    </style>
</head>
<body>

    <p>{{ $doc->fecha_inicio->format('d , M , Y')}}</p>
    <p class="titulo">{{ $doc->titulo }}</p>
    <br>
    <p class="descp">Area de : {{ $doc->area->nombre}}</p>
    <p class="descp">{{ $doc->descripcion }}<p>
    <p style="text-align: justify;">{{ $doc->documentos }}</p>
    <p style="text-align: justify;">{{ $doc->requisitos }}</p>

</body>
</html>