@extends('admin.layout')
 
 
@section('content')
@inject('facultades','App\Services\Facultades')
@inject('ocupaciones','App\Services\Ocupaciones')
@inject('carreras','App\Services\Carreras')

@if(count($errors)>0)

@endif

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
                        <input class="form-control" type="number" name="codigoSIS" id="codigoSIS" value="{{isset($persona->codigoSIS)?$persona->codigoSIS:old('codigoSIS')}}" Placeholder="Ingrese su codigo sis">
                        {!! $errors->first('codigoSIS','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="panel panel-heading">
                        <label>{{'INFORMACIÓN PERSONAL'}}</label>
                        </br>
                        <label form="nombre">{{'Nombre'}}</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" value="{{isset($persona->nombre)?$persona->nombre:old('nombre')}}" Placeholder="Ingrese su nombre">
                        {!! $errors->first('nombre','<div class="invalid-feedback alert alert-danger">:message</div>')!!}

                        <label form="apellidoP">{{'Apellido Paterno'}}</label>
                        <input class="form-control" type="text" name="apellidoP" id="apellidoP" value="{{isset($persona->apellidP)?$persona->apellidP:old('apellidoP')}}" Placeholder="Ingrese su apellido paterno">
                        {!! $errors->first('apellidoP','<div class="invalid-feedback alert alert-danger">:message</div>')!!}

                        <label form="apellidoM">{{'Apellido Materno'}}</label>
                        <input class="form-control" type="text" name="apellidoM" id="apellidoM" value="{{isset($persona->apellidM)?$persona->apellidoM:old('apellidoM')}}" Placeholder="Ingrese su apellido materno">
                        {!! $errors->first('apellidoM','<div class="invalid-feedback alert alert-danger">:message</div>')!!}

                        <label form="correo">{{'Correo'}}</label>
                        <input class="form-control" type="email" name="correo" id="correo" value="{{isset($persona->correo)?$persona->correo:old('correo')}}" Placeholder="Ingrese su correo">
                        {!! $errors->first('correo','<div class="invalid-feedback alert alert-danger">:message</div>')!!}

                        <label form="telefono">{{'Telefono'}}</label>
                        <input class="form-control" type="number" name="telefono" id="telefono" value="{{isset($persona->telefono)?$persona->telefono:old('telefono')}}" Placeholder="Ingrese su telefono">
                        {!! $errors->first('telefono','<div class="invalid-feedback alert alert-danger">:message</div>')!!}

                        

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="panel panel-heading">
                        <label>{{'INFORMACIÓN ACADEMICA'}}</label>
                        </br>
                        <label form="facultades">{{'Facultades'}}</label>
                        <select id="facultad" name="facultad_id" class="form-control">
                            @foreach($facultades->get() as $index => $facultad)
                            <option value="{{$index}}" {{old('facultad_id' == $index ? 'selected' : ''}}>
                                {{$facultad}}
                            </option>
                            @endforeach
                        </select>
                        {!! $errors->first('facultad_id','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
                        </br>
                        
                        <label form="carreras">{{'Carreras'}}</label>
                        <select id="carrera" data-old="{{old( "carrera_id" )}}" name="carrera_id" class="form-control">
                            @foreach($carreras->getCar() as $index => $carrera)
                            <option value="{{$index}}" {{old('carrera_id') == $index ? 'selected' : ''}}>
                                {{$carrera}}
                            </option>
                            @endforeach
                        </select>
                        {!! $errors->first('carrera_id','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
                        </br>
                        <label form="ocupaciones">{{'Ocupaciones'}}</label>
                        <select id="ocupacion" name="ocupacion_id" class="form-control">
                            @foreach($ocupaciones->getOp() as $index => $ocupacion)
                            <option value="{{$index}}" {{old('ocupacion_id') == $index ? 'selected' : ''}}>
                                {{$ocupacion}}
                            </option>
                            @endforeach
                        </select>
                        {!! $errors->first('ocupacion_id','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
                        </br>
                        
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
