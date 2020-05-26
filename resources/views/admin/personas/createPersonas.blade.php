@extends('admin.layout')
 
 
 @section('content')

<form action="{{ url('/admin/personas')}}" method="post" enctype="multipart/form-data">
    <div class="container ">

        {{csrf_field()}}
        <br/>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">   
                <div class="box box-primary">
                    <div class="panel panel-heading">
                        <h2>Agregar</h2>
                        <label form="prueba">{{'codigo SIS'}}</label>
                        <input class="form-control" type="number" name="codigoSIS" id="codigoSIS" value="" Placeholder="Ingrese su codigo sis">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary"> 
                    <div class="panel panel-heading">
                        <label>{{'INFORMACIÓN PERSONAL'}}</label>
                        </br>
                        <label form="nombre">{{'Nombre'}}</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" value="" Placeholder="Ingrese su nombre">
                        
                        <label form="apellidoP">{{'Apellido Paterno'}}</label>
                        <input class="form-control" type="text" name="apellidoP" id="apellidoP" value="" Placeholder="Ingrese su apellido paterno">
                        
                        <label form="apellidoM">{{'Apellido Materno'}}</label>
                        <input class="form-control" type="text" name="apellidoM" id="apellidoM" value="" Placeholder="Ingrese su apellido materno">
                        
                        <label form="correo">{{'Correo'}}</label>
                        <input class="form-control" type="email" name="correo" id="correo" value="" Placeholder="Ingrese su correo">
                        
                        <label form="telefono">{{'Telefono'}}</label>
                        <input class="form-control" type="text" name="telefono" id="telefono" value="" Placeholder="Ingrese su telefono">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="panel panel-heading">
                        <label>{{'INFORMACIÓN ACADEMICA'}}</label>
                        </br>
                        <label form="carrera">{{'Carrera'}}</label>
                        <input class="form-control" type="text" name="carrera" id="carrera" value="" Placeholder="Ingrese su carrera">

                        <label form="facultad">{{'Facultad'}}</label>
                        <input class="form-control" type="text" name="facultad" id="facultad" value="" Placeholder="Ingrese su facultad">
                        
                        <label form="ocupacion">{{'Ocupacion'}}</label>
                        <input class="form-control" type="text" name="ocupacion" id="ocupacion" value="" Placeholder="Ingrese su ocupacion">
                        <div class="form-group">
                        <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Agregar">
                        <a href="{{ url('/admin/personas')}}" class="btn btn-primary my-2 my-sm-0">Regresar</a>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection