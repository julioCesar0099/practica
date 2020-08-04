@extends('admin.layout')
 

 @section('content')
 <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-5">
                <div class="box box-primary">
                    <div class="box-header with-border ">
                        <h3 class="box-title">Datos  del Departamento</h3>
                    </div>
                    <div class="box-body">
                    <form method="POST" action="{{ route('admin.departamentos.update', $departamento) }}">
                        {{csrf_field()}}  {{ method_field('PUT') }}
                                 <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                                        <label for="nombre" > Nombre  :</label>
                                        <input name="nombre" class="form-control" value="{{old('nombre' ,$departamento->nombre )}}" >
                                        {!! $errors->first('nombre','<span class=help-block>:message</span>') !!}
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('permissions') ? 'has-error' : '' }}">
                                        <label > Carreras:</label>
                                        @foreach ($carreras as $carrera)
                                                    <div class="checkbox">
                                                            @if( $carrera->area_id === 0 || $departamento->carreras->contains($carrera->id)  ) 
                                                            <label>
                                                                <input name="carreras[]" type="checkbox" value="{{ $carrera->id }}"
                                                                {{ $departamento->carreras->contains($carrera->id) ? 'checked':'' }}>
                                                                {{ $carrera->nombre}} 
                                                            </label>
                                                            @endif

                                                    </div>
                                         @endforeach
                                        {!! $errors->first('carreras','<span class=help-block>:message</span>') !!}
                                </div>

                            <div class="form-group">
                                 <button type="submit" class="btn btn-primary btn-block"> Actualizar Departamento</button>
                            </div>
                            

                    </form>
                    <div class="form-group">
                                <a href="{{ route('admin.departamentos.index')}}" class="btn btn-primary btn-block">Atras </a>
                            </div>


        </div>
 </div>


 @endsection