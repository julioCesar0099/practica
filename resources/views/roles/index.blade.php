@extends('layouts.app')

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