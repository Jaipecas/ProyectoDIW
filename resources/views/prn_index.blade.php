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
                <img class="img-fluid img-gutenberg mr-4" src="../img/01 Gutenberg.jpg" alt="retrato Gutenberg">
                <div>
                    <h2>Biografía</h2>
                    <div>
                        <p class="gradient-text">
                            Gutenberg nació en <strong><a
                                    href="https://es.wikipedia.org/wiki/Maguncia">Maguncia</a></strong>,
                            Alemania
                            alrededor de 1400 en la casa paterna llamada
                            zum Gutenberg. Su apellido verdadero es Gensfleisch (en dialecto alemán renano este
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
                            tendero. <br><br>

                            Conocedor del arte de la fundición del oro, se
                            destacó como herrero para el obispado de su
                            ciudad. La familia se trasladó a Eltville am
                            Rhein, ahora en el <strong><a href="https://es.wikipedia.org/wiki/Hesse">Estado de
                                    Hesse</a></strong>, donde Else
                            había heredado una finca. Debió haber
                            estudiado en la <strong><a
                                    href="https://es.wikipedia.org/wiki/Universidad_de_Erfurt">Universidad de
                                    Erfurt</a></strong>
                            , en donde está registrado en 1419 el
                            nombre de Johannes de Alta Villa (Eltvilla). Ese año murió su padre. Nada más se
                            conoce de Gutenberg hasta que en 1434 residió como platero en <strong><a
                                    href="https://es.wikipedia.org/wiki/Estrasburgo">Estrasburgo</a></strong> ,
                            donde cinco años después se vio envuelto en un proceso, que demuestra de
                            forma indudable, que Gutenberg había formado una sociedad con Hanz Riffe
                            para desarrollar ciertos procedimientos secretos. En 1438 entraron como
                            asociados Andrés Heilman y Andreas Dritzehen (sus herederos fueron los
                            reclamantes) y en el expediente judicial se mencionan los términos de prensa,
                            formas e impresión. <br><br></p>
                    </div>
                    <div id="text-hidden" class="d-none">
                        <p>
                            De regreso a Maguncia, formó una nueva sociedad con <strong><a
                                    href="https://es.wikipedia.org/wiki/Johann_Fust">Johann Fust</a></strong>, quien le da
                            un préstamo con el que, en 1449, publicó el <strong><a
                                    href="https://es.wikipedia.org/wiki/Misal_de_Constanza">Misal de Constanza</a></strong>
                            ,
                            primer libro
                            tipográfico del mundo occidental. Recientes publicaciones, en cambio, aseguran
                            que este misal no pudo imprimirse antes de 1473 debido a la confección de su
                            papel, por lo que no debió ser obra de Gutenberg. En 1452, Gutenberg da
                            comienzo a la edición de la Biblia de 42 líneas (también conocida como <strong><a
                                    href="https://es.wikipedia.org/wiki/Biblia_de_Gutenberg">Biblia de
                                </a></strong><strong><a
                                    href="https://es.wikipedia.org/wiki/Biblia_de_Gutenberg">Gutenberg</a></strong> ). En
                            1455,
                            Gutenberg carecía de solvencia económica para devolver
                            el préstamo que le había concedido Fust, por lo que se disolvió la unión y
                            Gutenberg se vio en la penuria (incluso tuvo que difundir el secreto de montar
                            imprentas para poder subsistir).
                            Johannes Gutenberg murió arruinado en Maguncia, Alemania el 3 de febrero de
                            1468. A pesar de la oscuridad de sus últimos años de vida, siempre será
                            reconocido como el inventor de la imprenta moderna.
                        </p>
                    </div>
                    <div class="read-more mb-4">
                        <button class="line-time-blue">&darr;</button>
                    </div>
                </div>

                {{-- timeline --}}
                <div>
                    <h2>¿Qué es lo que inventó?</h2>
                    <p>El nombre de Gutenberg lo asociamos a la invención de la imprenta, pero
                        mucho antes que él ya se imprimía sobre pergamino o papel. Un breve recorrido
                        histórico nos indica que:</p>


                    <div class="row my-1">
                        <div class="col-md-5 rules-game">
                            <div>
                                <p><strong>En el siglo V a.C.</strong> 2000 años antes de Gutenberg, en Roma se imprimían
                                    carteles
                                    con
                                    signos
                                    grabados en arcilla.</p>
                            </div>
                            <div>
                                <img data-toggle="modal" data-target="#img-time-1"
                                    src="../img/escritura-romana-recortada.jpg" alt="regla juego 1">
                            </div>
                        </div>
                        <div class="col-md-7 div-timeline">
                            <div class="line-time line-time-orange line-time-margin-left"></div>
                            <div class="my-1">
                                <button class="button-timeline button-margin-left line-time-orange">Siglo V a.C.</button>
                            </div>
                            <div class="line-time line-time-orange line-time-margin-left"></div>
                        </div>
                    </div>

                    <div class="row my-1">
                        <div class="col-md-7 div-timeline div-timeline-right">
                            <div class="line-time line-time-red line-time-margin-right"></div>
                            <div class="my-1">
                                <button class="button-timeline button-margin-right line-time-red">Siglo I d.C</button>
                            </div>
                            <div class="line-time line-time-red line-time-margin-right"></div>

                        </div>
                        <div class="col-md-5 col-sm-12 rules-game">
                            <div>
                                <p><strong>En el siglo I d.C.</strong> 1400 años antes de Gutenberg, en China se imprimían
                                    carteles utilizando
                                    signos grabados en madera. Así en el año 686 se imprimió una
                                    publicación que se llamó “El sutra del diamante”, con signos grabados en
                                    una única madera.</p>
                            </div>
                            <div>
                                <img data-toggle="modal" data-target="#img-time-2"
                                    src="../img/03 Tipos chinos en madera recortada.jpg" alt="regla juego 1">
                            </div>
                        </div>
                    </div>


                    <div class="row my-1">
                        <div class="col-md-5 col-sm-12 rules-game">
                            <div>
                                <p><strong>Ya en el siglo XV</strong> la gran idea de Gutenberg fue moldear piezas de metal
                                    para
                                    cada letra, creando de tipos de letras de metal individuales para la imprenta.</p>
                            </div>
                            <div>
                                <img data-toggle="modal" data-target="#img-time-3"
                                    src="../img/05 tipos moviles metal gutenberg recortada.jpg" alt="regla juego 1">
                            </div>
                        </div>
                        <div class="col-md-7 div-timeline">
                            <div class="line-time line-time-blue line-time-margin-left"></div>
                            <div class="my-1">
                                <button class="button-timeline button-margin-left line-time-blue">Siglo XV d.C.</button>
                            </div>
                            <div class="line-time line-time-blue line-time-margin-left"></div>
                        </div>
                    </div>
                </div>

                {{-- ventanas modales --}}

                <div class="modal fade" id="img-time-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tablillas de Vindolanda </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img class="img-fluid img-horizontal" src="../img/escritura-romana.jpg">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="img-time-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tipos chinos en madera recortada</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img class="img-fluid" src="../img/03 Tipos chinos en madera.jpg" alt="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="img-time-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tipos moviles de metal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img class="img-fluid img-horizontal" src="../img/05 tipos moviles metal gutenberg.jpg"
                                    alt="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
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
