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
        <div class="wrapper" id="app">
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
            <card-container-component :cards="cards"></card-container-component> 
        </div>
    </body>
    <script src="js/app.js"></script>
</html>
