
@extends('plantilla')

@section('seccion')
<div class="container">
    <section class="posts container">
				<h1 class="display-4 " align="center" >Notas {{ $convocatoria->titulo}}  </h1>
                    <p class="lead" align="center">Universidad Mayor de San Simón - Facultad de Ciencias y Tecnologia </p>
                <hr class="my-4">
		
			

                <div class="card">
                    <div class="card-body">
                    
                    <h5 class="card-title">Notas de Postulantes</h5>
                    <p class="card-text">

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th>CodigoSis</th>
                            <th>Item</th>
                            <th>Nota meritos</th>
                            <th>Nota Conocimientos</th>
                            <th>Nota Final</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($postulantes as $postulante )
                            <tr>
                            <th> {{$postulante->persona->codigoSIS}} </th>
                            <th> {{$postulante->item_nombre}} </th>
                            <th> {{$postulante->nota_meritos}} </th>
                            <th> {{$postulante->nota_conocimientos}} </th>
                            <th> {{$postulante->nota_final}} </th>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    </p>
                    <p class="card-text "> <a href="{{ route('inicio')}}" class="btn  btn-info "> Atras</a> </p>
                </div>
	</section>
    </div>
@endsection