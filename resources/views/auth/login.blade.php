@extends('layouts.app', 
    ['title' => 'Login', css_files' => ['test_scr_login'], 
    'js_files' => ['test_scr_login']])

@section('content')
    <aside class="sidebar">
        <ul>
            <li class="input-menu"><a href="{{ route('register') }}">Registro</a></li>
            <li class="input-menu upper-margin" id="b01"><a href="#">Login (user1)</a></li>
            <li class="input-menu" id="b02"><a href="#">Login (user2)</a></li>
            <li class="input-menu" id="b03"><a href="#">Login erróneo</a></li>
            <li class="input-menu upper-margin" id="b04"><a href="{{ route('password.request') }}">Contraseña olvidada</a></li>
        </ul>
    </aside>
    <div class="form">
        <h2>Login manual</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf <!-- por razones educativas está desctivado -->
            <label for="email">Correo</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
           
            <button type="submit">Login</button>   
        </form>
    </div>
</div>
@endsection
