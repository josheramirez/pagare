<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('styles')
</head>
<body>
<div id="app">
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark mb-4">
        <div class="container">
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{-- config('app.name', 'Home') --}}
            </a>

            <!-- Collapsed Hamburger -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @can('digitador')
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('digitador.index') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('pagare.deudor-deuda.store') }}">Pagare <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/reportes') }}">Reportes <span class="sr-only">(current)</span></a>
                        </li>
                    @endcan
                    @can('supervisor')
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('supervisor.index') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('supervisor.pagare.deudor-deuda.create') }}">Pagare <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/reportes') }}">Reportes <span class="sr-only">(current)</span></a>
                        </li>
                    @endcan
                    @can('administrador')
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('administrador.users.index') }}">Usuarios <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('administrador.servicios.index') }}">Servicios <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('administrador.previsiones.index') }}">Prevision <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('administrador.logs.index') }}">Log <span class="sr-only">(current)</span></a>
                        </li>
                    @endcan
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"
                               id="navbarDropdownMenuLink" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->full_nombre }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @can('digitador')
                                <a class="dropdown-item" href="{{ route('digitador.configuracion.index') }}">Cambiar contraseña</a>
                                <div class="dropdown-divider"></div>
                                @endcan
                                @can('supervisor')
                                    <a class="dropdown-item" href="{{ route('supervisor.configuracion.index') }}">Cambiar contraseña</a>
                                    <div class="dropdown-divider"></div>
                                @endcan
                                @can('administrador')
                                    <a class="dropdown-item" href="{{ route('administrador.configuracion.index') }}">Cambiar contraseña</a>
                                    <div class="dropdown-divider"></div>
                                @endcan
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/fontawesome/solid.js')}}"></script>
<script src="{{asset('js/fontawesome/fontawesome.js')}}"></script>
@yield('scripts')
</body>
</html>
