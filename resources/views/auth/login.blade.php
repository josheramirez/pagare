<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pagare</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/login/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/login/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/login/css/form-elements.css">
        <link rel="stylesheet" href="assets/login/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/login/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/login/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/login/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/login/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>SISTEMA DE PAGARE</strong></h1>
                            <div class="description">
                            	<p>
                                    Hospital Regional de Copiapó
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Inicie sesión</h3>
                            		<p>Ingrese su nombre de usuario y contraseña para iniciar sesión:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" method="POST" action="{{ url('/login') }}" class="login-form">
                                    {{ csrf_field() }}
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" placeholder="Usuario..." value="{{ old('username') }}" class="form-username form-control" id="form-username" autofocus>
                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                        @endif
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Contraseña..." class="form-password form-control" id="form-password" autocomplete="off">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
			                        </div>
			                        <button type="submit" class="btn">Iniciar Sesión!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/login/js/jquery-1.11.1.min.js"></script>
        <script src="assets/login/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/login/js/jquery.backstretch.min.js"></script>
        {{--<script src="assets/login/js/scripts.js"></script>--}}
        <script src="{{asset('assets/login/js/scripts.js')}}"></script>

        <!--[if lt IE 10]>
            <script src="assets/login/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>