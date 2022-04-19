@extends('layouts.app',
['title' => 'Reinicio contraseña', 'css_files' => ['test_scr_login'],
'js_files' => ['test_scr_reset']])

@section('styles')
    <link href="{{ asset('css/email.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div></div>
    <div class="email-container">

        <form class="gradient" method="POST" action="{{ route('password.email') }}">
            <h3>Indique su email para reiniciar su contraseña</h3>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text fa fa-at" id="basic-addon1"></span>
                </div>
                <input id="email" type="email" name="email" required>
            </div>
            @if ($errors->isNotEmpty() && $errors->has('email'))
                <div class="alert alert-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">
                Envia enlace para el reinicio de contraseña
            </button>
            @if (session('status'))
                <div class="informacion my-3">
                    <div class="alert alert-success">
                        <strong>  {{ session('status') }}</strong>
                    </div>       
                </div>
            @endif
        </form>
    </div>
@endsection
