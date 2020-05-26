@extends('admin.layout')
 
@section('header')
  <h1>
    Roles 
    <small>crear un rol</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ route('admin.roles.index') }}"><i class="fa fa-pencil"></i> Roles</a></li>
    <li class="active">Crear</li>
  </ol>
@endsection
 @section('content')
 <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-5">
                <div class="box box-primary">
                    <div class="box-header with-border ">
                        <h3 class="box-title">Datos del nuevo Rol</h3>
                    </div>
                    <div class="box-body">
                    <form method="POST" action="{{ route('admin.roles.store') }}">
                        {{csrf_field()}}
                                 <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name" > Nombre del Rol :</label>
                                        <input name="name" class="form-control" value="{{old('name')}}" >
                                        {!! $errors->first('name','<span class=help-block>:message</span>') !!}
                                </div>
                                <div class="form-group col-md-6 {{ $errors->has('permissions') ? 'has-error' : '' }}">
                                        <label > Permisos:</label>
                                        @foreach ($permissions as $id => $name)
                                            <div class="checkbox">
                                                    <label>
                                                        <input name="permissions[]" type="checkbox" value="{{ $name }}"
                                                        {{ $role->permissions->contains($id) ? 'checked':'' }}>
                                                        {{ $name }} 
                                                    </label>
                                            </div>
                                         @endforeach
                                        {!! $errors->first('permissions','<span class=help-block>:message</span>') !!}
                                </div>

                            <div class="form-group">
                                 <button class="btn btn-primary btn-block"> Crear rol</button>
                            </div>

                    </form>


        </div>
 </div>


 @endsection