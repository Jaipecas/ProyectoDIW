@extends('layouts.app',
['title' => 'Info Imprenta', 'css_files' => [],
'js_files' => []])

<link href="{{ asset('css/gutenberg.css') }}" rel="stylesheet">

@section('content')
    <div class="container content">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <img class="img-fluid retratoguten" src="../img/01 Gutenberg.jpg" alt="retrato Gutenberg">
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
                <h2>¿Qué es lo que inventó?</h2>
                <p>El nombre de Gutenberg lo asociamos a la invención de la imprenta, pero
                    mucho antes que él ya se imprimía sobre pergamino o papel. Un breve recorrido
                    histórico nos indica que:</p>
                <ul>
                    <li>2000 años antes de Gutenberg, en Roma se imprimían carteles con signos
                        grabados en arcilla.</li>
                    
                    <li>1400 años antes de Gutenberg, en China se imprimían carteles utilizando
                        signos grabados en madera. Así en el año 686 se imprimió una
                        publicación que se llamó “El sutra del diamante”, con signos grabados en
                        una única madera.</li>
                    <li></li>
                </ul>
            </div>
            <!--Avisos y Noticias-->
            <div class="col-lg-3 col-md-4">
               @include('alerts')
               @include('news')
            </div>
        </div>
    </div>
@endsection
