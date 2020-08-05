@extends('admin.layout')
 

 @section('content')
 <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-5">
                <div class="box box-primary">
                    <div class="box-header with-border ">
                        <h3 class="box-title">Asignar Rol a Usuario</h3>
                    </div>
                    <div class="box-body">
                                 <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                                        <label for="name"  > Nombre del ususario :</label>
                                        <input name="nombre" class="form-control" value="{{ $user->name  }}" >
                                        {!! $errors->first('nombre','<span class=help-block>:message</span>') !!}
                                </div>
                    <form method="POST" action="{{ route('admin.roles.asignar3',$user) }}">
                        {{csrf_field()}} {{ method_field('PUT')}}
                                    <div class="form-group">
                                                <label for="select">Convocatoria a Asignar</label><br>
                                                    <select name="convocatoria"  class="col-md-5 " id="select">
                                                                <option value=""  >  Eliga una convocatoria</option>
                                                        @foreach ($convocatorias as $convocatoria )
                                                                @if( $convocatoria->ocupado( $user->id,$convocatoria->id) === 1 )
                                                                @else
                                                                    <option value="{{ $convocatoria->id}}" >{{ $convocatoria->titulo }}</option>
                                                                @endif
                                                               <h1> asd{{ $convocatoria->ocupado( $user->id,$convocatoria->id)}}</h1> 
                                                        @endforeach
                                                    </select>
                                
                                    </div>
                                <br>
                                <div class="form-group ">
                                            <label >Roles</label>
                                            @foreach ($roles as $role )
                                                    <div class="radio">
                                                        <label >  
                                                                @if( $role->id !== 1)
                                                                <input type="radio" name="rol" value="{{ $role->name }}" >
                                                                {{ $role->name }} <br>
                                                                <small calss="text-muted">{{ $role->permissions->pluck('name')->implode(' , ')}}
                                                                </small>
                                                                @endif
                                                        </label>
                                                    </div>
                                            @endforeach
                                </div>
                                

                            <div class="form-group">
                                 <button class="btn btn-primary btn-block"> Asignar</button>
                            </div>
                    </form>


        </div>
 </div>


 @endsection