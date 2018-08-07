<!-- el fichero css de login me vale para el registro -->
@extends('layouts.app', 
    ['css_files' => ['test_scr_login'], 'title' => 'Registro'])

@section('content')
    <aside class="sidebar">
        <ul>
            <li class="input-menu"><a href="#">Registro automático</a></li>
            <li class="input-menu"><a href="#">Registro erróneo</a></li>
        </ul>
    </aside>
    <div class="form">
        <h2>Registro manual</h2>
        <form method="POST" action="{{ route('register') }}"> 
            @csrf       
            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            <br>
            <label for="email">Correo electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            <br> 
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required>
            <br>
            <label for="password-confirm">Confirma la contraseña</label>
            <!-- es obligatorio que el name sea XXXX_confirmation, donde XXXX es el 
                 nombre del campo a confirmar -->
            <input id="password-confirm" type="password" name="password_confirmation" required>            
            <br>
            <label for="country">País</label>
            <input id="country" type="text" name="country" required>
            <br>
            <button type="submit">
                Registrar
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
                @if ($errors->has('name'))
                    <p><strong>nombre:</strong>{{ $errors->first('name') }}</p>
                @endif
                @if ($errors->has('email'))
                    <p><strong>Correo:</strong>{{ $errors->first('email') }}</p>
                @endif
                @if ($errors->has('password'))
                    <p><strong>Contraseña:</strong>{{ $errors->first('password') }}</p>
                @endif
                @if ($errors->has('country'))
                    <p><strong>País:</strong>{{ $errors->first('country') }}</p>
                @endif
            </div>
        </div>
    @endif
@endsection
