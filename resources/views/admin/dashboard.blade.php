@extends('admin.layout')

@section('header')
		<h1>
				Panel principal de concursos 
				<small>descripcion opcional</small>
		
		</h1>

		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> level</a></li>
			<li class="active"> Dashboard</li>
		
		</ol>

@stop
@section('content')
	
	<p>Usuario autenticado: {{ auth()->user()->name }}</p>
@endsection