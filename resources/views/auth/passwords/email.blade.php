@extends('layouts.app', 
    ['title' => 'Reinicio contraseña', 'css_files' => ['test_scr_login'],
    'js_files' => ['test_scr_reset']])

@section('content')
    <div></div>
    <div class="form">
        <div class="card-body">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf <!-- por razones educativas está desactivado -->

                <label for="email">Correo electrónico</label>
                <input id="email" type="email" name="email" required>
                <br>
                <button type="submit">
                    Envia enlace para el reinicio de contraseña
                </button>
             </form>
        </div>    
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
            </div>
        </div>
    @endif
    @if (session('status'))
        <div class="informacion">
            {{ session('status') }}       
        </div>
    @endif
@endsection
