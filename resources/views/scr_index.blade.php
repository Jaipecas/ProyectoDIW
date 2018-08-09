@extends('layouts.app',
    ['title' => 'Info Scrabble', 'css_files' => ['test_scr_index'], 
    'js_files' => []])

    @section('content')
        <aside class="sidebar">
            <ul>
                <li class="input-menu"><a href="{{ route('register') }}">Registro</a></li>
                <li class="input-menu upper-margin"><a href="{{ route('login') }}">Login</a></li>
                <li class="input-menu" id="b01">Login (user1)</li>
                <li class="input-menu" id="b02">Login (user2)</li>
                <li class="input-menu" id="b03"><a href="#">Login erroneo</a></li>
                <li class="input-menu" id="b04"><a href="#">Logout</a></li>
                <li class="input-menu upper-margin" id="b05"><a>Dashboard</a></li>
                <li class="input-menu upper-margin" id="b06"><a>Estadísticas usuarios</a></li>
                <li class="input-menu" id="b07"><a>Últimas partidas en juego</a></li>
            </ul>
        </aside>
        <card-container-component :cards="cards"></card-container-component> 
    @endsection
    
