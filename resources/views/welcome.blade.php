<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Scrabble - DIW</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="css/home.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="wrapper">
            <header class="header title">Scrabble. Home</header>
            <aside class="sidebar">
                <ul>
                    <li class="input-menu"><a>Registro</a></li>
                    <li class="input-menu upper-margin"><a>Login</a></li>
                    <li class="input-menu" id="b01"><a>Login (user1)</a></li>
                    <li class="input-menu" id="b02"><a>Login (user2)</a></li>
                    <li class="input-menu" id="b03"><a>Login erroneo</a></li>
                    <li class="input-menu upper-margin" id="b04"><a>Dashboard</a></li>
                    <li class="input-menu upper-margin" id="b05"><a>Estadísticas usuarios</a></li>
                    <li class="input-menu" id="b06"><a>Últimas partidas en juego</a></li>
                </ul>
            </aside>
            <div class="content">
                <div class="card--result">
                    <div class="info number">1</div>
                    <div class="info text">Registro</div>
                </div>
                <div class="card--result">
                    <div class="info number">2</div>
                    <div class="info text">Login user1</div>
                </div>
                <div class="card--result">
                    <div class="info number">3</div>
                    <div class="info text">Login user2</div>
                </div>
                <div class="card--result">
                    <div class="info number">4</div>
                    <div class="info text">Dashboard</div>
                </div>
                <div class="card--result">
                    <div class="info number">5</div>
                    <div class="info text">Estadísticas usuarios</div>
                </div>
            </div>
        </div>
<!--
    
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
        </div>
-->
    </body>
</html>
