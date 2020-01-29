<!-- Esta plantilla permite el renderizado en una única página de todas las opciones de autenticación: login, registro y 
   envio de email para resetear contraseña.
   Para ganar tiempo y evitar conflictos, se ha incluido el script de Vue en el código de la página, aunque para ser 
   homogéneos con el resto del código, y por ser además mejores opciones, se podría pensar en hacer algo parecido a una SPA 
   o a la creación de diferentes componentes (login, reset, registro) que tuvieran como propiedad su visibilidad 
-->  
@extends('layouts.app', 
    ['title' => 'Bloque Autenticación', 'css_files' => ['test_scr_login'], 
    'js_files' => []])

@section('content')
    <aside class="sidebar">
        <ul>
            <li class="input-menu"><a @click="showSectorLogin" href="#">Login</a></li>
            <li class="input-menu upper-margin"><a @click="showSectorRegister" href="#">Registro</a></li>
            <li class="input-menu upper-margin"><a @click="showSectorEmail" href="#">Recuperar password</a></li>
        </ul>
    </aside>
    
    <div class="login_div" :class="{ hide: sLogin }">
        <div class="form">
            <h2>Login manual</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf <!-- por razones educativas está desactivado -->
                <label for="email_log">Correo</label>
                <input id="email_log" type="email" name="email" value="{{ old('email') }}" required autofocus>
                <br>
                <label for="password_log">Password</label>
                <input id="password_log" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                <input id="sector_login" type="text" name="sector" value="sector_login" style="display: none">
                <button type="submit">Login</button>   
            </form>
        </div>
        @if ($errors->isNotEmpty() && old('sector') == 'sector_login')
            <div class="error">
                <h4>Error modo 1</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="error">
                <h4>Error modo 2</h4>
                @if ($errors->has('email_log'))
                    <p><strong>email:</strong>{{ $errors->first('email_log') }}</p>
                @endif
            </div>
        @endif
    </div>

    <div class="register_div" :class="{ hide: sRegister }">
        <div class="form">
            <h2>Registro manual</h2>
            <form method="POST" action="{{ route('register') }}"> 
                @csrf <!-- por razones educativas está desactivado -->      
                <label for="name">Nombre</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                <br>
                <label for="email_reg">Correo electrónico</label>
                <input id="email_reg" type="email" name="email" value="{{ old('email') }}" required>
                <br> 
                <label for="password_reg">Contraseña</label>
                <input id="password_reg" type="password" name="password" required>
                <br>
                <label for="password-confirm">Confirma la contraseña</label>
                <!-- es obligatorio que el name sea XXXX_confirmation, donde XXXX es el 
                    nombre del campo a confirmar -->
                <input id="password-confirm" type="password" name="password_confirmation" required>            
                <br>
                <label for="country">País</label>
                <input id="country" type="text" name="country" required>
                <br>
                <input id="sector_register" type="text" name="sector" value="sector_register" style="display: none">
                <button type="submit">
                    Registrar
                </button>
            </form>
        </div>
        @if ($errors->isNotEmpty() && old('sector') == 'sector_register')
            <div class="error">
                <h4>Error modo 1</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="error">
                <h4>Error modo 2</h4>
                @if ($errors->has('name'))
                    <p><strong>nombre:</strong>{{ $errors->first('name') }}</p>
                @endif
                @if ($errors->has('email_reg'))
                    <p><strong>Correo:</strong>{{ $errors->first('email') }}</p>
                @endif
                @if ($errors->has('password_reg'))
                    <p><strong>Contraseña:</strong>{{ $errors->first('password') }}</p>
                @endif
                @if ($errors->has('country'))
                    <p><strong>País:</strong>{{ $errors->first('country') }}</p>
                @endif
            </div>
        @endif
    </div>

    <div class="email_div" :class="{ hide: sEmail }">
        <div class="form">
            <div class="card-body">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf <!-- por razones educativas está desactivado -->

                    <label for="email_email">Correo electrónico</label>
                    <input id="email_email" type="email" name="email" required>
                    <br>
                    <input id="sector_email" type="text" name="sector" value="sector_email" style="display: none">
                    <button type="submit">
                        Envia enlace para el reinicio de contraseña
                    </button>
                </form>
            </div>    
        </div>
        @if ($errors->isNotEmpty() && old('sector') == 'sector_email') 
            <div class="error">
                <h4>Error modo 1</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="error">
                <h4>Error modo 2</h4>
                @if ($errors->has('email'))
                    <p><strong>email:</strong>{{ $errors->first('email') }}</p>
                @endif
            </div>
        @endif
        @if (session('status'))
            <div class="informacion">
                {{ session('status') }}       
            </div>
        @endif
    </div>
@endsection

@section('internal_script')
<script>
    new Vue({
        el: '#app',
        data: { 
            sLogin: {{ old('sector') == 'sector_login' || empty(old('sector')) ? 'false' : 'true' }},
            sRegister: {{ old('sector') == 'sector_register' ? 'false' : 'true' }},
            sEmail: {{ old('sector') == 'sector_email'  ? 'false' : 'true' }},
        },
        methods: {
            showSectorLogin: function(event) {
                event.preventDefault();

                this.sLogin = false;
                this.sRegister = true;
                this.sEmail = true;
            },
            showSectorEmail: function(event) {
                event.preventDefault();

                this.sLogin = true;
                this.sRegister = true;
                this.sEmail = false;
            },
            showSectorRegister: function(event) {
                event.preventDefault();

                this.sLogin = true;
                this.sRegister = false;
                this.sEmail = true;  
            }
        }
    });
    </script>
@endsection
