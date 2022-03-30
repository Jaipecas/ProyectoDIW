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
                <p>El siguiente mapa muestra diversos lugares emblemáticos de las primeras imprentas en València con el
                    procedimiento de Gutenberg.</p>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="img-fluid"
                        src="https://www.google.com/maps/d/embed?mid=1PK8f2GOWa0F1LGdwIEBuJ4rhgxmCh_ab&ehbc=2E312F"
                        width="1000" height="880"></iframe>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                @include('alerts')
                @include('news')
            </div>
        </div>
    @endsection
