@extends('layouts.app',
['title' => 'Info Imprenta', 'css_files' => ['test_welcome'],
'js_files' => []])


@section('navbar')
    {{-- navbar-expand-md indica el tamaño a parti del cual se expande --}}
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
            {{-- button responsive --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarImprenta">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarImprenta">
                {{-- imagen navbar --}}
                <a class="navbar-brand" href="#">
                    <img src="../img/ola.jpg" width="30" height="30" alt="">
                </a>
                {{-- listado --}}
                <ul class="navbar-nav">
                    <li class="nav-item active"><a class="nav-link" href="#">Gutenberg</a></li>
                    <li class="nav-item active"><a class="nav-link" href="#">Disfusión imprenta</a></li>
                    <li class="nav-item active"><a class="nav-link" href="#">Trabajos imprenta</a></li>
                    <li class="nav-item active"><a class="nav-link" href="#">Primeros libros</a></li>
                    <li class="nav-item active"><a class="nav-link" href="#">Imprenta valenciana</a></li>

                </ul>
            </div>
            <a class="navbar-brand" href="#">
                <img src="../img/ola.jpg" width="30" height="30" alt="">
            </a>
        </div>
    </nav>

    {{-- <div class="printer printer2"><a href="./difusion-imprenta">Difusión imprenta</a></div>
    <div class="printer printer3"><a href="./trabajos-imprenta">Trabajos imprenta</a></div>
    <div class="printer printer4"><a href="./primeros-libros">Primeros libros</a></div>
    <div class="printer printer5"><a href="./imprenta-valenciana">Imprenta valenciana</a></div>
    <div class="scrabble"><a href="./scrabble">Scrabble. Info</a></div>
    <div class="login"><a href="./scrabble/login">Login</a></div>
    <div class="register"><a href="./scrabble/register">Registro</a></div> --}}
@endsection

@section('content')
    <div class="container">
        <div id="carouselImprenta" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselImprenta" data-slide-to="0" class="active"></li>
                <li data-target="#carouselImprenta" data-slide-to="1"></li>
                <li data-target="#carouselImprenta" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../img/ola.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../img/ola.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../img/ola.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselImprenta" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carouselImprenta" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>

@endsection
