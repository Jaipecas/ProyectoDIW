@extends('layouts.app',
    ['title' => 'Info Scrabble', 'css_files' => ['test_scr_index'], 
    'js_files' => ['test_scr_index']])

    @section('content')
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
    @endsection
    
