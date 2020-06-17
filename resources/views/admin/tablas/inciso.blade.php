@extends('admin.layout')
 
@section('header')
  <h1>
        Tabla de meritos
    <small>crear una Tabla de Meritos</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Crear Tabla</li>
  </ol>
@endsection
 @section('content')
 <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-5">
        
                    <div class="box box-primary">
                                <div class="box-header with-border ">
                                    <h3 class="box-title">Añadir un inciso</h3>
                                </div>
                                <div class="box-body">
                                <form method="POST" action="{{ route('admin.tablas.inciso.store',[$tabla,$subseccion]) }}">
                                        {{csrf_field()}}
                                             <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                                                    <label > Nombre  </label>
                                                    <input name="nombre" class="form-control" value="{{old('nombre')}}" >
                                                    {!! $errors->first('nombre','<span class=help-block>:message</span>') !!}
                                            </div> 
                                            <div class="form-group {{ $errors->has('valor') ? 'has-error' : '' }} ">
                                                 <label > Valor </label>
                                                <input  type="number" name="valor"   max="{{$val}}" class="form-control" placeholder="Valor" value="{{old('valor')}}" >
                                                {!! $errors->first('valor','<span class=help-block>:message</span>') !!}
                                            </div>
                                            <div class="form-group">
                                                      <button class="btn btn-primary">  Aceptar</button>
                                                      <a href="{{ route('admin.tablas.edit',$tabla)}}" class="btn btn-xm btn-primary pull-right">cancelar</a>
                                            </div>
                                </form>
                                </div>
                    </div>
        </div>
</div>


 @endsection
 @push('scripts')

@endpush