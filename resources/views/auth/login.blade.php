 @extends('layouts.app')


 @section('content')
    <div class='row'> 
        <div class='col-md-4 col-md-offset-4'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h1 class='panel-title'>Iniciar Sesión</h1>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('login')}}">
                         {{ csrf_field()}}
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                            <label for="email">Email</label>
                            <input class="form-control" 
                            type="email" 
                            name="email" 
                            value="{{old('email')}}"
                            placeholder="ingresa tu email">
                            {!! $errors->first('email','<span class="help-block">:message</span>')!!}
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                            <label for="password">contraseña</label>
                            <input class="form-control" 
                            type="password" 
                            name="password"
                            placeholder="ingresa tu contraseña">
                            {!! $errors->first('password','<span class="help-block">:message</span>')!!}
                        </div>
                        <button class="btn btn-block btn-primary"> Acceder</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 @endsection