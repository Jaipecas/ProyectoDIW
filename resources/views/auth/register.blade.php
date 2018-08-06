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
            <label for="name">Nombre</label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        
            
            <label for="email">Correo electrónico</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
                    
            <label for="password">Contraseña</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            
            <button type="submit">
                Registrar
            </button>
        </form>
    </div>
</div>
@endsection
