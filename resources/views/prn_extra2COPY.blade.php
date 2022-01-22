@extends('layouts.app',
['title' => 'Info Imprenta', 'css_files' => [],
'js_files' => []])

@section('styles')
    <link href="{{ asset('css/trabajosImprenta.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 mt-3">
                <h2>Trabajos imprenta</h2>
                <div class="card-deck mt-3">
                    <div class="card">
                        <img class="card-img-top" src="../img/08b Trabajadores imprenta 1.png" alt="componedor">
                        <div class="card-body">
                            <h5 class="card-title">El componedor</h5>
                            <p class="card-text text-justify">Realiza el trabajo más delicado. A medida que lee el manuscrito
                                coloca
                                en
                                una cajita, una a una, todas las piezas de metal con letras y espacios que
                                forman una línea. Debe hacerlo en orden inverso. Y cajita a cajita,
                                confecciona toda una página.</p>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="../img/10b Trabajadores imprenta 3.jpg" alt="tirador">
                        <div class="card-body">
                            <h5 class="card-title">El tirador</h5>
                            <p class="card-text text-justify">Coloca papel sobre la superficie de letras entintadas y
                                acciona la
                                palanca
                                que hace bajar la prensa sobre los tipos metálicos que colocó el
                                componedor, de manera que quedan marcadas en el papel.</p>
                        </div>
                    </div>
                </div>

                <div class="card-deck my-3">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="card-img-top" src="../img/09b Trabajadores imprenta 2.jpg" alt="encintador">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">El encintador</h5>
                                    <p class="card-text text-justify">Encargado de entintar la superficie de letras que ha
                                        elaborado
                                        el
                                        componedor. Par ello utiliza dos tampones semiesféricos impregnados de
                                        tinta, uno en cada mano.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-4">
                    <h2>Videos</h2>
                    <p>Se puede ver más información del proceso en estos vídeos:</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe
                                    src="https://www.youtube.com/embed/YNm048hspj8?list=PLrNbQvWH2Mf-GVnLOcL9H04IzqmP1GEBQ"
                                    title="Video International Printing Museum Tour" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe src="https://www.youtube.com/embed/M2SanMKYdKk"
                                    title="Video proceso de impresión con prensa" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                @include('alerts')
                @include('news')
            </div>
        </div>
    </div>
@endsection
