<!DOCTYPE html>
<!-- obtiene de la configuracion (app.php) el idioma por defecto -->
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token para evitar ataques de petición de sitios cruzados -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Obtiene del fichero /config/app.php la variable name, en caso contrario
         usa Laravel. Lo une con el valor de la variable title que se le pasa desde 
         el template, con la directiva extends -->
    <title>{{ config('app.name', 'Laravel') . '. ' }} {{ $title or '' }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Carga los estilos css -->
    <!-- Estilos generales como los de bootstrap -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Estilos especificos -->
    @foreach ($css_files as $file)
        <link href="{{ asset('css/' . $file . '.css') }}" rel="stylesheet">
    @endforeach


    <!-- Mis archivos css -->
    <!--CSS principal-->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!--CSS específicos de cada vista-->
    @yield('styles')
</head>

<body>
    <div id="app">
        @include('header')
        @include('navbar')
        @yield('content')
        @include('footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @foreach ($js_files as $file)
        <script src="{{ asset('js/' . $file . '.js') }}"></script>
    @endforeach

    @yield('internal_script')
</body>

</html>
