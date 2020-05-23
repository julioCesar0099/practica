@extends('admin.layout')

@section('header')
  <h1>
     Crear Nueva Convocatoria 
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ route('admin.combocatorias.index') }}"><i class="fa fa-list"></i> Convocatorias</a></li>
    <li class="active"> crear convocatoria</li>
  </ol>
@endsection

@section('content')

<form  method="POST" action="{{ route('admin.combocatorias.store') }}">
{{ csrf_field() }}
                <div class="row">
                            <div class="col-md-6">
                                        <div class="box box-primary">
                                                <div class="box-header">
                                                    <h3 class="box-title">Crear una Convocatoria</h3>
                                                </div>
                                                <div class="box-body">
                                                        <div class="form-group {{ $errors->has('titulo') ? 'has-error' : '' }}">
                                                            <label> Titulo de la convocatoria</label>
                                                            <input name="titulo" class="form-control" placeholder="ingresa el titulo de la convocatoria">
                                                            {!! $errors->first('titulo','<span class=help-block>:message</span>') !!}
                                                        </div>
                                                        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }} ">
                                                            <label> Descripcion de la convocatoria</label>
                                                            <input name="descripcion" class="form-control" placeholder="ingresa la descripcion de la convocatoria">
                                                            {!! $errors->first('descripcion','<span class=help-block>:message</span>') !!}
                                                        </div>
                                                                <div  class="form-group {{ $errors->has('tabla') ? 'has-error' : '' }}">
                                                                    <label> Tabla de calificacion de meritos </label>
                                                                    <select  name="tabla" class="form-control">
                                                                            <option value="1">tabla 1</option>
                                                                    </select>
                                                                    {!! $errors->first('tabla','<span class=help-block>:message</span>') !!}
                                                                </div>

                                                                <div class="form-group">
                                                                    <button href="#" class="btn btn-primary ">ver tabla</button>
                                                                    <button href="#" class="btn btn-primary ">añadir nueva tabla</button>
                                                                </div>    
                                                </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                                <div class="box box-primary">
                                                    <div class="box-header">
                                                    </div>
                                                <div class="box-body">
                                                        <div class="form-group">
                                                                 <label>fecha final</label>
                                                                    <div class="input-group date">
                                                                            <div class="input-group-addon">
                                                                                <i class="fa fa-calendar"></i>
                                                                            </div>
                                                                                <input name="fecha_fin" type="text" class="form-control pull-right" id="datepicker">
                                                                    </div>
                                                         </div>
                                                        <div class="form-group {{ $errors->has('facultad') ? 'has-error' : '' }}">
                                                            <label> Facultad </label>
                                                            <select name="facultad" class="form-control">
                                                                @foreach($facultades as $facultad)
                                                                            <option value="{{ $facultad->id }}">{{ $facultad->nombre}}</option>
                                                                @endforeach
                                                            </select>
                                                            {!! $errors->first('facultad','<span class=help-block>:message</span>') !!}
                                                        </div>
                                                        <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                                                            <label> Area </label>
                                                            <select name="area" class="form-control">
                                                                @foreach($areas as $area)
                                                                            <option value="{{ $area->id }}">{{ $area->nombre}}</option>
                                                                @endforeach
                                                            </select>
                                                            {!! $errors->first('area','<span class=help-block>:message</span>') !!}
                                                        </div>
                                                        <div class="form-group {{ $errors->has('carreras') ? 'has-error' : '' }}">
                                                            <label> Carreras </label>
                                                            <select  name="carreras[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona una o mas carreras" style="width: 100%;">
                                                                @foreach($carreras as $carrera )
                                                                    <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                            {!! $errors->first('carreras','<span class=help-block>:message</span>') !!}
                                                        </div>
                                                        
                                                </div>
                                    </div>
                            </div>
                </div>

                <div class="row">
                        <div class="col-md-6">
                                <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Requisitos de la convocatoria</h3>
                                            </div>
                                            <div class="box-body">
                                                    <div class="form-group">
                                                        <label> Requisito : 1</label>
                                                        <textarea name="detalle_requisito" class="form-control" placeholder="ingresa el requisito de la convocatoria"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <a href="#" >añadir nuevo requisito</a>
                                                    </div>
                                            </div>        
                                </div>
                        </div>
                        <div class="col-md-6">   
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">Documentos a presentar de la convocatoria</h3>
                                    </div>
                                            <div class="box-body">
                                                    <div class="form-group">
                                                        <label> Documento : 1</label>
                                                        <textarea name="detalle_documento" class="form-control" placeholder="ingresa los detalles de la convocatoria"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <a href="#" >añadir nuevo Documento</a>
                                                    </div>
                                                
                                            </div>        
                                </div>
                        </div>
                </div>

                <div class="row">
                        <div class="col-md-6">
                                <div class="box box-primary">
                                            <div class="box-header">
                                                <h3 class="box-title">Items de la convocatoria</h3>
                                            </div>
                                            <div class="box-body">
                                                    <div class="form-group">
                                                        <label> Cantidad de auxiliares : Item 1</label>
                                                        <input type="number" type="unsignedInteger" name="cantidad_aux" class="form-control" placeholder="ingresa el numero de auxiliares"></input>
                                                    </div>
                                                    <div class="form-group">
                                                        <label> Horas laborales : Item 1</label>
                                                        <input type="number" type="unsignedInteger" name="horas" class="form-control" placeholder="ingresa las horas asignadas"></input>
                                                    </div>
                                                    <div class="form-group">
                                                        <label> Destino : Item 1</label>
                                                        <input  name="destino" class="form-control" placeholder="ingresa el destino del item"></input>
                                                    </div>
                                                    <div class="form-group">
                                                        <a href="#" >añadir nuevo item</a>
                                                    </div>
                                            </div>        
                                </div>
                        </div>
                        <div class="col-md-6">
                                <div class="box box-primary">
                                        <div class="box-header">
                                                <h3 class="box-title">Acciones para la convocatoria</h3>
                                        </div>
                                        <div class="box-body">
                                                    <div class="form-group">
                                                            <button type="submit" class="btn btn-primary">CREAR CONVOCATORIA </button>
                                                            <a href="{{ route('admin.combocatorias.index')}}" class="btn btn-primary">ATRAS</a>
                                                            
                                                    </div>
                                                
                                        </div>        
                                </div>
                        </div>
                </div>
 </form>

@endsection

@push('styles')

        <!-- daterange picker -->
        <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
         <!-- Select2 -->
        <link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
          <!-- bootstrap datepicker -->
         <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">

@endpush


@push('scripts')
             <!-- date-range-picker -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
            <script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
            <!-- Select2 -->
            <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
            <!-- bootstrap datepicker -->
            <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>


            <script>  
            $('#reservation').daterangepicker();

            $(".select2").select2();
            //Date picker
                $('#datepicker').datepicker({
                autoclose: true
                });
            </script>
@endpush





