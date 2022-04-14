<!-- el fichero css de login me vale para el registro -->
@extends('layouts.app', 
    ['title' => 'Reinicio contraseña', 'css_files' => ['test_scr_login'],
    'js_files' => ['test_scr_reset']])

@section('styles')
    <link href="{{ asset('css/loginRegister.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div></div>
    <div class="email-container">
        <form class="gradient" method="POST" action="{{ route('password.request') }}">
            <h3>Inserte su nueva contraseña</h3>

            <input type="hidden" name="token" value="{{ $token }}">

     
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text fa fa-at" id="basic-addon1"></span>
                </div>
                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
            </div>
            @if ($errors->isNotEmpty() && $errors->has('email'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif


            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text fa fa-key" id="basic-addon1"></span>
                </div>
                <input id="password" type="password" name="password" required>
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text fa fa-key" id="basic-addon1"></span>
                </div>
                <input id="password-confirm" type="password" name="password_confirmation" required>
            </div>
            @if ($errors->isNotEmpty() && $errors->has('password'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">
                Reinicia contraseña
            </button>
               
        </form>
    </div>
   
@endsection
