@extends('admin.layout')

@section('header')
		<h1>
				Panel principal de Roles
				<small>descripcion opcional</small>
		
		</h1>

		<ol class="breadcrumb">

			<li><a href="#"><i class="fa fa-dashboard"></i> level</a></li>
			<li class="active"> roles</li>
		
		</ol>

@stop

@section('content')

<div class="row">

            <div class="col-md-4">
             </div>

             <div class="col-md-4">
                    <div class="box">
                         <div class="box-header">
                                 <h3 class="box-title"> roles del sistema</h3>
                         </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            @foreach ($roles as $role)

                                <h1>{{ $role->name }}  </h1> <hr>


                            @endforeach 
                        </div>
                    </div>
              </div>

            <div class="col-md-4">
             </div>
</div>

@stop