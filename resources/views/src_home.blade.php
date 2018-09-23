@extends('layouts.app',
    ['title' => 'Dashboard', 'css_files' => ['test_scr_dashboard'], 
    'js_files' => ['test_scr_home']])

@section('content')
@if (is_null($user->avatar))
    <user-data-component :user="{{ json_encode($user) }}" :avatar="null"></user-data-component> 
@else
    <user-data-component :user="{{ json_encode($user) }}" :avatar="{{ json_encode(asset('storage/'.$user->avatar)) }}"></user-data-component> 
@endif
<p class="variables-title">Estadísticas</p>
<card-container-component :variables="{{ json_encode($statistics) }}"></card-container-component> 
<aside class="sidebar">
    <ul>
        
        <li class="input-menu" id="b04">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </li>
        <li class="input-menu upper-margin" id="b05"><a>Dashboard</a></li>
        <li class="input-menu upper-margin" id="b06"><a>Estadísticas usuarios</a></li>
        <li class="input-menu" id="b07"><a>Últimas partidas en juego</a></li>
    </ul>
</aside>
<card-container-component :cards="cards"></card-container-component> 
<!-- form oculto para realizar el logout via POST de manera síncrona. Podría haber utilizado la función post
    que está definida en test_helpers -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

@endsection
