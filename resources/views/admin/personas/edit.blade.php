@extends('admin.layout')
 
 
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
                    <div class="form-group">
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
                <div class="form-group">
                     <input type="submit" class="btn btn-primary my-2 my-sm-0" value="Modificar">
                    <a href="{{ url('/admin/personas')}}" class="btn btn-primary my-2 my-sm-0">Regresar</a>
                </div>
                </div>
            </div>        
        </div>
    </div>
</form>

@endsection