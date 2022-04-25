@extends('layouts.app',
['title' => 'Dashboard', 'css_files' => ['scr_dashboard'],
'js_files' => ['scr_home']])

@section('content')
    <dashboard-component>
    </dashboard-component>
@endsection


{{-- @section('content')

@php
    if (is_null($user->avatar)) $avatar = "";
    else $avatar = $user->avatar;
@endphp
    <dashboard-test-component
        :user="{{ json_encode($user) }}"
        :avatar="{{ json_encode($avatar) }}"
        :variables="{{ json_encode($statistics) }}">
    </dashboard-test-component> 

    <!-- form oculto para realizar el logout via POST de manera síncrona. Podría haber utilizado la función post
        que está definida en test_helpers -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

@endsection --}}
