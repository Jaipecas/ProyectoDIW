@extends('layouts.app', 
    ['title' => 'Login', 'css_files' => ['test_scr_login'], 
    'js_files' => ['test_scr_login']])

@section('content')
    <aside class="sidebar">
        <ul>
            <li class="input-menu"><a href="{{ route('register') }}">Registro</a></li>
            <li class="input-menu upper-margin"><a v-on:click="automatic_login1" href="#">Login (user1)</a></li>
            <li class="input-menu" id="b02"><a v-on:click="automatic_login2" href="#">Login (user2)</a></li>
            <li class="input-menu" id="b03"><a v-on:click="wrong_login" href="#">Login erróneo</a></li>
            <li class="input-menu upper-margin" id="b04"><a href="{{ route('password.request') }}">Contraseña olvidada</a></li>
        </ul>
    </aside>
    <div class="form">
        <h2>Login manual</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf <!-- por razones educativas está desactivado -->
            <label for="email">Correo</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            <br>
            <label for="password">Password</label>
            <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>           
            <button type="submit">Login</button>   
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
            </div>
        </div>
    @endif
@endsection
