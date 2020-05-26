<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>{{ config('app.name') }} | Log in</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="adminlte/bower_components/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="adminlte/bower_components/Ionicons/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="adminlte/css/AdminLTE.min.css">
		<link rel="stylesheet" href="adminlte/css/skins/skin-blue.min.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="/adminlte/plugins/iCheck/square/blue.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="/">{{ config('app.name') }}</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>

			<form role="form" method="POST" action="{{ route('login') }}">
				{{csrf_field()}}

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                     <input class="form-control" 
                            type="email" 
                            name="email" 
                            value="{{old('email')}}"
                            placeholder="ingresa tu email"
                            required autofocus>
					{!! $errors->first('email', '<div class="text-danger">:message</div>') !!}
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                     <input class="form-control" 
                            type="password" 
                            name="password"
                            placeholder="ingresa tu contraseña"
                            required>
					{!! $errors->first('password', '<div class="text-danger">:message</div>') !!}
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<div class="checkbox icheck">
							<label>
								<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuérdame
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

			{{-- <div class="social-auth-links text-center">
				<p>- OR -</p>
				<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
					Facebook</a>
				<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
					Google+</a>
			</div> --}}
			<!-- /.social-auth-links -->

			<a href="{{ url('/password/reset') }}">Reestablecer contraseña</a><br>
			{{-- <a href="register.html" class="text-center">Register a new membership</a> --}}

		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 3 -->
	<script src="adminlte/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- AdminLTE App -->
	<script src="adminlte/js/adminlte.min.js"></script>
	<!-- iCheck -->
	<script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			});
		});
	</script>
	</body>
</html>
      

  