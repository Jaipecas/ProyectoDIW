@extends('layouts.app',
['title' => 'Info Imprenta', 'css_files' => [],
'js_files' => []])

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- Contenedor principal -->
            <div class="col-lg-9 col-md-8 my-3">
                <div class="jumbotron">
                    <div class="container">
                        <h2>Bienvenidos,</h2>
                        <p>El instituto CEED, a través del Departamento de Castellano, quiere conmemorar el 550 aniversario
                            del
                            fallecimiento de Johannes Gutenberg, el inventor de la
                            imprenta. En esta web encontrá una gran cantidad de información acerca de Johannes Gutenberg,
                            así
                            como la
                            posibilidad de jugar al Scrabble con palabras
                            cuya temática es la invención de la imprenta.</p>
                        <p class="lead">
                            <a class="btn btn-primary btn-md" href="#" role="button">Scrabble</a>
                        </p>
                    </div>
                </div>

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
                            <img class="img-fluid d-block w-100" src="../img/ola.jpg" alt="First slide">
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
            <!--Avisos y Noticias-->
            <div class="col-lg-3 col-md-4">
                @include('alerts')
                @include('news')            
            </div>
        </div>
    </div>
@endsection

