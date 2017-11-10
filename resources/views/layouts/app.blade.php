<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Reciclando Mexico')</title>

    <!-- Styles -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse ">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app-menu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Reciclando Mexico
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-menu">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="active"><a href="{{ route('login') }}">Login <span class="glyphicon glyphicon-log-in"></span></a></li>
                            <li><a href="{{ route('register') }}">Register <span class="glyphicon glyphicon-list"></span></a></li>
                        @else
                            <li><a href="#">{{ Auth::user()->name }} <span class="glyphicon glyphicon-user"></span></a></li>
                            <li><a href="{{ route('reg.index') }}">Registros <span class="glyphicon glyphicon-list"></span></a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                    <span class="glyphicon glyphicon-log-out"></span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @include('flash::message') <!--Agregamos el mensaje de flash-->
        @yield('content') <!--indicamos que sedera la vista o el contenido de -->
    </div>

    <div class="navbar-fixed-bottom">
        Manuel Develop
    </div>
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
</html>
