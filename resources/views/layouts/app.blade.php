<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title','Reciclando Mexico')</title>
        <!--Cargamos bootstrap-->
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
        <style type="text/css">
            body{
                width: 95%;
                padding-left: 2.5%;
            }
        </style>
    </head>
    <body>

        <div class="content">
            @yield('contenido')
        </div>


        <script type="text/javascript" src"{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
        <script type="text/javascript" src"{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
</html>
