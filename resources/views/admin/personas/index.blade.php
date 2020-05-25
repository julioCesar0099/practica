 
 @extends('admin.layout')
 
 
 @section('content')
     
<h1>Lista de docentes y estudiantes</h1>

<table class="table table- light" >

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Ocupación</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Acciones</th>
            
        </tr>
    </thead>

    <tbody>
    @foreach($personas as $personas)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{ $personas->ocupacion}}</td>
            <td>{{ $personas->nombre}}</td>
            <td>{{ $personas->apellidoP}}</td>
            <td>{{ $personas->apellidoM}}</td>
            <td>{{ $personas->telefono}}</td>
            <td>{{ $personas->correo}}</td>
            <td>
            @can('editar usuarios',new \Spatie\Permission\Models\Role)    
            <a href="{{ url('/admin/personas/'.$personas->id.'/edit')}}" >
            Editar
            </a>
            @endcan
            @can('eliminar usuarios',new \Spatie\Permission\Models\Role)
            <form method="post" action="{{ url('/admin/personas/'.$personas->id)}}">
                {{csrf_field() }}
                {{method_field('DELETE')}}
                <button type="submit" onclick="return confirm('Eliminar?')">Eliminar</button>

            </form>
            @endcan
            </td>
        </tr>
    @endforeach
    </tbody>

</table>


@endsection
 