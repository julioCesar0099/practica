@extends('admin.layout')
 

 @section('content')
 <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-5">
                <div class="box box-primary">
                    <div class="box-header with-border ">
                        <h3 class="box-title">Datos  de la Unidad</h3>
                    </div>
                    <div class="box-body">
                    <form method="POST" action="{{ route('admin.unidades.update', $unidad) }}">
                        {{csrf_field()}}  {{ method_field('PUT') }}
                                <label > Nombre </label> 
                                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                                        <input autocomplete="off" name="nombre" class="form-control" value="{{old('nombre',$unidad->nombre)}}" placeholder="Ingresa el nombre">
                                        {!! $errors->first('nombre','<span class=help-block>:message</span>') !!}
                                </div>
                                <label > Codigo  <small class="text-muted">( Opcional )  </small>  </label> 
                                <div class="form-group {{ $errors->has('codigo') ? 'has-error' : '' }}">
                                        <input autocomplete="off" name="codigo" class="form-control" value="{{old('codigo', $unidad->codigo)}}" placeholder="Ingresa el codigo">
                                        {!! $errors->first('codigo','<span class=help-block>:message</span>') !!}
                                </div>
                               <label> Departamento </label>
                                <div  class="form-group {{ $errors->has('departamento') ? 'has-error' : '' }}">
                                    <select  name="departamento" class="form-control">
                                                  @foreach($departamentos as $departamento)
                                                    <option  value="{{$departamento->id}}" {{ old('departamento',$unidad->area_id) == $departamento->id  ? 'selected' :'' }}  >
                                                    {{$departamento->nombre}}</option>
                                                  @endforeach
                                    </select>
                                    {!! $errors->first('tabla','<span class=help-block>:message</span>') !!}
                                </div>
                            <div class="form-group">
                                 <button type="submit" class="btn btn-primary btn-block"> Actualizar Unidad</button>
                            </div>
                            

                    </form>
                    <div class="form-group">
                                <a href="{{ route('admin.unidades.index')}}" class="btn btn-primary btn-block">Atras </a>
                            </div>


        </div>
 </div>


 @endsection