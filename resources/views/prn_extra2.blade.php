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
                <div class="row">
                    {{-- cuadro, engranaje (fondo), palanca --}}
                    <div class="col-md-12 col-lg-6 container-left">
                        <div class="d-flex justify-content-center">
                            <div class="img-frame">
                                <img class="element-absolute visible-img" src="../img/08b Trabajadores imprenta 1.png"
                                    alt="">
                                <img class="element-absolute" src="../img/10b Trabajadores imprenta 3.jpg" alt="">
                                <img class="element-absolute" src="../img/09b Trabajadores imprenta 2 recortada.jpg" alt="">
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <img id="engranaje" class="img-engranaje" src="../img/engranaje.png" alt="">
                        </div>

                        {{-- palanca --}}
                        <div class="d-flex justify-content-center">
                            <div class="palanca">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    style="isolation:isolate" viewBox="0 0 223 76" width="223pt" height="76pt">
                                    <defs>
                                        <clipPath id="_clipPath_oYcDYCSjipiPo3fnv6eZ8FRtI34k07rN">
                                            <rect width="223" height="76" />
                                        </clipPath>
                                    </defs>
                                    <g class="pointer" clip-path="url(#_clipPath_oYcDYCSjipiPo3fnv6eZ8FRtI34k07rN)">
                                        <line x1="81.98" y1="37.817" x2="201.004" y2="38.061"
                                            vector-effect="non-scaling-stroke" stroke-width="30" stroke="rgb(187,127,75)"
                                            stroke-linejoin="miter" stroke-linecap="round" stroke-miterlimit="3" />
                                        <line x1="81.98" y1="37.817" x2="117.004" y2="37.889"
                                            vector-effect="non-scaling-stroke" stroke-width="30" stroke="rgb(93,93,93)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3" />
                                        <line x1="83.019" y1="30.569" x2="117.019" y2="30.639"
                                            vector-effect="non-scaling-stroke" stroke-width="3" stroke="rgb(139,139,139)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3" />
                                        <line x1="78.984" y1="35.811" x2="123.008" y2="35.901"
                                            vector-effect="non-scaling-stroke" stroke-width="3" stroke="rgb(139,139,139)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3" />
                                        <path
                                            d=" M 8.004 37.666 C 8.041 19.591 23.022 4.946 41.437 4.984 C 59.852 5.022 74.773 19.727 74.736 37.802 C 74.699 55.878 59.718 70.522 41.303 70.484 C 22.888 70.446 7.967 55.741 8.004 37.666 Z "
                                            fill="rgb(153,94,42)" />
                                        <path
                                            d=" M 30.248 37.711 C 30.262 31.138 35.256 25.812 41.394 25.825 C 47.533 25.838 52.505 31.184 52.492 37.757 C 52.479 44.33 47.484 49.656 41.346 49.643 C 35.207 49.631 30.235 44.284 30.248 37.711 Z "
                                            fill="rgb(203,139,84)" />
                                        <line x1="142.015" y1="32.69" x2="192.015" y2="32.792"
                                            vector-effect="non-scaling-stroke" stroke-width="5" stroke="rgb(166,112,65)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3" />
                                    </g>
                                </svg>
                            </div>
                        </div>

                    </div>

                    {{-- información trabajo imprenta --}}
                    <div class="col-lg-6 d-flex justify-content-center">
                        <div class="container-page">
                            <div class="page visible-page">
                                <h4>El componedor</h4>
                                <p>Realiza el trabajo más delicado. A medida que lee el manuscrito coloca en
                                    una cajita, una a una, todas las piezas de metal con letras y espacios que
                                    forman una línea. Debe hacerlo en orden inverso. Y cajita a cajita,
                                    confecciona toda una página.Eran operarios especializados.
                                    <br><br>
                                    Era fundamental que supieran
                                    leer y escribir y tuvieran nociones de gramática y ortografía, valorándose más a los que
                                    tenían una base cultural básica en aritmética, geografía y dibujo. Ellos eran los que se
                                    encargaban de componer el texto original usando tipos móviles. El trabajo en sí era
                                    sencillo. Tras leer un fragmento del texto y retenerlo en su memoria, cogían los tipos
                                    uno a uno de la caja y los colocaban en el componedor. De esta forma completaban las
                                    palabras y las frases del texto original.
                                </p>
                            </div>
                            <div class="page">
                                <h4>El tirador</h4>
                                <p>Coloca papel sobre la superficie de letras entintadas y acciona la palanca
                                    que hace bajar la prensa sobre los tipos metálicos que colocó el
                                    componedor, de manera que quedan marcadas en el papel.
                                    <br><br>
                                    Para estos trabajos no era tan importante la formación
                                    intelectual del trabajador como su desarrollo muscular, pues eran unas tareas rudas que
                                    dependían de la fuerza física. Podría darse el caso que estos roles se cambiaran durante
                                    el día para hacer el trabajo más llevadero.
                                </p>
                            </div>
                            <div class="page">
                                <h4>El entintador</h4>
                                <p>Encargado de entintar la superficie de letras que ha elaborado el
                                    componedor. Par ello utiliza dos tampones semiesféricos impregnados de
                                    tinta, uno en cada mano.
                                    <br><br>
                                    Las entintaba en el tintero, repartiendo bien la tinta sobre su superficie mediante un
                                    movimiento continuado para depositar una fina capa de tinta sobre los tipos metálicos.
                                    Este proceso era necesario para la impresión de cada pliego. Como nota escatológica,
                                    para soltar la lana con la que estaban rellenas las balas y que no se apelmazaran, el
                                    batidor vertía sobre la misma su propia orina.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4 ">
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

<script src="{{ asset('js/palancaAnimation.js') }}"></script>
