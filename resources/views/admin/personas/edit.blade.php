@extends('admin.layout')
 
 
 @section('content')
     

<form method="post" action="{{ url('/admin/personas/'.$persona->id)}}" enctype="multipart/form-data">

    {{csrf_field() }}

    {{method_field('PATCH')}}
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-heading">
                <h2>Editar información</h2>
                <div class="form-group">
                    <label form="nombre">{{'Nombre'}}</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" value="{{$persona->nombre}}">
                    
                    <label form="apellidoP">{{'Apellido Paterno'}}</label>
                    <input class="form-control" type="text" name="apellidoP" id="apellidoP" value="{{$persona->apellidoP}}">
                    
                    <label form="apellidoM">{{'Apellido Materno'}}</label>
                    <input class="form-control" type="text" name="apellidoM" id="apellidoM" value="{{$persona->apellidoM}}">
                    
                    <label form="codigoSIS">{{'Codigo SIS'}}</label>
                    <input class="form-control" type="text" name="codigoSIS" id="codigoSIS" value="{{$persona->codigoSIS}}">
                    
                    <label form="carrera">{{'Carrera'}}</label>
                    <input class="form-control" type="text" name="carrera" id="carrera" value="{{$persona->carrera}}">
                    
                    <label form="correo">{{'Correo'}}</label>
                    <input class="form-control" type="email" name="correo" id="correo" value="{{$persona->correo}}">
                    
                    <label form="telefono">{{'Telefono'}}</label>
                    <input class="form-control" type="text" name="telefono" id="telefono" value="{{$persona->telefono}}">
                    
                    <label form="facultad">{{'Facultad'}}</label>
                    <input class="form-control" type="text" name="facultad" id="facultad" value="{{$persona->facultad}}">
                    
                    <label form="ocupacion">{{'Ocupacion'}}</label>
                    <input class="form-control" type="text" name="ocupacion" id="ocupacion" value="{{$persona->ocupacion}}">
                    

                    <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Modificar">

                    <a href="{{ url('/admin/personas')}}" class="btn btn-primary my-2 my-sm-0">Regresar</a>
                </div>
            </div>        
        </div>
    </div>
</form>

@endsection