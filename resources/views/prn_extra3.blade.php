@extends('layouts.app',
['title' => 'Info Imprenta', 'css_files' => [],
'js_files' => []])

@section('styles')
<link href="{{ asset('css/primerosLibros.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 mt-3">
                <h2>Los primeros libros en España</h2>
                <p>El primer libro impreso en España fue el El sinodal de Aguilafuente en 1472 en
                    Segovia. Por su parte, los tres primeros impresos en València con el procedimiento de
                    Gutenberg fueron:</p>

                    <div id="carouselPrimerosLibros" class="carousel slide" data-ride="carousel">
                        <!--Indicadores-->
                        <ol class="carousel-indicators">
                            <li data-target="#carouselPrimerosLibros" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselPrimerosLibros" data-slide-to="1"></li>
                            <li data-target="#carouselPrimerosLibros" data-slide-to="2"></li>
                        </ol>
                        <!-- imagenes -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="../img/12 les trobes.jpg" alt="First slide">
                                <div class="carousel-caption">
                                    <h3>1474</h3>
                                    <p>Obres o trobes en laors de la Verge Maria</p>
                                  </div> 
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../img/13 el comprensorium.jpg" alt="Second slide">
                                <div class="carousel-caption">
                                    <h3>1475</h3>
                                    <p>Comprehensorium</p>
                                  </div> 
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../img/14 valencian bible.jpg" alt="Third slide">
                                <div class="carousel-caption">
                                    <h3>1478</h3>
                                    <p>Biblia valenciana</p>
                                  </div> 
                            </div>
                        </div>
                        <!-- botones -->
                        <a class="carousel-control-prev" href="#carouselPrimerosLibros" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#carouselPrimerosLibros" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </a>
    
                    </div>

            </div>
            <div class="col-lg-3 col-md-12">
                @include('alerts')
                @include('news')
            </div>
        @endsection
