<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Convocatoria</title>
    
    <style >

     
        p { 
        width: 50px;
        height: 50px;
       
        }

        .transformed{
        /* idéntico a rotateZ(45deg); */
        transform: rotate(-90deg);
        background-color: coral;
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

<p class="transformed">bar</p>
    
    <p class="transformed">
              <table id="user-table" class="table table-bordered table-striped">
                <thead>
                        <tr>
                  @foreach($convocatoria->tabla->secciones as $seccion )
                            <th>{{$seccion->nombre }}</th>
                            @foreach( $seccion->subsecciones as $subseccion )
                             <th>{{$subseccion->nombre }}</th>
                             @foreach( $subseccion->incisos as $inciso )
                             <th>{{$inciso->nombre }}</th>
                             @endforeach
                            @endforeach
                    @endforeach    
                        </tr>
                </thead>
                <tbody>
                        
                            <tr>
                                <td></td>
                                
                            </tr>
                      
                </tbody>
              </table>
            </p>

</body>
</html>