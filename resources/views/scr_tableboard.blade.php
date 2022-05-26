@extends('layouts.app', ['title' => 'Tableboard', 'css_files' => ['scr_tableboard'], 'js_files' => ['scr_tableboard']])

@section('content')
    <tableboard-component :user="{{ json_encode($user) }}" :opponent="{{ json_encode($opponent) }}"
        :game="{{ json_encode($game) }}">
    </tableboard-component>

    <!-- form oculto para realizar el logout via POST de manera síncrona. Podría haber utilizado la función post
    que está definida en test_helpers -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    {{-- <tableboard-test-component
        :user="{{ json_encode($user) }}"
        :opponent="{{ json_encode($opponent) }}"
        :game="{{ json_encode($game) }}">
    </tableboard-test-component> 

    <!-- form oculto para realizar el logout via POST de manera síncrona. Podría haber utilizado la función post
        que está definida en test_helpers -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form> --}}
@endsection
