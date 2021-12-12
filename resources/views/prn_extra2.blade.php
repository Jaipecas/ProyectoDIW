@extends('layouts.app',
['title' => 'Info Imprenta', 'css_files' => [],
'js_files' => []])

<link href="{{ asset('css/trabajosImprenta.css') }}" rel="stylesheet">

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <h2>LOS TRABAJOS EN UNA IMPRENTA DEL SIGLO XV</h2>

                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#componedor">Componedor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#entintador">Entintador</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#tirador">Tirador</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="componedor" class="tab-pane fade in active">
                        <h3>HOME</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                    <div id="entintador" class="tab-pane fade">
                        <h3>Menu 1</h3>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</p>
                    </div>
                    <div id="tirador" class="tab-pane fade">
                        <h3>Menu 2</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                            totam rem aperiam.</p>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-md-4">
                @include('alerts')
                @include('news')
            </div>
        </div>
    </div>
    <!--Avisos y Noticias-->


@endsection
