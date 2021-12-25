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
                <!--Jumbotron-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron">
                            <h1 class="display-4">¡Disfruta del Scrabble!</h1>
                            <p class="lead">Accede a divertidas partidas de Scrabble en las que podrás retar a tus
                                amigos y demostrar tus conocimientos sobre la imprenta.</p>
                            <hr class="my-4">
                            <p>Pulsa el botón para acceder a tu panel de control.</p>
                            <p class="lead">
                                <a class="btn btn-primary btn-lg" href="#" role="button">Comienza a jugar</a>
                            </p>
                        </div>
                    </div>
                </div>

                <h2>Estadísticas del juego</h2>

                <!-- Podium y cards mejores jugadores -->
                <div class="row my-4">
                    <div class="container ">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <!--img podium-->
                                <svg class="img-fluid" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" style="isolation:isolate"
                                    viewBox="0 0 700 550" width="700pt" height="550pt">
                                    <defs>
                                        <clipPath id="_clipPath_bJasShGMlGSo5gRhtaRplFbnV2MHflW7">
                                            <rect width="700" height="550" />
                                        </clipPath>
                                    </defs>
                                    <g clip-path="url(#_clipPath_bJasShGMlGSo5gRhtaRplFbnV2MHflW7)">
                                        <rect width="700" height="550" style="fill:rgb(204,218,255)" />
                                        <rect x="336.966" y="145.918" width="33" height="29" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(235,235,235)" />
                                        <rect x="336.966" y="145.918" width="33" height="29" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(247,220,181)" />
                                        <rect x="345.466" y="174.918" width="16" height="14" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(247,220,181)" />
                                        <rect x="336.966" y="135.918" width="33" height="10" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(235,235,235)" />
                                        <rect x="336.966" y="135.918" width="33" height="10" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(0,0,0)" />
                                        <rect x="357.466" y="149.918" width="8" height="8" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(232,192,133)" />
                                        <rect x="341.466" y="149.918" width="8" height="8" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(232,192,133)" />
                                        <rect x="332.966" y="188.918" width="41" height="51" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(74,134,232)" />
                                        <rect x="333.216" y="239.918" width="16" height="23" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(158,180,217)" />
                                        <rect x="357.466" y="239.918" width="16" height="23" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(158,180,217)" />
                                        <rect x="333.166" y="262.918" width="16" height="44" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(247,220,181)" />
                                        <rect x="357.466" y="262.918" width="16" height="44" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(247,220,181)" />
                                        <rect x="327.269" y="306.918" width="22.197" height="11"
                                            transform="matrix(1,0,0,1,0,0)" fill="rgb(235,235,235)" />
                                        <rect x="357.466" y="306.918" width="22.197" height="11"
                                            transform="matrix(1,0,0,1,0,0)" fill="rgb(235,235,235)" />
                                        <rect x="357.466" y="149.918" width="8" height="8" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(232,192,133)" />
                                        <rect x="341.466" y="149.918" width="8" height="8" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(232,192,133)" />
                                        <rect x="228.732" y="219.753" width="33" height="29" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(235,235,235)" />
                                        <rect x="228.732" y="219.753" width="33" height="29" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(247,220,181)" />
                                        <rect x="237.232" y="248.753" width="16" height="14" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(247,220,181)" />
                                        <rect x="228.732" y="209.753" width="33" height="10" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(235,235,235)" />
                                        <rect x="228.732" y="209.753" width="33" height="10" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(220,240,174)" />
                                        <rect x="233.232" y="223.753" width="8" height="8" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(232,192,133)" />
                                        <rect x="249.232" y="223.753" width="8" height="8" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(232,192,133)" />
                                        <rect x="224.732" y="262.753" width="41" height="51" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(221,91,68)" />
                                        <rect x="249.482" y="313.753" width="16" height="23" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(158,180,217)" />
                                        <rect x="225.232" y="313.753" width="16" height="23" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(158,180,217)" />
                                        <rect x="249.532" y="336.753" width="16" height="44" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(247,220,181)" />
                                        <rect x="225.232" y="336.753" width="16" height="44" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(247,220,181)" />
                                        <rect x="249.232" y="380.753" width="22.197" height="11"
                                            transform="matrix(1,0,0,1,0,0)" fill="rgb(235,235,235)" />
                                        <rect x="219.035" y="380.753" width="22.197" height="11"
                                            transform="matrix(1,0,0,1,0,0)" fill="rgb(235,235,235)" />
                                        <rect x="233.232" y="223.753" width="8" height="8" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(232,192,133)" />
                                        <rect x="249.232" y="223.753" width="8" height="8" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(232,192,133)" />
                                        <rect x="192.268" y="391.753" width="105.5" height="93.165"
                                            transform="matrix(1,0,0,1,0,0)" fill="rgb(221,91,68)" />
                                        <rect x="403.116" y="415.918" width="105.5" height="69"
                                            transform="matrix(1,0,0,1,0,0)" fill="rgb(128,221,162)" />
                                        <rect x="297.581" y="317.918" width="105.535" height="167"
                                            transform="matrix(1,0,0,1,0,0)" fill="rgb(74,134,232)" />
                                        <rect x="439.732" y="243.753" width="33" height="29" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(235,235,235)" />
                                        <rect x="439.732" y="243.753" width="33" height="29" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(247,220,181)" />
                                        <rect x="448.232" y="272.753" width="16" height="14" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(247,220,181)" />
                                        <rect x="439.732" y="233.753" width="33" height="10" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(235,235,235)" />
                                        <rect x="439.732" y="233.753" width="33" height="10" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(255,153,0)" />
                                        <rect x="444.232" y="247.753" width="8" height="8" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(232,192,133)" />
                                        <rect x="460.232" y="247.753" width="8" height="8" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(232,192,133)" />
                                        <rect x="435.732" y="286.753" width="41" height="51" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(128,221,162)" />
                                        <rect x="460.482" y="337.753" width="16" height="23" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(158,180,217)" />
                                        <rect x="436.232" y="337.753" width="16" height="23" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(158,180,217)" />
                                        <rect x="460.532" y="360.753" width="16" height="44" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(247,220,181)" />
                                        <rect x="436.232" y="360.753" width="16" height="44" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(247,220,181)" />
                                        <rect x="460.232" y="404.753" width="22.197" height="11"
                                            transform="matrix(1,0,0,1,0,0)" fill="rgb(235,235,235)" />
                                        <rect x="430.035" y="404.753" width="22.197" height="11"
                                            transform="matrix(1,0,0,1,0,0)" fill="rgb(235,235,235)" />
                                        <rect x="444.232" y="247.753" width="8" height="8" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(232,192,133)" />
                                        <rect x="460.232" y="247.753" width="8" height="8" transform="matrix(1,0,0,1,0,0)"
                                            fill="rgb(232,192,133)" />

                                        <!--PARTES DEL SVG ANIMADAS-->

                                        <!--copa de oro-->
                                        <g>
                                            <ellipse vector-effect="non-scaling-stroke" cx="354.65275593750255"
                                                cy="114.63483075003944" rx="17.686877818341713" ry="6.2633433731851085"
                                                fill="rgb(232,232,1)" />
                                            <rect x="350.84" y="93.371" width="8" height="21.263"
                                                transform="matrix(1,0,0,1,0,0)" fill="rgb(232,232,1)" />
                                            <ellipse vector-effect="non-scaling-stroke" cx="355.0896337558443"
                                                cy="90.67357588395359" rx="16.250000000000057" ry="8.119613299048424"
                                                fill="rgb(232,232,1)" />
                                            <rect x="338.84" y="69.082" width="32.5" height="21.591"
                                                transform="matrix(1,0,0,1,0,0)" fill="rgb(232,232,1)" />
                                            <animateTransform attributeType="XML" attributeName="transform" type="translate"
                                                from="0 0" to="0 0" begin="0s" dur="1" repeatCount="indefinite"
                                                values="0 0 ; 0 -10 ; 0 0" keyTimes="0; 0.5; 1" />
                                        </g>

                                        <!--copa de plata-->
                                        <g>
                                            <ellipse vector-effect="non-scaling-stroke" cx="245.04502749779178"
                                                cy="189.4701541901835" rx="17.686877818341742" ry="6.2633433731851085"
                                                fill="rgb(200,197,197)" />
                                            <rect x="240.858" y="168.207" width="8" height="21.263"
                                                transform="matrix(1,0,0,1,0,0)" fill="rgb(200,197,197)" />
                                            <ellipse vector-effect="non-scaling-stroke" cx="244.60814967945026"
                                                cy="165.5088993240971" rx="16.250000000000057" ry="8.119613299048439"
                                                fill="rgb(200,197,197)" />
                                            <rect x="228.358" y="143.918" width="32.5" height="21.591"
                                                transform="matrix(1,0,0,1,0,0)" fill="rgb(200,197,197)" />
                                            <animateTransform attributeType="XML" attributeName="transform" type="translate"
                                                from="0 0" to="0 0" begin="0s" dur="1" repeatCount="indefinite"
                                                values="0 0 ; 0 -10 ; 0 0" keyTimes="0; 0.5; 1" />
                                        </g>

                                        <!--copa de bronce-->
                                        <g>
                                            <ellipse vector-effect="non-scaling-stroke" cx="456.0450274977917"
                                                cy="211.4701541901832" rx="17.686877818341713" ry="6.2633433731851085"
                                                fill="rgb(205,127,50)" />
                                            <rect x="451.858" y="190.207" width="8" height="21.263"
                                                transform="matrix(1,0,0,1,0,0)" fill="rgb(205,127,50)" />
                                            <ellipse vector-effect="non-scaling-stroke" cx="455.60814967944884"
                                                cy="187.5088993240972" rx="16.250000000000057" ry="8.119613299048439"
                                                fill="rgb(205,127,50)" />
                                            <rect x="439.358" y="165.918" width="32.5" height="21.591"
                                                transform="matrix(1,0,0,1,0,0)" fill="rgb(205,127,50)" />
                                            <animateTransform attributeType="XML" attributeName="transform" type="translate"
                                                from="0 0" to="0 0" begin="0s" dur="1" repeatCount="indefinite"
                                                values="0 0 ; 0 -10 ; 0 0" keyTimes="0; 0.5; 1" />
                                        </g>

                                        <!--Primer muchacho-->

                                        <!-- biceps izq -->
                                        <line x1="332.966" y1="188.918" x2="302.502" y2="157.753"
                                            vector-effect="non-scaling-stroke" stroke-width="7" stroke="rgb(247,220,181)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3">
                                            <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                                from="0 332.966 188.918" to="0 332.966 188.918" begin="0s" dur="1s"
                                                repeatCount="indefinite"
                                                values="0 332.966 188.918; 10 332.966 188.918; 0 332.966 188.918"
                                                keyTimes="0; 0.5; 1" />
                                        </line>

                                        <!-- antebrazo izq -->
                                        <line x1="306.002" y1="153.696" x2="332.966" y2="119.943"
                                            vector-effect="non-scaling-stroke" stroke-width="7" stroke="rgb(247,220,181)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3">
                                            <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                                from="0 302.002 155.696" to="0 302.002 155.696" begin="0s" dur="1s"
                                                repeatCount="indefinite"
                                                values="0 302.002 155.696; -7 302.002 155.696; 0 302.002 155.696"
                                                keyTimes="0; 0.5; 1" />
                                        </line>

                                        <!--biceps der-->
                                        <line x1="375.502" y1="188.918" x2="405.966" y2="157.753"
                                            vector-effect="non-scaling-stroke" stroke-width="7" stroke="rgb(247,220,181)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3">
                                            <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                                from="0 375.502 188.918" to="0 375.502 188.918" begin="0s" dur="1s"
                                                repeatCount="indefinite"
                                                values="0 375.502 188.918; -10 375.502 188.918; 0 375.502 188.918"
                                                keyTimes="0; 0.5; 1" />

                                        </line>

                                        <!-- antebrazo der -->
                                        <line x1="402.966" y1="153.696" x2="376.002" y2="119.943"
                                            vector-effect="non-scaling-stroke" stroke-width="7" stroke="rgb(247,220,181)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3">
                                            <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                                from="0 406.966 155.696" to="0 406.966 155.696" begin="0s" dur="1s"
                                                repeatCount="indefinite"
                                                values="0 406.966 155.696; 7 406.966 155.696; 0 406.966 155.696"
                                                keyTimes="0; 0.5; 1" />

                                        </line>


                                        <!--Segundo muchacho-->

                                        <!-- antebrazo izq -->
                                        <line x1="198.268" y1="228.753" x2="225.232" y2="196"
                                            vector-effect="non-scaling-stroke" stroke-width="7" stroke="rgb(247,220,181)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3">
                                            <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                                from="0 194.268 231.753" to="0 194.268 231.753" begin="0s" dur="1s"
                                                repeatCount="indefinite"
                                                values="0 194.268 231.753; -7 194.268 231.753; 0 194.268 231.753"
                                                keyTimes="0; 0.5; 1" />
                                        </line>

                                        <!-- biceps izq -->
                                        <line x1="224.732" y1="262.918" x2="194.268" y2="231.753"
                                            vector-effect="non-scaling-stroke" stroke-width="7" stroke="rgb(247,220,181)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3">
                                            <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                                from="0 224.732 262.918" to="0 224.732 262.918" begin="0s" dur="1s"
                                                repeatCount="indefinite"
                                                values="0 224.732 262.918; 10 224.732 262.918; 0 224.732 262.918"
                                                keyTimes="0; 0.5; 1" />
                                        </line>

                                        <!--biceps der-->
                                        <line x1="266.268" y1="262.918" x2="296.732" y2="231.753"
                                            vector-effect="non-scaling-stroke" stroke-width="7" stroke="rgb(247,220,181)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3">
                                            <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                                from="0 266.268 262.918" to="0 266.268 262.918" begin="0s" dur="1s"
                                                repeatCount="indefinite"
                                                values="0 266.268 262.918; -10 266.268 262.918; 0 266.268 262.918"
                                                keyTimes="0; 0.5; 1" />
                                        </line>

                                        <!-- antebrazo der -->
                                        <line x1="293.232" y1="228.753" x2="266.268" y2="196"
                                            vector-effect="non-scaling-stroke" stroke-width="7" stroke="rgb(247,220,181)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3">
                                            <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                                from="0 297.232 231.753" to="0 297.232 231.753" begin="0s" dur="1s"
                                                repeatCount="indefinite"
                                                values="0 297.232 231.753; 7 297.232 231.753; 0 297.232 231.753"
                                                keyTimes="0; 0.5; 1" />
                                        </line>

                                        <!--Tercer muchacho -->

                                        <!--antebrazo izq-->
                                        <line x1="408.116" y1="251.543" x2="435.08" y2="217.79"
                                            vector-effect="non-scaling-stroke" stroke-width="7" stroke="rgb(247,220,181)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3">
                                            <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                                from="0 404.116 253.543" to="0 404.116 253.543" begin="0s" dur="1s"
                                                repeatCount="indefinite"
                                                values="0 404.116 253.543; -7 404.116 253.543; 0 404.116 253.543"
                                                keyTimes="0; 0.5; 1" />
                                        </line>

                                        <!--Antebrazo der-->
                                        <line x1="504.08" y1="251.543" x2="477.116" y2="217.79"
                                            vector-effect="non-scaling-stroke" stroke-width="7" stroke="rgb(247,220,181)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3">
                                            <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                                from="0 508.08 253.543" to="0 508.08 253.543" begin="0s" dur="1s"
                                                repeatCount="indefinite"
                                                values="0 508.08 253.543; 7 508.08 253.543; 0 508.08 253.543"
                                                keyTimes="0; 0.5; 1" />
                                        </line>

                                        <!-- biceps der-->
                                        <line x1="478.268" y1="286.765" x2="508.732" y2="255.6"
                                            vector-effect="non-scaling-stroke" stroke-width="7" stroke="rgb(247,220,181)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3">
                                            <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                                from="0 478.268 286.765" to="0 478.268 286.765" begin="0s" dur="1s"
                                                repeatCount="indefinite"
                                                values="0 478.268 286.765; -10 478.268 286.765; 0 478.268 286.765"
                                                keyTimes="0; 0.5; 1" />
                                        </line>

                                        <!-- biceps izq-->
                                        <line x1="434.732" y1="286.765" x2="404.268" y2="255.6"
                                            vector-effect="non-scaling-stroke" stroke-width="7" stroke="rgb(247,220,181)"
                                            stroke-linejoin="miter" stroke-linecap="square" stroke-miterlimit="3">

                                            <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                                from="0 434.732 286.765" to="0 434.732 286.765" begin="0s" dur="1s"
                                                repeatCount="indefinite"
                                                values="0 434.732 286.765; 10 434.732 286.765; 0 434.732 286.765"
                                                keyTimes="0; 0.5; 1" />
                                        </line>

                                        <g>
                                            <path
                                                d=" M 237.342 6.563 C 236.203 6.662 235.063 6.861 233.924 7.06 C 233.544 7.16 233.165 7.16 232.911 7.259 C 232.152 7.458 231.392 7.557 230.633 7.756 L 229.494 8.055 C 228.608 8.253 227.722 8.552 226.835 8.85 C 226.203 9.049 225.57 9.248 225.063 9.447 C 224.684 9.546 224.43 9.646 224.177 9.745 C 221.899 10.541 219.62 11.535 217.595 12.529 L 136.582 12.529 L 136.582 6.563 L 237.342 6.563 Z  M 194.051 36.494 C 194.43 35.599 194.684 34.804 195.063 34.008 C 195.19 33.809 195.19 33.71 195.316 33.511 C 195.696 32.815 195.949 32.119 196.329 31.522 C 196.456 31.224 196.709 30.926 196.835 30.627 L 136.582 30.627 L 136.582 36.594 L 194.051 36.594 L 194.051 36.494 L 194.051 36.494 Z  M 201.392 24.462 C 202.658 22.971 204.051 21.578 205.57 20.286 C 205.949 19.987 206.203 19.689 206.582 19.391 C 206.962 19.092 207.215 18.794 207.595 18.496 L 136.582 18.496 L 136.582 24.462 L 201.392 24.462 Z  M 461.519 12.43 L 462.152 12.529 L 462.025 12.529 C 462.025 12.43 461.772 12.43 461.519 12.43 Z  M 503.165 30.528 C 503.291 30.826 503.544 31.125 503.671 31.423 C 504.051 32.119 504.43 32.716 504.684 33.412 C 504.81 33.611 504.81 33.71 504.937 33.909 C 505.316 34.704 505.696 35.599 505.949 36.395 L 563.418 36.395 L 563.418 30.428 L 503.165 30.528 L 503.165 30.528 Z  M 492.532 18.496 C 492.911 18.794 493.291 19.092 493.544 19.391 C 493.924 19.689 494.177 19.987 494.557 20.286 C 496.076 21.578 497.468 23.07 498.734 24.462 L 563.544 24.462 L 563.544 18.496 L 492.532 18.496 Z  M 462.911 6.563 C 464.051 6.662 465.19 6.861 466.329 7.06 C 466.709 7.16 467.089 7.16 467.342 7.259 C 468.101 7.458 468.861 7.557 469.62 7.756 L 470.759 8.055 C 471.646 8.253 472.532 8.552 473.418 8.85 C 474.051 9.049 474.684 9.248 475.19 9.447 C 475.57 9.546 475.823 9.646 476.076 9.745 C 478.354 10.541 480.633 11.535 482.658 12.529 L 563.418 12.529 L 563.418 6.563 L 462.911 6.563 L 462.911 6.563 Z  M 461.519 537.57 C 461.772 537.57 462.025 537.471 462.152 537.471 L 461.519 537.57 Z  M 506.076 513.506 C 505.696 514.401 505.443 515.196 505.063 515.992 C 504.937 516.191 504.937 516.29 504.81 516.489 C 504.43 517.185 504.177 517.881 503.797 518.478 C 503.671 518.776 503.418 519.074 503.291 519.373 L 563.671 519.373 L 563.671 513.406 L 506.076 513.506 Z  M 476.203 540.255 C 475.949 540.354 475.57 540.454 475.19 540.553 C 474.557 540.752 473.924 540.951 473.418 541.15 C 472.532 541.448 471.646 541.647 470.759 541.945 L 469.62 542.244 C 468.861 542.443 468.101 542.542 467.342 542.741 C 466.962 542.84 466.582 542.84 466.329 542.94 C 465.19 543.139 464.051 543.338 463.038 543.437 L 563.797 543.437 L 563.797 537.471 L 483.038 537.471 C 480.633 538.564 478.481 539.459 476.203 540.255 L 476.203 540.255 Z  M 494.43 529.714 C 494.051 530.013 493.797 530.311 493.418 530.609 C 493.038 530.908 492.785 531.206 492.405 531.504 L 563.544 531.504 L 563.544 525.538 L 498.734 525.538 C 497.342 526.93 495.949 528.422 494.43 529.714 Z  M 237.848 537.471 C 237.975 537.471 238.228 537.471 238.354 537.57 L 238.608 537.57 L 238.608 537.471 L 237.848 537.471 Z  M 207.595 531.504 C 207.215 531.206 206.835 530.908 206.582 530.609 C 206.203 530.311 205.949 530.013 205.57 529.714 C 204.051 528.422 202.658 526.93 201.392 525.538 L 136.582 525.538 L 136.582 531.504 L 207.595 531.504 Z  M 196.962 519.472 C 196.835 519.174 196.582 518.875 196.456 518.577 C 196.076 517.881 195.696 517.284 195.443 516.588 C 195.316 516.389 195.316 516.29 195.19 516.091 C 194.81 515.296 194.43 514.401 194.177 513.605 L 136.709 513.605 L 136.709 519.572 L 196.962 519.472 L 196.962 519.472 Z  M 232.785 542.741 C 232.025 542.542 231.266 542.443 230.506 542.244 L 229.367 541.945 C 228.481 541.747 227.595 541.448 226.709 541.15 C 226.076 540.951 225.443 540.752 224.937 540.553 C 224.557 540.454 224.304 540.354 223.924 540.255 C 221.646 539.459 219.367 538.564 217.342 537.471 L 136.582 537.471 L 136.582 543.437 L 237.342 543.437 C 236.203 543.338 235.063 543.139 233.924 542.94 C 233.544 542.84 233.165 542.84 232.785 542.741 L 232.785 542.741 Z  M 15.823 362.656 C 15.823 362.755 15.949 362.954 15.949 363.054 L 15.949 362.556 L 15.823 362.556 L 15.823 362.656 Z  M 43.291 396.664 C 43.038 396.565 42.911 396.565 42.658 396.465 C 41.772 396.167 40.886 395.968 40.127 395.67 C 39.747 395.57 39.367 395.372 38.987 395.272 L 38.987 442.705 L 46.582 442.705 L 46.582 397.559 C 45.316 397.261 44.304 396.963 43.291 396.664 L 43.291 396.664 Z  M 24.684 387.615 C 24.304 387.317 23.924 387.118 23.544 386.82 L 23.544 442.705 L 31.139 442.705 L 31.139 391.692 C 29.241 390.698 27.468 389.604 25.823 388.411 C 25.443 388.112 25.063 387.914 24.684 387.615 Z  M 11.899 373.296 C 11.646 372.799 11.392 372.302 11.139 371.904 C 10.759 371.208 10.506 370.512 10.127 369.816 L 9.747 368.921 C 9.494 368.324 9.367 367.727 9.114 367.131 C 8.987 366.832 8.987 366.534 8.861 366.335 C 8.608 365.44 8.354 364.545 8.228 363.75 L 8.228 442.904 L 15.823 442.904 L 15.823 379.461 C 14.557 377.771 13.291 376.08 12.278 374.29 C 12.278 373.793 12.025 373.495 11.899 373.296 Z  M 15.823 187.344 L 15.949 186.847 C 15.949 186.946 15.949 187.145 15.823 187.245 L 15.823 187.344 Z  M 38.861 107.196 L 38.861 154.628 C 39.241 154.529 39.62 154.33 40 154.231 C 40.886 153.932 41.646 153.634 42.532 153.435 C 42.785 153.336 42.911 153.336 43.165 153.236 C 44.177 152.938 45.316 152.64 46.329 152.441 L 46.329 107.295 L 38.861 107.295 L 38.861 107.196 Z  M 23.544 107.196 L 23.544 163.081 C 23.924 162.782 24.304 162.484 24.684 162.285 C 25.063 161.987 25.443 161.788 25.823 161.49 C 27.468 160.297 29.367 159.203 31.139 158.208 L 31.139 107.295 L 23.544 107.295 L 23.544 107.196 Z  M 8.354 107.196 L 8.354 186.35 C 8.481 185.455 8.734 184.56 8.987 183.764 C 9.114 183.466 9.114 183.168 9.241 182.969 C 9.494 182.372 9.62 181.775 9.873 181.179 L 10.253 180.284 C 10.506 179.588 10.886 178.892 11.266 178.196 C 11.519 177.698 11.772 177.201 12.025 176.803 C 12.152 176.505 12.278 176.306 12.405 176.107 C 13.418 174.317 14.684 172.528 15.949 170.937 L 15.949 107.494 L 8.354 107.494 L 8.354 107.196 L 8.354 107.196 Z  M 684.177 187.046 L 684.177 186.847 L 684.177 187.344 L 684.304 187.344 C 684.304 187.344 684.304 187.245 684.177 187.046 Z  M 653.671 107.295 L 653.671 152.441 C 654.81 152.739 655.823 152.938 656.835 153.236 C 657.089 153.336 657.215 153.336 657.468 153.435 C 658.354 153.734 659.241 153.932 660 154.231 C 660.38 154.33 660.759 154.529 661.139 154.628 L 661.139 107.295 L 653.671 107.295 Z  M 691.772 107.295 L 684.177 107.295 L 684.177 170.738 C 685.443 172.428 686.709 174.119 687.722 175.909 C 687.848 176.107 687.975 176.406 688.101 176.605 C 688.354 177.102 688.608 177.599 688.861 177.997 C 689.241 178.693 689.494 179.389 689.873 180.085 L 690.253 180.98 C 690.506 181.577 690.633 182.173 690.886 182.77 C 691.013 183.068 691.013 183.366 691.139 183.565 C 691.392 184.46 691.646 185.355 691.772 186.151 L 691.772 107.295 L 691.772 107.295 Z  M 668.987 107.295 L 668.987 158.208 C 670.886 159.203 672.658 160.297 674.304 161.49 C 674.684 161.788 675.063 161.987 675.443 162.285 C 675.823 162.584 676.203 162.782 676.582 163.081 L 676.582 107.295 L 668.987 107.295 Z  M 684.304 362.556 L 684.177 363.054 L 684.177 362.855 C 684.304 362.855 684.304 362.656 684.304 362.556 Z  M 674.304 388.51 C 672.658 389.703 670.759 390.797 668.987 391.792 L 668.987 442.705 L 676.582 442.705 L 676.582 386.82 C 676.203 387.118 675.823 387.416 675.443 387.615 L 674.304 388.51 Z  M 691.139 366.236 C 691.013 366.534 691.013 366.832 690.886 367.131 C 690.633 367.727 690.506 368.324 690.253 368.921 L 689.873 369.816 C 689.62 370.512 689.241 371.208 688.861 371.904 C 688.608 372.401 688.354 372.898 688.101 373.296 C 687.975 373.495 687.848 373.793 687.722 373.992 C 686.709 375.782 685.443 377.572 684.177 379.163 L 684.177 442.605 L 691.772 442.605 L 691.772 363.451 C 691.646 364.545 691.392 365.44 691.139 366.236 L 691.139 366.236 Z  M 657.468 396.565 C 657.215 396.664 656.962 396.664 656.835 396.764 C 655.823 397.062 654.684 397.36 653.671 397.559 L 653.671 442.705 L 661.266 442.705 L 661.266 395.272 C 660.886 395.372 660.506 395.57 660.127 395.67 L 657.468 396.565 L 657.468 396.565 Z "
                                                fill="rgb(247,148,29)" />
                                            <path
                                                d=" M 255.949 6.563 L 341.772 6.563 L 334.177 12.529 L 274.937 12.529 C 269.241 9.745 262.785 7.657 255.949 6.662 L 255.949 6.563 Z  M 341.139 24.462 L 335.316 19.888 L 333.544 18.496 L 284.557 18.496 C 286.835 20.286 288.987 22.374 290.886 24.462 L 341.139 24.462 Z  M 364.81 11.535 L 366.076 12.529 L 425.316 12.529 C 431.013 9.745 437.468 7.657 444.304 6.662 L 444.304 6.563 L 358.481 6.563 L 364.81 11.535 Z  M 415.696 18.496 L 366.709 18.496 L 364.937 19.888 L 359.114 24.462 L 409.367 24.462 C 411.266 22.374 413.291 20.385 415.696 18.496 Z  M 254.177 12.529 M 365.949 537.471 L 364.684 538.465 L 358.354 543.437 L 444.177 543.437 L 444.177 543.338 C 437.342 542.343 430.886 540.354 425.19 537.471 L 365.949 537.471 Z  M 364.684 530.013 L 366.456 531.405 L 415.443 531.405 C 413.165 529.615 411.013 527.527 409.114 525.438 L 358.861 525.438 L 364.684 530.013 Z  M 333.418 531.405 L 341.013 525.438 L 290.759 525.438 C 288.861 527.527 286.835 529.615 284.43 531.405 L 333.418 531.405 Z  M 334.051 537.471 L 274.81 537.471 C 269.114 540.255 262.658 542.343 255.823 543.338 L 255.823 543.437 L 341.646 543.437 L 335.316 538.465 L 334.051 537.471 Z  M 8.354 281.513 L 8.354 348.933 L 8.481 348.933 C 9.747 343.564 12.278 338.492 15.949 334.017 L 15.949 287.48 L 14.684 286.485 L 8.354 281.513 Z  M 25.443 286.485 L 23.671 287.877 L 23.671 326.361 C 25.949 324.571 28.608 322.88 31.266 321.389 L 31.266 281.911 L 25.443 286.485 Z  M 8.354 200.967 L 8.354 268.387 L 14.684 263.415 L 15.949 262.421 L 15.949 215.883 C 12.405 211.408 9.747 206.337 8.481 200.967 L 8.354 200.967 Z  M 23.544 261.924 L 25.316 263.316 L 31.139 267.89 L 31.139 228.413 C 28.481 226.921 25.823 225.33 23.544 223.441 L 23.544 261.924 Z  M 691.646 201.067 C 690.38 206.436 687.848 211.508 684.177 215.983 L 684.177 262.421 L 685.443 263.415 L 691.772 268.387 L 691.772 200.967 L 691.646 200.967 L 691.646 201.067 Z  M 668.861 267.99 L 674.684 263.415 L 676.456 262.023 L 676.456 223.54 C 674.177 225.33 671.519 227.02 668.861 228.512 L 668.861 267.99 Z  M 685.443 286.585 L 684.177 287.579 L 684.177 334.017 C 687.722 338.492 690.38 343.564 691.646 348.933 L 691.772 348.933 L 691.772 281.513 L 685.443 286.585 Z  M 668.861 282.01 L 668.861 321.488 C 671.519 322.98 674.177 324.571 676.456 326.46 L 676.456 287.977 L 674.684 286.585 L 668.861 282.01 Z  M 661.899 46.438 L 647.215 58.073 L 641.899 62.249 L 636.582 58.073 L 621.899 46.538 L 636.582 35.003 L 641.899 30.826 L 647.215 35.003 L 661.899 46.438 Z  M 651.139 46.538 L 641.772 39.179 L 632.405 46.538 L 641.772 53.896 L 651.139 46.538 Z  M 59.241 30.031 L 79.241 45.742 L 73.924 49.919 L 59.241 61.553 L 44.557 50.018 L 39.114 45.742 L 59.241 30.031 Z  M 68.608 45.742 L 59.241 38.384 L 49.873 45.742 L 59.241 53.101 L 68.608 45.742 Z  M 655.57 499.982 L 660.886 504.158 L 655.57 508.335 L 640.886 519.969 L 626.203 508.434 L 620.886 504.258 L 626.203 500.081 L 640.886 488.546 L 655.57 499.982 Z  M 650.253 504.258 L 640.886 496.899 L 631.519 504.258 L 640.886 511.616 L 650.253 504.258 Z  M 78.354 503.462 L 63.671 514.997 L 58.354 519.174 L 38.354 503.462 L 58.354 487.751 L 63.671 491.927 L 78.354 503.462 Z  M 67.595 503.462 L 58.228 496.104 L 48.861 503.462 L 58.228 510.821 L 67.595 503.462 Z "
                                                fill="rgb(27,117,188)" />
                                            <path
                                                d=" M 263.924 36.494 L 228.354 36.494 C 232.658 32.616 239.114 30.13 246.203 30.13 C 253.165 30.13 259.62 32.616 263.924 36.494 Z  M 210.38 36.494 L 218.861 36.494 C 224.304 29.036 234.43 24.064 246.203 24.064 C 257.848 24.064 268.101 29.136 273.544 36.494 L 282.025 36.494 C 275.949 25.655 262.278 18.098 246.203 18.098 C 230.127 17.999 216.329 25.655 210.38 36.494 L 210.38 36.494 Z  M 284.557 18.496 C 281.646 16.209 278.481 14.22 274.937 12.43 C 269.241 9.646 262.785 7.557 255.949 6.563 C 255.57 6.563 255.316 6.464 254.937 6.364 L 237.215 6.364 C 236.076 6.464 234.937 6.662 233.797 6.861 C 233.418 6.961 233.038 6.961 232.785 7.06 C 232.025 7.259 231.266 7.359 230.506 7.557 L 229.367 7.856 C 228.481 8.055 227.595 8.353 226.709 8.651 C 226.076 8.85 225.443 9.049 224.937 9.248 C 224.557 9.347 224.304 9.447 224.051 9.546 C 221.772 10.342 219.494 11.336 217.468 12.331 C 213.924 14.021 210.759 16.109 207.848 18.396 C 207.468 18.695 207.089 18.993 206.835 19.291 C 206.456 19.59 206.203 19.888 205.823 20.186 C 204.304 21.479 202.911 22.971 201.646 24.363 C 200 26.252 198.481 28.241 197.215 30.428 C 197.089 30.727 196.835 31.025 196.709 31.323 C 196.329 32.02 195.949 32.616 195.696 33.312 C 195.57 33.511 195.57 33.611 195.443 33.809 C 195.063 34.605 194.684 35.5 194.43 36.295 L 202.405 36.295 C 208.734 21.976 226.076 11.734 246.456 11.734 C 266.835 11.734 284.177 21.976 290.506 36.295 L 298.481 36.295 C 296.835 32.02 294.304 27.943 291.139 24.363 C 288.987 22.374 286.835 20.385 284.557 18.496 L 284.557 18.496 Z  M 237.975 12.529 L 238.608 12.529 L 238.608 12.43 C 238.354 12.43 238.101 12.43 237.975 12.529 Z  M 418.354 36.494 L 426.835 36.494 C 432.278 29.036 442.405 24.064 454.177 24.064 C 465.823 24.064 476.076 29.136 481.519 36.494 L 490 36.494 C 483.924 25.655 470.253 18.098 454.177 18.098 C 438.101 17.999 424.304 25.655 418.354 36.494 Z  M 505.063 34.008 C 504.937 33.809 504.937 33.71 504.81 33.511 C 504.43 32.815 504.177 32.119 503.797 31.522 C 503.671 31.224 503.418 30.926 503.291 30.627 C 502.025 28.539 500.506 26.55 498.861 24.562 C 497.595 23.07 496.203 21.678 494.684 20.385 C 494.304 20.087 494.051 19.788 493.671 19.49 C 493.291 19.192 493.038 18.894 492.658 18.595 C 489.747 16.308 486.582 14.319 483.038 12.529 C 480.886 11.535 478.734 10.541 476.456 9.745 C 476.203 9.646 475.823 9.546 475.57 9.447 C 474.937 9.248 474.304 9.049 473.797 8.85 C 472.911 8.552 472.025 8.353 471.139 8.055 L 470 7.756 C 469.241 7.557 468.481 7.458 467.722 7.259 C 467.342 7.16 466.962 7.16 466.709 7.06 C 465.57 6.861 464.43 6.662 463.418 6.563 L 445.696 6.563 C 445.316 6.563 445.063 6.662 444.684 6.762 C 437.848 7.756 431.392 9.745 425.696 12.629 C 422.152 14.319 418.987 16.408 416.076 18.695 C 413.797 20.485 411.646 22.573 409.747 24.661 C 406.582 28.34 404.051 32.318 402.405 36.594 L 410.38 36.594 C 416.709 22.274 434.051 12.032 454.43 12.032 C 457.215 12.032 459.873 12.231 462.532 12.629 L 462.658 12.629 C 479.367 14.916 493.038 24.263 498.481 36.594 L 506.456 36.594 C 505.823 35.599 505.443 34.804 505.063 34.008 L 505.063 34.008 Z  M 454.051 30.13 C 446.962 30.13 440.633 32.616 436.203 36.494 L 471.772 36.494 C 467.468 32.616 461.139 30.13 454.051 30.13 Z  M 445.823 12.529 M 366.076 12.529 L 370.253 15.811 L 366.709 18.595 L 364.937 19.987 L 359.114 24.562 L 350.253 31.522 L 341.392 24.562 L 335.57 19.987 L 333.797 18.595 L 330.253 15.811 L 334.43 12.529 L 342.025 6.563 L 350.38 0 L 358.734 6.563 L 365.063 11.535 L 366.076 12.529 L 366.076 12.529 Z  M 359.494 15.711 L 350.127 8.353 L 340.759 15.711 L 350.127 23.07 L 359.494 15.711 Z  M 454.051 519.87 C 461.139 519.87 467.468 517.384 471.899 513.506 L 436.329 513.506 C 440.506 517.384 446.835 519.87 454.051 519.87 Z  M 454.051 531.902 C 470 531.902 483.797 524.345 489.873 513.506 L 481.392 513.506 C 475.823 520.964 465.696 525.936 454.051 525.936 C 442.405 525.936 432.152 520.864 426.709 513.506 L 418.228 513.506 C 424.177 524.345 437.975 531.902 454.051 531.902 Z  M 498.101 513.506 C 492.532 525.836 478.987 535.184 462.278 537.471 C 462.025 537.471 461.772 537.57 461.646 537.57 C 459.241 537.868 456.709 538.067 454.177 538.067 C 433.797 538.067 416.456 527.825 410.127 513.506 L 402.152 513.506 C 403.797 517.782 406.329 521.859 409.494 525.438 C 411.392 527.527 413.418 529.615 415.823 531.405 C 418.734 533.692 421.899 535.681 425.443 537.471 C 431.139 540.255 437.595 542.343 444.43 543.338 C 444.81 543.338 445.063 543.437 445.443 543.536 L 463.165 543.536 C 464.304 543.437 465.443 543.238 466.582 543.039 C 466.962 542.94 467.342 542.94 467.595 542.84 C 468.354 542.641 469.114 542.542 469.873 542.343 L 471.013 542.045 C 471.899 541.846 472.785 541.548 473.671 541.249 C 474.304 541.05 474.937 540.852 475.443 540.653 C 475.823 540.553 476.076 540.454 476.456 540.354 C 478.734 539.559 481.013 538.664 483.038 537.57 C 486.582 535.88 489.747 533.791 492.658 531.504 C 493.038 531.206 493.418 530.908 493.671 530.609 C 494.051 530.311 494.304 530.013 494.684 529.714 C 496.203 528.422 497.595 526.93 498.861 525.538 C 500.506 523.649 502.025 521.66 503.291 519.472 C 503.418 519.174 503.671 518.875 503.797 518.577 C 504.177 517.881 504.557 517.284 504.81 516.588 C 504.937 516.389 504.937 516.29 505.063 516.091 C 505.443 515.296 505.823 514.401 506.076 513.605 L 498.101 513.605 L 498.101 513.506 Z  M 246.076 531.902 C 262.025 531.902 275.823 524.345 281.899 513.506 L 273.291 513.506 C 267.848 520.964 257.722 525.936 245.949 525.936 C 234.304 525.936 224.051 520.864 218.608 513.506 L 210.127 513.506 C 216.329 524.345 230 531.902 246.076 531.902 L 246.076 531.902 Z  M 246.076 538.067 C 243.418 538.067 240.886 537.868 238.354 537.57 C 238.228 537.57 237.975 537.57 237.848 537.471 C 221.139 535.184 207.468 525.836 202.025 513.506 L 194.051 513.506 C 194.43 514.401 194.684 515.196 195.063 515.992 C 195.19 516.191 195.19 516.29 195.316 516.489 C 195.696 517.185 196.076 517.881 196.329 518.478 C 196.456 518.776 196.709 519.074 196.835 519.373 C 198.101 521.461 199.62 523.45 201.266 525.438 C 202.532 526.93 203.924 528.322 205.443 529.615 C 205.823 529.913 206.076 530.212 206.456 530.51 C 206.835 530.808 207.089 531.106 207.468 531.405 C 210.38 533.692 213.544 535.681 217.089 537.471 C 219.241 538.465 221.392 539.459 223.671 540.255 C 223.924 540.354 224.304 540.454 224.684 540.553 C 225.316 540.752 225.949 540.951 226.456 541.15 C 227.342 541.448 228.228 541.647 229.114 541.945 L 230.253 542.244 C 231.013 542.443 231.772 542.542 232.532 542.741 C 232.911 542.84 233.291 542.84 233.544 542.94 C 234.684 543.139 235.823 543.338 236.962 543.437 L 254.684 543.437 C 255.063 543.437 255.316 543.338 255.696 543.238 C 262.532 542.244 268.987 540.255 274.684 537.371 C 278.228 535.681 281.392 533.592 284.304 531.305 C 286.582 529.515 288.734 527.427 290.633 525.339 C 293.797 521.66 296.329 517.682 297.975 513.406 L 290 513.406 C 283.671 527.825 266.329 538.067 246.076 538.067 L 246.076 538.067 Z  M 246.076 519.87 C 253.165 519.87 259.494 517.384 263.924 513.506 L 228.354 513.506 C 232.532 517.384 238.987 519.87 246.076 519.87 Z  M 254.304 537.471 M 366.582 531.405 L 370.127 534.189 L 365.949 537.471 L 364.684 538.465 L 358.354 543.437 L 350 550 L 341.646 543.437 L 335.316 538.465 L 334.051 537.471 L 329.873 534.189 L 333.418 531.405 L 341.013 525.438 L 349.873 518.478 L 358.734 525.438 L 364.557 530.013 L 366.582 531.405 Z  M 359.367 534.189 L 350 526.831 L 340.633 534.189 L 350 541.548 L 359.367 534.189 Z  M 46.456 315.72 C 41.013 317.013 35.823 319.002 31.266 321.488 C 28.608 322.98 25.949 324.571 23.671 326.46 C 20.759 328.747 18.228 331.233 15.949 334.017 C 12.405 338.492 9.747 343.564 8.481 348.933 C 8.481 349.232 8.354 349.43 8.228 349.729 L 8.228 363.65 C 8.354 364.545 8.608 365.44 8.861 366.236 C 8.987 366.534 8.987 366.832 9.114 367.031 C 9.367 367.628 9.494 368.225 9.747 368.821 L 10.127 369.716 C 10.38 370.412 10.759 371.108 11.139 371.804 C 11.392 372.302 11.646 372.799 11.899 373.197 C 12.025 373.495 12.152 373.694 12.278 373.893 C 13.291 375.683 14.557 377.472 15.823 379.063 C 17.975 381.848 20.633 384.334 23.544 386.621 C 23.924 386.919 24.304 387.218 24.684 387.416 C 25.063 387.715 25.443 387.914 25.823 388.212 C 27.468 389.405 29.367 390.499 31.139 391.493 C 33.544 392.786 36.076 393.979 38.861 394.974 C 39.241 395.073 39.62 395.272 40 395.372 C 40.886 395.67 41.646 395.968 42.532 396.167 C 42.785 396.266 42.911 396.266 43.165 396.366 C 44.177 396.664 45.316 396.963 46.329 397.161 L 46.329 390.897 C 30.506 386.521 18.481 375.583 15.696 362.258 L 15.696 362.159 C 15.316 360.269 15.063 358.281 15.063 356.292 C 15.063 340.282 28.101 326.659 46.329 321.687 L 46.329 315.72 L 46.456 315.72 Z  M 46.456 370.611 L 46.456 342.669 C 41.519 346.05 38.354 351.121 38.354 356.69 C 38.354 362.159 41.519 367.131 46.456 370.611 Z  M 46.456 328.548 C 32.658 333.321 23.038 344.061 23.038 356.69 C 23.038 369.219 32.658 380.058 46.456 384.831 L 46.456 378.169 C 36.962 373.893 30.633 365.937 30.633 356.69 C 30.633 347.541 37.089 339.487 46.456 335.211 L 46.456 328.548 Z  M 46.456 207.232 L 46.456 179.289 C 41.519 182.67 38.354 187.742 38.354 193.31 C 38.354 198.78 41.519 203.851 46.456 207.232 Z  M 46.456 165.169 C 32.658 169.942 23.038 180.682 23.038 193.31 C 23.038 205.84 32.658 216.679 46.456 221.452 L 46.456 214.69 C 36.962 210.414 30.633 202.459 30.633 193.211 C 30.633 184.063 37.089 176.008 46.456 171.732 L 46.456 165.169 L 46.456 165.169 Z  M 15.949 215.883 C 18.101 218.668 20.759 221.153 23.671 223.441 C 25.949 225.231 28.608 226.921 31.266 228.413 C 35.949 230.899 41.013 232.887 46.456 234.18 L 46.456 227.915 C 28.228 222.943 15.19 209.32 15.19 193.31 C 15.19 191.322 15.443 189.333 15.823 187.444 L 15.823 187.245 C 18.608 173.92 30.633 163.081 46.456 158.705 L 46.456 152.441 C 45.316 152.739 44.304 152.938 43.291 153.236 C 43.038 153.336 42.911 153.336 42.658 153.435 C 41.772 153.734 40.886 153.932 40.127 154.231 C 39.747 154.33 39.367 154.529 38.987 154.628 C 36.329 155.623 33.797 156.816 31.266 158.109 C 29.367 159.103 27.595 160.197 25.949 161.39 C 25.57 161.689 25.19 161.888 24.81 162.186 C 24.43 162.484 24.051 162.683 23.671 162.981 C 20.759 165.268 18.228 167.754 15.949 170.539 C 14.684 172.229 13.418 173.92 12.405 175.71 C 12.278 175.909 12.152 176.207 12.025 176.406 C 11.772 176.903 11.519 177.4 11.266 177.798 C 10.886 178.494 10.633 179.19 10.253 179.886 L 9.873 180.781 C 9.62 181.378 9.494 181.974 9.241 182.571 C 9.114 182.869 9.114 183.168 8.987 183.366 C 8.734 184.261 8.481 185.156 8.354 185.952 L 8.354 199.873 C 8.354 200.172 8.481 200.371 8.608 200.669 C 9.747 206.337 12.278 211.408 15.949 215.883 L 15.949 215.883 Z  M 0 274.95 L 8.354 268.387 L 14.684 263.415 L 15.949 262.421 L 20.127 259.139 L 23.671 261.924 L 25.443 263.316 L 31.266 267.89 L 40.127 274.851 L 31.266 281.812 L 25.443 286.386 L 23.671 287.778 L 20.127 290.562 L 15.949 287.281 L 14.684 286.286 L 8.354 281.314 L 0 274.95 Z  M 10.759 274.95 L 20.127 282.309 L 29.494 274.95 L 20.127 267.592 L 10.759 274.95 L 10.759 274.95 Z  M 691.772 363.65 L 691.772 349.729 C 691.772 349.43 691.646 349.232 691.519 348.933 C 690.253 343.564 687.722 338.492 684.051 334.017 C 681.899 331.233 679.241 328.747 676.329 326.46 C 674.051 324.67 671.392 322.98 668.734 321.488 C 664.051 319.002 658.987 317.013 653.544 315.72 L 653.544 321.985 C 671.772 326.957 684.81 340.58 684.81 356.59 C 684.81 358.579 684.557 360.568 684.177 362.457 C 684.177 362.556 684.177 362.656 684.051 362.855 C 681.139 376.08 669.241 386.919 653.418 391.195 L 653.418 397.46 C 654.43 397.161 655.57 396.963 656.582 396.664 C 656.835 396.565 657.089 396.565 657.215 396.465 C 658.101 396.167 658.987 395.968 659.747 395.67 C 660.127 395.57 660.506 395.372 660.886 395.272 C 663.544 394.278 666.076 393.084 668.608 391.792 C 670.506 390.797 672.278 389.703 673.924 388.51 C 674.304 388.212 674.684 388.013 675.063 387.715 C 675.443 387.416 675.823 387.218 676.203 386.919 C 679.114 384.632 681.646 382.146 683.924 379.362 C 685.19 377.671 686.456 375.981 687.468 374.191 C 687.595 373.992 687.722 373.694 687.848 373.495 C 688.101 372.998 688.354 372.5 688.608 372.103 C 688.987 371.407 689.241 370.711 689.62 370.014 L 690 369.12 C 690.253 368.523 690.38 367.926 690.633 367.33 C 690.759 367.031 690.759 366.733 690.886 366.435 C 691.392 365.44 691.646 364.545 691.772 363.65 L 691.772 363.65 Z  M 653.671 342.669 L 653.671 370.611 C 658.608 367.23 661.772 362.159 661.772 356.59 C 661.772 351.121 658.608 346.149 653.671 342.669 Z  M 653.671 384.831 C 667.468 380.058 677.089 369.318 677.089 356.69 C 677.089 344.16 667.468 333.321 653.671 328.548 L 653.671 335.211 C 663.165 339.487 669.494 347.442 669.494 356.69 C 669.494 365.838 663.038 373.893 653.671 378.169 L 653.671 384.831 Z  M 684.177 350.325 M 700 275.05 L 691.772 281.613 L 685.443 286.585 L 684.177 287.579 L 680 290.861 L 676.456 288.076 L 674.684 286.684 L 668.861 282.11 L 660 275.149 L 668.861 268.188 L 674.684 263.614 L 676.456 262.222 L 680 259.438 L 684.177 262.719 L 685.443 263.714 L 691.772 268.686 L 700 275.05 Z  M 689.367 275.05 L 680 267.691 L 670.633 275.05 L 680 282.408 L 689.367 275.05 Z  M 563.671 6.563 L 563.671 12.529 L 584.43 12.529 L 584.43 18.595 L 563.671 18.595 L 563.671 24.562 L 584.43 24.562 L 584.43 30.627 L 563.671 30.627 L 563.671 36.594 L 592.025 36.594 L 592.025 6.563 L 563.671 6.563 L 563.671 6.563 Z  M 684.177 107.295 L 691.772 107.295 L 691.772 85.021 L 653.544 85.021 L 653.544 107.295 L 661.139 107.295 L 661.139 90.987 L 668.861 90.987 L 668.861 107.295 L 676.456 107.295 L 676.456 90.987 L 684.177 90.987 L 684.177 107.295 Z  M 597.595 46.538 L 602.911 42.361 L 622.152 27.246 L 606.709 15.115 L 606.709 36.594 L 599.114 36.594 L 599.114 6.563 L 606.582 6.563 L 627.342 22.871 L 635.19 16.706 L 640.506 12.529 L 645.823 16.706 L 649.494 19.59 L 666.076 6.563 L 671.392 10.739 L 655.19 23.766 L 661.519 28.738 L 678.101 15.711 L 683.418 19.888 L 666.835 32.914 L 673.165 37.886 L 689.747 24.86 L 695.063 29.036 L 678.481 42.063 L 678.734 42.262 L 684.051 46.438 L 678.734 50.615 L 670.886 56.78 L 691.772 73.187 L 691.772 79.054 L 653.671 79.054 L 653.671 73.088 L 681.013 73.088 L 665.57 60.956 L 646.329 76.071 L 641.013 80.248 L 635.696 76.071 L 603.165 50.515 L 597.595 46.538 L 597.595 46.538 Z  M 608.354 46.538 L 640.886 72.094 L 673.418 46.538 L 640.886 20.982 L 608.354 46.538 L 608.354 46.538 Z  M 102.405 46.538 L 97.089 50.714 L 64.557 76.27 L 59.241 80.447 L 53.924 76.27 L 34.557 61.155 L 19.114 73.287 L 46.456 73.287 L 46.456 79.253 L 8.354 79.253 L 8.354 73.386 L 29.114 57.078 L 21.392 50.714 L 16.076 46.538 L 21.392 42.361 L 25.063 39.477 L 8.354 26.351 L 13.671 22.175 L 30.253 35.202 L 36.582 30.23 L 20 17.203 L 25.316 13.027 L 41.899 26.053 L 48.228 21.081 L 31.646 8.055 L 36.962 3.878 L 53.544 16.905 L 53.797 16.706 L 59.114 12.529 L 64.43 16.706 L 72.278 22.871 L 93.165 6.464 L 100.633 6.464 L 100.633 36.395 L 93.038 36.395 L 93.038 15.015 L 77.848 27.147 L 97.089 42.262 L 102.405 46.538 L 102.405 46.538 Z  M 91.772 46.538 L 59.241 20.982 L 26.709 46.538 L 59.241 72.094 L 91.772 46.538 L 91.772 46.538 Z  M 108.228 6.563 L 108.228 36.594 L 136.582 36.594 L 136.582 30.627 L 115.823 30.627 L 115.823 24.562 L 136.582 24.562 L 136.582 18.595 L 115.823 18.595 L 115.823 12.529 L 136.582 12.529 L 136.582 6.563 L 108.228 6.563 L 108.228 6.563 Z  M 15.949 107.196 L 15.949 90.888 L 23.671 90.888 L 23.671 107.196 L 31.266 107.196 L 31.266 90.888 L 38.987 90.888 L 38.987 107.196 L 46.582 107.196 L 46.582 84.921 L 8.354 84.921 L 8.354 107.196 L 15.949 107.196 Z  M 691.772 476.713 L 670.886 493.121 L 678.734 499.286 L 684.051 503.462 L 678.734 507.639 L 675.063 510.523 L 691.646 523.549 L 686.329 527.726 L 669.747 514.699 L 663.418 519.671 L 680 532.698 L 674.684 536.874 L 658.101 523.947 L 651.772 528.919 L 668.354 541.945 L 663.038 546.122 L 646.456 533.095 L 646.203 533.294 L 640.886 537.471 L 635.57 533.294 L 627.722 527.129 L 606.835 543.536 L 599.367 543.536 L 599.367 513.605 L 606.962 513.605 L 606.962 535.084 L 622.405 522.952 L 603.165 507.838 L 597.848 503.661 L 603.165 499.485 L 635.696 473.929 L 641.013 469.752 L 646.329 473.929 L 665.57 489.044 L 681.013 476.912 L 653.671 476.912 L 653.671 470.946 L 691.772 470.946 L 691.772 476.713 L 691.772 476.713 Z  M 640.886 477.906 L 608.354 503.462 L 640.886 529.018 L 673.418 503.462 L 640.886 477.906 Z  M 584.304 513.506 L 563.544 513.506 L 563.544 519.472 L 584.304 519.472 L 584.304 525.538 L 563.544 525.538 L 563.544 531.504 L 584.304 531.504 L 584.304 537.57 L 563.544 537.57 L 563.544 543.536 L 591.899 543.536 L 591.899 513.506 L 584.304 513.506 Z  M 653.671 464.979 L 691.899 464.979 L 691.899 442.705 L 684.304 442.705 L 684.304 459.013 L 676.582 459.013 L 676.582 442.705 L 668.987 442.705 L 668.987 459.013 L 661.266 459.013 L 661.266 442.705 L 653.671 442.705 L 653.671 464.979 Z  M 23.544 464.979 L 46.456 464.979 L 46.456 442.705 L 38.861 442.705 L 38.861 459.013 L 31.139 459.013 L 31.139 442.705 L 23.544 442.705 L 23.544 459.013 L 15.823 459.013 L 15.823 442.705 L 8.228 442.705 L 8.228 464.979 L 23.544 464.979 Z  M 115.696 513.506 L 108.101 513.506 L 108.101 543.536 L 136.456 543.536 L 136.456 537.57 L 115.696 537.57 L 115.696 531.504 L 136.456 531.504 L 136.456 525.538 L 115.696 525.538 L 115.696 519.472 L 136.456 519.472 L 136.456 513.506 L 115.696 513.506 L 115.696 513.506 Z  M 102.405 503.462 L 97.089 507.639 L 77.848 522.754 L 93.291 534.885 L 93.291 513.406 L 100.886 513.406 L 100.886 543.338 L 93.418 543.338 L 72.658 527.029 L 64.81 533.195 L 59.494 537.371 L 54.177 533.195 L 50.506 530.311 L 33.924 543.338 L 28.608 539.161 L 45.19 526.135 L 38.861 521.163 L 22.278 534.189 L 16.962 530.013 L 33.165 516.986 L 26.835 512.014 L 10.253 525.041 L 4.937 520.964 L 21.519 507.937 L 21.266 507.738 L 15.949 503.562 L 21.266 499.385 L 29.114 493.22 L 8.228 476.813 L 8.228 470.946 L 46.329 470.946 L 46.329 476.912 L 19.114 476.912 L 34.557 489.044 L 53.797 473.929 L 59.114 469.752 L 64.43 473.929 L 96.962 499.485 L 102.405 503.462 L 102.405 503.462 Z  M 91.772 503.462 L 59.241 477.906 L 26.709 503.462 L 59.241 529.018 L 91.772 503.462 Z  M 684.177 199.774 M 653.671 221.452 C 667.468 216.679 677.089 205.939 677.089 193.31 C 677.089 180.781 667.468 169.942 653.671 165.169 L 653.671 171.831 C 663.165 176.107 669.494 184.063 669.494 193.31 C 669.494 202.459 663.038 210.513 653.671 214.789 L 653.671 221.452 L 653.671 221.452 Z  M 653.671 179.389 L 653.671 207.331 C 658.608 203.95 661.772 198.879 661.772 193.31 C 661.772 187.742 658.608 182.77 653.671 179.389 Z  M 676.456 223.54 C 679.367 221.253 681.899 218.767 684.177 215.983 C 687.722 211.508 690.38 206.436 691.646 201.067 C 691.646 200.768 691.772 200.57 691.899 200.271 L 691.899 186.35 C 691.772 185.455 691.519 184.56 691.266 183.764 C 691.139 183.466 691.139 183.168 691.013 182.969 C 690.759 182.372 690.633 181.775 690.38 181.179 L 690 180.284 C 689.747 179.588 689.367 178.892 688.987 178.196 C 688.734 177.698 688.481 177.201 688.228 176.803 C 688.101 176.505 687.975 176.306 687.848 176.107 C 686.835 174.317 685.696 172.528 684.304 170.937 C 682.152 168.152 679.494 165.666 676.582 163.379 C 676.203 163.081 675.823 162.782 675.443 162.584 C 675.063 162.285 674.684 162.086 674.304 161.788 C 672.658 160.595 670.759 159.501 668.987 158.507 C 666.582 157.214 664.051 156.021 661.266 155.026 C 660.886 154.927 660.506 154.728 660.127 154.628 C 659.241 154.33 658.481 154.032 657.595 153.833 C 657.342 153.734 657.215 153.734 656.962 153.634 C 655.949 153.336 654.81 153.037 653.797 152.839 L 653.797 159.103 C 669.62 163.479 681.519 174.218 684.43 187.444 C 684.43 187.543 684.43 187.642 684.557 187.841 C 684.937 189.731 685.19 191.719 685.19 193.708 C 685.19 209.718 672.152 223.341 653.924 228.313 L 653.924 234.578 C 659.367 233.285 664.557 231.296 669.114 228.81 C 671.646 227.02 674.177 225.33 676.456 223.54 L 676.456 223.54 Z "
                                                fill="rgb(158,31,99)" />
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="col-md-6">
                                <!-- cards-->
                                <div class="card-deck my-4">
                                    <div class="card cardgold">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <img class="card-img-top d-block mx-auto my-1" src="../img/world-cup.png"
                                                    alt="Monasterio de Santa María del Puig">
                                            </div>
                                            <div class="col-md-9 pl-0">
                                                <div class="card-body ">
                                                    <h5 class="card-title">Jugador oro</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-deck my-4">
                                    <div class="card cardsilver">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <img class="card-img-top d-block mx-auto my-1" src="../img/world-cup.png"
                                                    alt="Monasterio de Santa María del Puig">
                                            </div>
                                            <div class="col-md-9 pl-0">
                                                <div class="card-body">
                                                    <h5 class="card-title">Jugador plata</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-deck my-4">
                                    <div class="card cardbronze">
                                        <div class="row align-items-center">
                                            <div class="col-md-3">
                                                <img class="card-img-top d-block mx-auto my-1" src="../img/world-cup.png"
                                                    alt="Monasterio de Santa María del Puig">
                                            </div>
                                            <div class="col-md-9 pl-0">
                                                <div class="card-body">
                                                    <h5 class="card-title">Jugador bronce</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!--Estadísticas variadas-->
                <div class="row my-4">
                    <div class="container-fluid">
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

                <h2>Reglas del juego</h2>

                <p>A continuación se exponen las reglas del juego sacadas de la página WikiHow.</p>

                <!--Reglas del juego FALTA ADECUARLO AL FORMATO MOVIL-->
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

{{-- @section('content')
    <aside class="sidebar">
        <ul>
            <li class="input-menu"><a href="{{ route('register') }}">Registro</a></li>
            <li class="input-menu upper-margin"><a href="{{ route('login') }}">Login</a></li>
            <li class="input-menu upper-margin"><a v-on:click.prevent="ranking" href="#">Ranking usuarios</a></li>
            <li class="input-menu"><a v-on:click.prevent="currentGames" href="#">Últimas partidas en juego</a></li>
            <li class="input-menu"><a v-on:click.prevent="generalInfo" href="#">Información sobre el sistema</a></li>
        </ul>
    </aside>
    <card-container-component :cards="c_cards"></card-container-component>
@endsection --}}
