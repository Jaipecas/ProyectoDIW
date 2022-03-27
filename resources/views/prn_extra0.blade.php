@extends('layouts.app',
['title' => 'Info Imprenta', 'css_files' => [],
'js_files' => []])

@section('styles')
    <link href="{{ asset('css/gutenberg.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 mt-3">
                {{-- Biografia --}}
                <img class="img-fluid retratoguten mr-4" src="../img/01 Gutenberg.jpg" alt="retrato Gutenberg">
                <div>
                    <h2>Biografía</h2>
                    <p>
                        Gutenberg nació en Maguncia, Alemania
                        alrededor de 1400 en la casa paterna llamada
                        zum Gutenberg. Su apellido verdadero es
                        Gensfleisch (en dialecto alemán renano este
                        apellido tiene semejanza, si es que no significa,
                        «carne de ganso», por lo que el inventor de la
                        imprenta en Occidente prefirió usar el apellido
                        por el cual es conocido). Hijo del comerciante
                        Federico
                        Gensfleisch,
                        que
                        adoptaría
                        posteriormente hacia 1410 el apellido zum
                        Gutenberg, y de Else Wyrich, hija de un
                        tendero.
                        Conocedor del arte de la fundición del oro, se
                        destacó como herrero para el obispado de su
                        ciudad. La familia se trasladó a Eltville am
                        Rhein, ahora en el Estado de Hesse, donde Else
                        había heredado una finca. Debió haber
                        estudiado en la Universidad de Erfurt, en donde está registrado en 1419 el
                        nombre de Johannes de Alta Villa (Eltvilla). Ese año murió su padre. Nada más se
                        conoce de Gutenberg hasta que en 1434 residió como platero en Estrasburgo,
                        donde cinco años después se vio envuelto en un proceso, que demuestra de
                        forma indudable, que Gutenberg había formado una sociedad con Hanz Riffe
                        para desarrollar ciertos procedimientos secretos. En 1438 entraron como
                        asociados Andrés Heilman y Andreas Dritzehen (sus herederos fueron los
                        reclamantes) y en el expediente judicial se mencionan los términos de prensa,
                        formas e impresión.
                        De regreso a Maguncia, formó una nueva sociedad con Johann Fust, quien le da
                        un préstamo con el que, en 1449, publicó el Misal de Constanza, primer libro
                        tipográfico del mundo occidental. Recientes publicaciones, en cambio, aseguran
                        que este misal no pudo imprimirse antes de 1473 debido a la confección de su
                        papel, por lo que no debió ser obra de Gutenberg. En 1452, Gutenberg da
                        comienzo a la edición de la Biblia de 42 líneas (también conocida como Biblia de
                        Gutenberg). En 1455, Gutenberg carecía de solvencia económica para devolver
                        el préstamo que le había concedido Fust, por lo que se disolvió la unión y
                        Gutenberg se vio en la penuria (incluso tuvo que difundir el secreto de montar
                        imprentas para poder subsistir).
                        Johannes Gutenberg murió arruinado en Maguncia, Alemania el 3 de febrero de
                        1468. A pesar de la oscuridad de sus últimos años de vida, siempre será
                        reconocido como el inventor de la imprenta moderna.
                    </p>
                </div>

                {{-- que invento timeline --}}
                <div>
                    <h2>¿Qué es lo que inventó?</h2>
                    <p>El nombre de Gutenberg lo asociamos a la invención de la imprenta, pero
                        mucho antes que él ya se imprimía sobre pergamino o papel. Un breve recorrido
                        histórico nos indica que:</p>


                    <div class="row my-1">
                        <div class="col-md-5 rules-game">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="pr-4">2000 años antes de Gutenberg, en Roma se imprimían carteles
                                        con
                                        signos
                                        grabados en arcilla.</p>
                                    <img src="../img/regla1.1.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 div-timeline">
                            <div class="line-time line-time-orange line-time-margin-left"></div>
                            <div class="my-1">
                                <button id="button-time" class="button-margin-left line-time-orange">Click</button>
                            </div>
                            <div class="line-time line-time-orange line-time-margin-left"></div>
                        </div>
                    </div>

                    <div class="row my-1">
                        <div class="col-md-7 div-timeline div-timeline-right">

                            <div class="line-time line-time-red line-time-margin-right"></div>
                            <div class="my-1">
                                <button id="button-time line-time-red" class="button-margin-right line-time-red">Click</button>
                            </div>
                            <div class="line-time line-time-red line-time-margin-right"></div>

                        </div>
                        <div class="col-md-5 rules-game">
                            <div class="row">
                                <div class="col-lg-7 col-md-12">
                                    <p class="pr-4">2000 años antes de Gutenberg, en Roma se imprimían carteles
                                        con signos
                                        grabados en arcilla.</p>
                                    <img src="../img/regla1.1.jpg" alt="regla juego 1">
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row my-1">
                        <div class="col-md-5 rules-game">
                            <div class="row">
                                <div class="col-lg-7 col-md-12">
                                    <p class="pr-4">2000 años antes de Gutenberg, en Roma se imprimían carteles
                                        con signos
                                        grabados en arcilla.</p>
                                    <img src="../img/regla1.1.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 div-timeline">
                            <div class="line-time line-time-blue line-time-margin-left"></div>
                            <div class="my-1">
                                <button id="button-time" class="button-margin-left line-time-blue">Click</button>
                            </div>
                            <div class="line-time line-time-blue line-time-margin-left"></div>
                        </div>
                    </div>
                </div>



                {{-- <div class="row">
                    <div class="col-md-6">
                        <img class="img-fluid" src="../img/02 Sutra del diamante.png" alt="Sutra de diamante">
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid" src="../img/03 Tipos chinos en madera.jpg" alt="Tipos chinos de madera">
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <img class="img-fluid" src="../img/04 Fundidor de tipos de Gutenberg.png"
                            alt="Fundidor de tipos">
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid" src="../img/05 tipos moviles metal gutenberg.jpg"
                            alt="Tipos móviles metal">
                    </div>

                </div> --}}

                <div>
                    <p class="mt-3">
                        Pero los moldes de madera tenían un problema: pronto se desgastaban y se
                        echaban a perder. La gran idea de Gutenberg fue moldear piezas de metal para
                        cada letra, creando de tipos de letras de metal individuales para la imprenta.
                        Después sólo quedaba componer en una cajita, letra a letra, el texto que se
                        quería imprimir, cajita que se manchaba con unos tampones entintados.
                    </p>
                    <img class="img-fluid" src="../img/06 tipos moviles metal gutenberg.jpg" alt="Tipos móviles metal">
                </div>

                <div>
                    <p>
                        Finalmente, sobre las letras metálicas entintadas se colocaba el papel y se
                        presionaba con un aparato así:
                    </p>

                    <img class="img-fluid" src="../img/07 Prensa_de_Gutenberg Replica.png" alt="Tipos móviles metal">
                </div>

                <div class="my-3">
                    <h2>En resumen...</h2>
                    <p>Gutenberg confeccionó un abecedario con letras y signos de
                        plomo. Su idea fue eficaz porque la perfeccionó con:</p>
                    <ul>
                        <li>Letras móviles</li>
                        <li>Molde de metal</li>
                        <li>Fundidor de tipos o aparato de fundición manual</li>
                        <li>Aleación especial de metales para fabricar los móviles (plomo, antimonio
                            y bismuto)</li>
                        <li>Prensa de madera anclada al suelo y al techo</li>
                        <li>Tinta de imprimir en un determinado papel</li>
                    </ul>
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
