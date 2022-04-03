@extends('layouts.app',
['title' => 'Info Scrabble', 'css_files' => ['test_scr_index'],
'js_files' => ['test_scr_index']])

@section('styles')
    <link href="{{ asset('css/scrabbleIndex.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!--Contenido principal-->
            <div class="col-lg-9 col-md-12 mt-3">
                <h2>Estadísticas del juego</h2>

                <!--Estadísticas variadas-->
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card-deck">
                            <div class="card card-estadistica">
                                <div class="card-header">Total jugadores hoy</div>
                                <div class="card-body">
                                    <p class="card-text">5000</p>
                                </div>
                            </div>
                            <div class="card card-estadistica">
                                <div class="card-header">Total partidas hoy</div>
                                <div class="card-body border-secondary">
                                    <p class="card-text">5000</p>
                                </div>
                            </div>
                            <div class="card card-estadistica">
                                <div class="card-header">Mejor partida</div>
                                <div class="card-body">
                                    <p class="card-text">5000</p>
                                </div>
                            </div>
                            <div class="card card-estadistica">
                                <div class="card-header">Jugador del día</div>
                                <div class="card-body">
                                    <p class="card-text">5000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Podium -->
                <div class="row my-4">
                    <div class="col-md-12 podium mx-2">

                        <div class="podium-position">
                            <div class="card card-podium cardsilver">
                                <img src="../img/01 Gutenberg.jpg" alt="Monasterio de Santa María del Puig">
                                <h5 class="card-title mt-2">Jugador 2</h5>
                                <span>Puntuación</span>
                                <span>11000</span>
                            </div>
                            <div class="podium1">
                            </div>
                        </div>

                        <div class="podium-position">
                            <div class="card card-podium cardgold">
                                <img src="../img/01 Gutenberg.jpg" alt="Monasterio de Santa María del Puig">
                                <h5 class="card-title mt-2">Jugador 1</h5>
                                <span>Puntuación</span>
                                <span>12000</span>
                            </div>
                            <div class="podium2">
                            </div>
                        </div>

                        <div class="podium-position">
                            <div class="card card-podium cardbronze">
                                <img src="../img/01 Gutenberg.jpg" alt="Monasterio de Santa María del Puig">
                                <h5 class="card-title mt-2">Jugador 3</h5>
                                <span>Puntuación</span>
                                <span>10000</span>
                            </div>
                            <div class="podium3">                      
                            </div>
                        </div>

                    </div>
                </div>

                <h2>Reglas del juego</h2>

                <p>A continuación se exponen las reglas del juego sacadas de la página WikiHow.</p>

                <!--Reglas del juego-->
                <div class="row my-4">
                    <div class="container">
                        <h4>Prepárate para jugar</h4>
                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">1. Antes de empezar el juego, asegúrate de tener todo lo que
                                        necesitas
                                        para jugar Scrabble. Necesitarás
                                        un tablero, 100 azulejos de letras, un estante de letras para cada jugador y una
                                        bolsa
                                        de
                                        tela
                                        para
                                        guardar los azulejos de letras. También necesitarás 1 a 3 jugadores.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla1.1.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>
                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">2. Escoge el diccionario que usarás para los desafíos. Es
                                        posible
                                        que,
                                        durante el curso del juego, alguien juegue una palabra que otro jugador considere
                                        inválida.
                                        En una situación como esta, tendrás que buscar la palabra en un diccionario.
                                        Asegúrate
                                        de
                                        tener un diccionario a la mano o un dispositivo móvil con una aplicación de
                                        verificación
                                        para Scrabble a fin de lidiar con los desafíos.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla1.2.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>

                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">3. Coloca los azulejos en la bolsa y agítalos. Para asegurarte
                                        de
                                        que
                                        las letras estén distribuidas de forma justa, colócalas en la bolsa, ciérrala y
                                        agítala
                                        un
                                        poco.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla1.3.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>

                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">4. Determina quién empezará. Pasa la bolsa alrededor de la
                                        mesa y
                                        permite que cada jugador extraiga un azulejo. Luego, coloca los azulejos boca arriba
                                        sobre
                                        la mesa. El jugador con la letra más cercana a la letra “A” comienza. Coloca estas
                                        letras de
                                        regreso a la bolsa y agítala nuevamente antes de extraer los azulejos. Si algún
                                        jugador
                                        toma
                                        una ficha en blanco, tendrá que empezar el juego.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla1.4.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>

                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">5. Extrae tus azulejos. Empezando con la persona que obtuvo la
                                        ficha
                                        más cercana a “A”, deja que los jugadores tomen 7 fichas. Sostén la bolsa sobre el
                                        nivel
                                        de
                                        los ojos, de modo que no puedas ver las fichas. No muestres estos azulejos a los
                                        jugadores.
                                        Solo colócalos en tu estante y pasa la bolsa al siguiente jugador hasta que todos
                                        hayan
                                        extraído sus letras.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla1.5.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>

                        <h4>Jugar al juego</h4>

                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">1. Coloca la primera palabra. El jugador que escogió la letra
                                        más
                                        cercana a “A” debe colocar la primera palabra. La palabra debe tener al menos dos
                                        azulejos y
                                        debe colocarse a lo largo del cuadrado de estrella en el centro del tablero. La
                                        palabra se
                                        puede colocar en sentido vertical u horizontal, pero no diagonal. </p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla2.1.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>

                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">2. Cuenta tus puntos. Después de colocar una letra, asegúrate
                                        de
                                        contar tus puntos. Suma los puntos de la esquina inferior derecha de cada uno de los
                                        azulejos que has puesto. Si colocaste un azulejo en un cuadrado de mayor valor,
                                        ajusta tu
                                        puntaje como se indica en dicho cuadrado.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla2.2.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>

                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">3. Extrae nuevos azulejos. Después de cada turno, tendrás que
                                        extraer
                                        tantos azulejos nuevos como los que acabas de jugar. Por ejemplo, si jugaste tres de
                                        tus
                                        azulejos para formar una palabra durante tu turno, entonces tendrás que sacar tres
                                        más al
                                        terminar. Coloca estos azulejos nuevos en tu estante y pasa la bolsa al siguiente
                                        jugador.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla2.3.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>

                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">4. Construye sobre las palabras de otros jugadores. En tu
                                        siguiente
                                        turno, tendrás que formar tu palabra a partir de las palabras que tus oponentes han
                                        formado.
                                        Eso significa que no puedes crear una palabra independiente en el tablero. Todos los
                                        azulejos deben estar conectados.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla2.4.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>

                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">5. Usa tus azulejos para obtener el puntaje más alto posible
                                        en cada
                                        turno. Es una buena idea considerar varias jugadas durante cada uno de tus turnos y
                                        hacer la
                                        jugada que te hará ganar más puntos. Busca oportunidades para incorporar cuadrados
                                        de mayor
                                        valor y letras de mayor puntaje como “Z” y “Q” a tus jugadas.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla2.5.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>

                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">6. Desafía a otros jugadores a debatir acerca de una palabra.
                                        Si
                                        crees que un jugador ha formado una palabra que no existe o que otro jugador ha
                                        deletreado
                                        mal una palabra, entonces puedes desafiar a ese jugador. Cuando desafíes a un
                                        jugador, debes
                                        buscar la palabra en el diccionario.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla2.6.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>

                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">7. Intercambia los azulejos que no desees. En algún punto
                                        durante el
                                        juego, puedes decidir que deseas intercambiar algunos o todos tus azulejos por
                                        nuevos.
                                        Puedes usar un turno para obtener nuevos azulejos. Simplemente devuelve los azulejos
                                        que ya
                                        no deseas a la bolsa, agita la bolsa y extrae el número de azulejos que devolviste.
                                        Solo ten
                                        en cuenta que no puedes formar una palabra después de extraer nuevos azulejos, ya
                                        que esta
                                        operación contará como un turno.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla2.7.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>

                        <h4>Ganar puntos</h4>

                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">1. Lleva un registro del puntaje a medida que avanzas. Es
                                        importante
                                        mantener un conteo cuidadoso del puntaje de cada jugador mientras juegas. Cada
                                        jugador debe
                                        anunciar su puntaje después de sumarlo y entonces el anotador debe escribirlo
                                        inmediatamente.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla3.1.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>

                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">2. Busca los cuadrados con mayor puntaje. Los cuadrados de
                                        mayor
                                        valor alterarán tu puntaje de palabras, así que presta atención a estos cuadrados
                                        cuando
                                        formes palabras. Solo puedes usar los bonos de un cuadrado de mayor valor si colocas
                                        el
                                        azulejo sobre ese cuadrado durante tu turno. No puedes incorporar los bonos de un
                                        cuadrado
                                        de mayor valor que ya has contado en otro turno o que ha sido contado por otro
                                        jugador.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla3.2.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>

                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">3. Suma 50 puntos al puntaje de tu palabra si obtienes un
                                        bingo,
                                        también conocido como bonus. Un bingo se produce cuando usas tus siete azulejos para
                                        formar
                                        una palabra. Cuando esto sucede, debes sumar el valor total de la palabra (además de
                                        cualquier bono ganado por los cuadrados de mayor valor) y luego sumar 50 puntos.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla3.3.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>

                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">4. Suma los puntajes de cada jugador al final del juego.
                                        Después de
                                        que todos los jugadores hayan agotado sus azulejos o no puedan jugar más palabras,
                                        suma los
                                        puntos totales de cada jugador. A medida que el anotador sume los totales, cada
                                        jugador debe
                                        hacerle saber el valor de los puntos de los azulejos que se quedaron (si este es el
                                        caso).
                                        Resta este valor del total de puntos de cada jugador para determinar el puntaje
                                        final.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla3.4.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>

                        <div class="container reglas-juego my-3">
                            <div class="row align-items-center text-justify">
                                <div class="col-lg-7 col-md-11">
                                    <p class="pr-4">5. Anuncia al ganador. Después de que el anotador haya sumado
                                        los
                                        puntajes de cada jugador y haya restado los valores de los azulejos que no se
                                        usaron, puede
                                        anunciar al ganador. La persona que tenga el puntaje más alto gana el juego. El
                                        segundo
                                        lugar lo obtiene la persona con el segundo puntaje más alto y así sucesivamente.</p>
                                </div>
                                <div class="col-lg-5 col-md-11">
                                    <img class="img-fluid" src="../img/regla3.5.jpg" alt="regla juego 1">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--Recursos extra-->
                <h2>Recursos extra</h2>
                <div class="row my-4">
                    <div class="container-fluid">
                        <p>A continuación se muestran una serie de videos y enlaces de interés para perfeccionar tus
                            habilidades
                            en el Scrabble</p>

                        <h4>Enlaces de interes</h4>
                        <ul>
                            <li><a
                                    href="https://www.guiaspracticas.com/juegos-de-mesa/scrabble">https://www.guiaspracticas.com/juegos-de-mesa/scrabble</a>
                            </li>
                            <li><a
                                    href="https://www.redeletras.com/rules/reglamentomatel.htm">https://www.redeletras.com/rules/reglamentomatel.htm</a>
                            </li>
                            <li><a
                                    href="https://docplayer.es/16303418-Palabra-maestra-guia-practica-para-el-jugador-de-scrabble.html">https://docplayer.es/16303418-Palabra-maestra-guia-practica-para-el-jugador-de-scrabble.html</a>
                            </li>
                        </ul>
                        <h4>Videos</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe width="894" height="503" src="https://www.youtube.com/embed/TSby2abyqZ4"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe width="894" height="503" src="https://www.youtube.com/embed/2_vuko3WPcg"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Noticas y Avisos-->
            <div class="col-lg-3 col-md-12">
                @include('alerts')
                @include('news')
            </div>
        </div>
    </div>
@endsection
