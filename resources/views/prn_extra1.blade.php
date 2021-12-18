@extends('layouts.app',
['title' => 'Info Imprenta', 'css_files' => [],
'js_files' => []])

@section('styles')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 mt-3">
                <p>La idea de Gutenberg de las letras individuales grabadas en metal se difunde
                    por Europa. Comienza en MAINZ (hacia 1450) y, posteriormente, van apareciendo las principales ciudades
                    en donde se instalan imprentas:</p>
                <ul>
                    <li>1469 Venecia (Italia)</li>
                    <li>1470 París (Francia)</li>
                    <li>1471 Brujas (Holanda)</li>
                    <li>1472 Segovia (España)</li>
                    <li>1474 Valencia (España)</li>
                    <li>1476 Westminster (Gran Bretaña)</li>
                </ul>
                <img class="img-fluid" src="../img/11 Europa e imprenta.png" alt="mapa europa imprenta">
            </div>
            <div class="col-lg-3 col-md-12">
                @include('alerts')
                @include('news')
            </div>
        </div>
    </div>
@endsection
