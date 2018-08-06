@extends('layouts.app',
    ['css_files' => ['test_scr_index'], 'title' => 'Info Scrabble'])

    @section('content')
        <aside class="sidebar">
            <ul>
                <li class="input-menu"><a href="{{ route('register') }}">Registro</a></li>
                <li class="input-menu upper-margin"><a href="{{ route('login') }}">Login</a></li>
                <li class="input-menu" id="b01">Login (user1)</li>
                <li class="input-menu" id="b02">Login (user2)</li>
                <li class="input-menu" id="b03"><a href="#">Login erroneo</a></li>
                <li class="input-menu upper-margin" id="b04"><a>Dashboard</a></li>
                <li class="input-menu upper-margin" id="b05"><a>Estadísticas usuarios</a></li>
                <li class="input-menu" id="b06"><a>Últimas partidas en juego</a></li>
            </ul>
        </aside>
        <card-container-component :cards="cards"></card-container-component> 
    @endsection
    
