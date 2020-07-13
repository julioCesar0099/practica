@extends('admin.layout')
 
@section('content')
@inject('facultades','App\Services\Facultades')
@inject('ocupaciones','App\Services\Ocupaciones')
@inject('carreras','App\Services\Carreras')
 
 
@section('content')
     

<form method="post" action="{{ url('/admin/personas/'.$persona->id)}}" enctype="multipart/form-data">

    {{csrf_field() }}

    {{method_field('PATCH')}}
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
        <div class="box box-primary">
            <div class="box-header ">
                  <h3 class="box-title">Editar datos</h3>
            </div>
            <div class="box-body">
                <div class="">
                    <div class="form-group">
                    <label form="nombre">{{'Codigo SIS'}}</label>
                    <input class="form-control" type="number" name="codigoSIS" id="codigoSIS" value="{{$persona->codigoSIS}}">
                    {!! $errors->first('codigoSIS','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
                    </div>
                </div>
                <div class="">
                    <label form="nombre">{{'INFORMACION PERSONAL'}}</label>
                    </br>
                    <label form="nombre">{{'Nombre'}}</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" value="{{$persona->nombre}}">
                    {!! $errors->first('nombre','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
                    </div>
                    <div class="form-group">  
                    <label form="apellidoP">{{'Apellido Paterno'}}</label>
                    <input class="form-control" type="text" name="apellidoP" id="apellidoP" value="{{$persona->apellidoP}}">
                    {!! $errors->first('apellidoP','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
                    </div>
                    <div class="form-group">  
                    <label form="apellidoM">{{'Apellido Materno'}}</label>
                    <input class="form-control" type="text" name="apellidoM" id="apellidoM" value="{{$persona->apellidoM}}">
                    {!! $errors->first('apellidoM','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
                    </div>
                    <div class="form-group">
                    <label form="correo">{{'Correo'}}</label>
                    <input class="form-control" type="email" name="correo" id="correo" value="{{$persona->correo}}">
                    {!! $errors->first('email','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
                    </div>
                    <div class="form-group">
                    <label form="telefono">{{'Telefono'}}</label>
                    <input class="form-control" type="text" name="telefono" id="telefono" value="{{$persona->telefono}}">
                    {!! $errors->first('telefono','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
                    </div>

                    <label form="facultades">{{'Facultades'}}</label>
                    <select id="facultad" name="facultad_id" class="form-control">
                        @foreach($facultades->get() as $index => $facultad)
                        <option value="{{$index}}" {{$index == $persona->facultad_id ? 'selected' : ''}} >
                            {{$facultad}}
                        </option>
                        @endforeach
                    </select>
                    {!! $errors->first('facultad_id','<div class="invalid-feedback alert alert-danger">:message</div>')!!}   
                    </br>
                    
                    <label form="carreras">{{'Carreras'}}</label>
                    <select id="carrera" data-old="{{old( "carrera_id" )}}" name="carrera_id" class="form-control">
                        @foreach($carreras->getCar() as $index => $carrera)
                        <option value="{{$index}}" {{$index == $persona->carrera_id ? 'selected' : ''}}>
                            {{$carrera}}
                        </option>
                        @endforeach
                    </select>
                    {!! $errors->first('carrera_id','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
                    </br>
                    <label form="ocupaciones">{{'Ocupaciones'}}</label>
                    <select id="ocupacion" name="ocupacion_id" class="form-control">
                        @foreach($ocupaciones->getOp() as $index => $ocupacion)
                        <option value="{{$index}}" {{$index == $persona->ocupacion_id ? 'selected' : ''}}>
                            {{$ocupacion}}
                        </option>
                        @endforeach
                    </select>
                    {!! $errors->first('ocupacion_id','<div class="invalid-feedback alert alert-danger">:message</div>')!!}
                    </br>



                </div>                
                <div class="form-group">
                    <div class="">    
                        <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Modificar">
                        <a href="{{ url('/admin/personas')}}" class="btn btn-primary my-2 my-sm-0">Regresar</a>
                    </div>
                </div>
                </div>
            </div>        
        </div>
    </div>
</form>

@endsection