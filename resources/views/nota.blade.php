@extends('home')




@section('content')

<div class="box box-primary">
            <div class="box-header ">
                  <h3 class="box-title">Lista de Notas de la {{$combocatoria->titulo}}</h3>
            </div>
            <div class="box-body">
              <table id="combocatoria-table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Estudiante</th>
                    <th>Area</th>
                    <th>Item</th>
                    <th>Meritos</th>
                    <th>Conocimiento</th>
                    <th>Finales</th>
                    <th>Ganadores</th>
                  </tr>
                </thead>
              </table>
            </div>
    <!-- /.box-body -->
  </div>

@endsection