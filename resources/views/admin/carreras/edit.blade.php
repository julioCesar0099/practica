@extends('admin.layout')
 

 @section('content')
 <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-5">
                <div class="box box-primary">
                    <div class="box-header with-border ">
                        <h3 class="box-title">Datos  de la Carrera</h3>
                    </div>
                    <div class="box-body">
                    <form method="POST" action="{{ route('admin.carreras.update', $carrera) }}">
                        {{csrf_field()}}  {{ method_field('PUT') }}
                                 <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                                        <label for="nombre" > Nombre  :</label>
                                        <input name="nombre" class="form-control" value="{{old('nombre' ,$carrera->nombre )}}" >
                                        {!! $errors->first('nombre','<span class=help-block>:message</span>') !!}
                                </div>
                            <div class="form-group">
                                 <button type="submit" class="btn btn-primary btn-block"> Actualizar Carrera</button>
                            </div>
                            

                    </form>
                    <div class="form-group">
                                <a href="{{ route('admin.carreras.index')}}" class="btn btn-primary btn-block">Atras </a>
                            </div>


        </div>
 </div>


 @endsection