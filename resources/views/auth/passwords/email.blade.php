@extends('layouts.app', 
    ['css_files' => ['test_scr_login'], 'title' => 'Reinicio contraseña.'])

@section('content')
    <div></div>
    <div class="form">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <label for="email">Correo electrónico</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                <button type="submit">
                    Envia enlace para el reinicio de contraseña
                </button>
             </form>
        </div>    
    </div>
@endsection
