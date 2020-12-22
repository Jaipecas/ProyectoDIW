<!-- el fichero css de login me vale para el registro -->
@extends('layouts.app', 
    ['title' => 'Reinicio contraseña', 'css_files' => ['test_scr_login'],
    'js_files' => ['test_scr_reset']])

@section('content')
    <div></div>
    <div class="form">
        <form method="POST" action="{{ route('password.request') }}">
            @csrf <!-- por razones educativas está desactivado -->

            <input type="hidden" name="token" value="{{ $token }}">

            <label for="email">Correo electrónico</label>     
            <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
            <br>
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required>
            <br>         
            <label for="password-confirm">Confirma contraseña</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>
            <br>      
            <button type="submit">
                Reinicia contraseña
            </button>
                  
        </form>
    </div>
    @if ($errors->isNotEmpty())
        <div class="error">
            <div>
                <h4>Error modo 1</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h4>Error modo 2</h4>
                @if ($errors->has('email'))
                    <p><strong>email:</strong>{{ $errors->first('email') }}</p>
                @endif
                @if ($errors->has('password'))
                    <p><strong>password:</strong>{{ $errors->first('password') }}</p>
                @endif
            </div>
        </div>
    @endif
@endsection
