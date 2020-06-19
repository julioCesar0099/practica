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
                <thead>
                  <tr>
                    <td>{{1}}</td>
                    <td>{{$post[0]->persona_id}}</td>
                    <td>{{$combocatoria->area->nombre}}</td>
                    <td>{{$post[0]->item_nombre}}</td>
                    <td>60</td>
                    <td>40</td>
                    <td>50</td>
                    <td>no</td>
                  </tr>
                  <tr>
                    <td>{{2}}</td>
                    <td>{{$post[1]->persona_id}}</td>
                    <td>{{$combocatoria->area->nombre}}</td>
                    <td>{{$post[1]->item_nombre}}</td>
                    <td>50</td>
                    <td>30</td>
                    <td>40</td>
                    <td>no</td>
                  </tr>
                  <tr>
                    <td>{{3}}</td>
                    <td>{{$post[2]->persona_id}}</td>
                    <td>{{$combocatoria->area->nombre}}</td>
                    <td>{{$post[2]->item_nombre}}</td>
                    <td>50</td>
                    <td>80</td>
                    <td>65</td>
                    <td>si</td>
                  </tr>
                  <tr>
                    <td>{{4}}</td>
                    <td>{{$post[3]->persona_id}}</td>
                    <td>{{$combocatoria->area->nombre}}</td>
                    <td>{{$post[3]->item_nombre}}</td>
                    <td>50</td>
                    <td>26</td>
                    <td>38</td>
                    <td>no</td>
                  </tr>
                </thead>
              </table>
            </div>
    <!-- /.box-body -->
  </div>

@endsection