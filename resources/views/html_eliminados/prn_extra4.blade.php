@extends('layouts.app',
['title' => 'Info Imprenta', 'css_files' => [],
'js_files' => []])

@section('styles')
    <link href="{{ asset('css/imprentaValenciana.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 mt-3">
                <h2>Lugares emblemáticos de la imprenta valenciana</h2>

                <!-- cartas con los diferentes lugares de valencia-->
                <div class="card-deck my-4">
                    <div class="card">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <img class="card-img-top" src="../img/15 Valencia.Mercado_Central.jpg"
                                    alt="Molí de Rovella">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">El Molí de Rovella</h5>
                                    <p class="card-text text-justify">En la confluencia de las actuales calles Barón de
                                        Cárcer y Pie de la Cruz
                                        estuvo ubicada la primera imprenta en València.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-deck my-4">
                    <div class="card">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <img class="card-img-top" src="../img/16 El Puig Monasterio.jpg"
                                    alt="Monasterio de Santa María del Puig">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">Monasterio de Santa María del Puig</h5>
                                    <p class="card-text text-justify">Junto al Portal de la Valladigna se situaron los
                                        talleres de imprenta de
                                        donde salieron: “Trobes en loors de la Verge María” “Comprehensorium”
                                        “Biblia valenciana”.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-deck my-4">
                    <div class="card">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <img class="card-img-top" src="../img/17 portal valldigna 1.jpg"
                                    alt="Monasterio de Santa María del Puig">
                            </div>
                            <div class="col-md-3">
                                <img class="card-img-top" src="../img/17 portal valldigna 2.jpg"
                                    alt="Monasterio de Santa María del Puig">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">Imprenta de Palmart</h5>
                                    <p class="card-text text-justify">Alberga el Museo de la Imprenta y contiene una réplica
                                        exacta de la
                                        imprenta utilizada Gutenberg y que se conserva en Maguncia (Alemania).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-deck my-4">
                    <div class="card">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <img class="card-img-top" src="../img/19b calle san vicente Patricio May.png"
                                    alt="Monasterio de Santa María del Puig">
                            </div>
                            <div class="col-md-3">
                                <img class="card-img-top" src="../img/19 calle san vicente patricio mey 2.jpg"
                                    alt="Monasterio de Santa María del Puig">
                            </div>
                            <div class="col-md-6 align-items-center">
                                <div class="card-body">
                                    <h5 class="card-title">Imprenta de Patricio Mey</h5>
                                    <p class="card-text text-justify">En el número 3 de la calle San Vicente se imprimió la
                                        segunda edición de
                                        “Don Quijote de la Mancha”.</p>
                                </div>
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
