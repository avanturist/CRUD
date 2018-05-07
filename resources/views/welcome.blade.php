<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">


    </head>
    <body>
        <div class="container" style="margin-top: 15%">
            <div class="panel panel-primary">
                <div class="panel-heading">CRUD</div>
                <div class="panel-body">
                    В даному проекті реалізовано редагування контенту через
                    Адмін.панель за допомогою Vue.js на базі Laravel 5.5
                </div>
            </div>

            <div class="icon-bar">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                        <a href="{{ url('/admin') }}">Admin</a>
                        @else
                            <a href="{{ route('login') }}" class="active">Login</a>
                            <a href="{{ route('register') }}">Register</a>
                            @endauth
                    </div>
                @endif
            </div>

        </div>


    </body>
</html>
