@extends('plantilla')

@section('seccion')  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Registro de postulantes</h1>
        <br><br><br><br>
        <form action="{{route('postulantes.identificacion',$convocatoria)}}" method="POST">
            {{csrf_field()}}
            @if(session('mensaje'))
            <div class="aler alert-success">
               {{session('mensaje')}}
            </div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger">
                El codigoSis es obligatorio
            </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-4 col-md-offset-4">
                <h2>Ingrese su CodigoSis</h2>
            <br><br><br>
                    <div class="form-group">
                        <input type="number" class="btn-block" name="codigo" value="{{old('codigo')}}" placeholder="ingrese su codsis">
                    </div>
                    <div class="form-group">
                        <a href="{{ url('/') }}" class="btn btn-primary my-2 my-sm-0">Cancelar</a>
                        <button class=" btn btn-primary" type="submit" >Ingresar</button>
                    </div>
                </div>
            </div>
        </form>       
</body>
</html>
@endsection