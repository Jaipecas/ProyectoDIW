@extends('layouts.app',
['title' => 'Info Imprenta', 'css_files' => [],
'js_files' => []])

@section('header') 
        <div class="media">
            {{-- logo ceed --}}
            <div class="media-left">
                <img class="img-fluid" src="../img/logoceed.png" alt="logoCeed" class="media-object">
            </div>
            {{-- header se oculta al reducir pantalla --}}
            <div class="media-body d-none d-md-block">
                <h4 class="media-heading">Centre específic d'educació a distància de la Comunitat Valenciana</h4>
                <p>550 aniversario del fallecimiento de Johannes Gutenberg</p>
            </div>
            {{-- acceso login --}}
            <div class="media-right">
                <a href="#"><img src="../img/ola.jpg" alt="accesoLogin"></a>
            </div>
        </div>
@endsection

@section('navbar')
    {{-- navbar-expand-md indica el tamaño a parti del cual se expande --}}
    <nav class="navbar navbar-expand-md" data-spy="affix" data-offset-top="20">
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
            {{-- listado MIRAR EL EJEMPLO DEL ALFREDO PARA AÑADIR COSAS --}}
            <ol class="carousel-indicators">
                <li data-target="#carouselImprenta" data-slide-to="0" class="active"></li>
                <li data-target="#carouselImprenta" data-slide-to="1"></li>
                <li data-target="#carouselImprenta" data-slide-to="2"></li>
            </ol>
            {{-- imagenes --}}
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
            {{-- botones --}}
            <a class="carousel-control-prev" href="#carouselImprenta" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carouselImprenta" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>

        </div>
    </div>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
        Odio, voluptate. Veniam, iusto deserunt. Totam voluptas ipsa vitae, reprehenderit repudiandae commodi inventore,
        architecto nesciunt laudantium enim iure, numquam molestiae accusamus maiores!</p>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
        Odio, voluptate. Veniam, iusto deserunt. Totam voluptas ipsa vitae, reprehenderit repudiandae commodi inventore,
        architecto nesciunt laudantium enim iure, numquam molestiae accusamus maiores!</p>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
        Odio, voluptate. Veniam, iusto deserunt. Totam voluptas ipsa vitae, reprehenderit repudiandae commodi inventore,
        architecto nesciunt laudantium enim iure, numquam molestiae accusamus maiores!</p>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
        Odio, voluptate. Veniam, iusto deserunt. Totam voluptas ipsa vitae, reprehenderit repudiandae commodi inventore,
        architecto nesciunt laudantium enim iure, numquam molestiae accusamus maiores!</p>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
        Odio, voluptate. Veniam, iusto deserunt. Totam voluptas ipsa vitae, reprehenderit repudiandae commodi inventore,
        architecto nesciunt laudantium enim iure, numquam molestiae accusamus maiores!</p>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
        Odio, voluptate. Veniam, iusto deserunt. Totam voluptas ipsa vitae, reprehenderit repudiandae commodi inventore,
        architecto nesciunt laudantium enim iure, numquam molestiae accusamus maiores!</p>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
        Odio, voluptate. Veniam, iusto deserunt. Totam voluptas ipsa vitae, reprehenderit repudiandae commodi inventore,
        architecto nesciunt laudantium enim iure, numquam molestiae accusamus maiores!</p>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
        Odio, voluptate. Veniam, iusto deserunt. Totam voluptas ipsa vitae, reprehenderit repudiandae commodi inventore,
        architecto nesciunt laudantium enim iure, numquam molestiae accusamus maiores!</p>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
        Odio, voluptate. Veniam, iusto deserunt. Totam voluptas ipsa vitae, reprehenderit repudiandae commodi inventore,
        architecto nesciunt laudantium enim iure, numquam molestiae accusamus maiores!</p>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
        Odio, voluptate. Veniam, iusto deserunt. Totam voluptas ipsa vitae, reprehenderit repudiandae commodi inventore,
        architecto nesciunt laudantium enim iure, numquam molestiae accusamus maiores!</p>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
        Odio, voluptate. Veniam, iusto deserunt. Totam voluptas ipsa vitae, reprehenderit repudiandae commodi inventore,
        architecto nesciunt laudantium enim iure, numquam molestiae accusamus maiores!</p>

    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
        Odio, voluptate. Veniam, iusto deserunt. Totam voluptas ipsa vitae, reprehenderit repudiandae commodi inventore,
        architecto nesciunt laudantium enim iure, numquam molestiae accusamus maiores!</p>

@endsection
