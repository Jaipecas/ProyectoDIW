<!-- el fichero css de login me vale para el registro -->
@extends('layouts.app',
['title' => 'Registro', 'css_files' => ['test_scr_login'],
'js_files' => ['test_scr_register']])


@section('styles')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="register-grid">
        <div>
            <form class="gradient" method="POST" action="{{ route('login') }}">
                <h2>Login</h2>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text fa fa-at" id="basic-addon1"></span>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="form-control" placeholder="Email" aria-label="Email">
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
                    <input id="password" type="password"
                        class="{{ $errors->has('password') ? ' is-invalid' : '' }} form-control" name="password" required
                        placeholder="Contraseña" aria-label="Contraseña">
                </div>

                <div class="check-group">
                    <input type="checkbox">
                    <label>Recuérdame</label>
                </div>
                <div>
                    <a href="/scrabble/password/reset"><strong>¿Has olvidado tu contraseña?</strong></a>
                </div>

                <button type="submit" type="submit" class="btn btn-primary mt-2">Login</button>
            </form>
        </div>

        <div>
            <h2>¿Todavía no te ha registrado?</h2>
            <p><strong>Pulsa el botón para registrarte y disfrutar de inumerables partidas de Scrabble</strong></p>
            <a href="{{ route('register') }}" id="buttonRegisterTemplate" type="submit"
                class="btn btn-primary">Regístrate</a>
        </div>
    </div>
@endsection
