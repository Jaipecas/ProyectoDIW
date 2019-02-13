# Listado de funciones API WEB

**GET /scrabble/dashboard**

Renderiza la página de dashboard (el perfil) del usuario (_scr_home.blade.php_).

- *Alias*: dashboard.
- *Parámetros*: Ninguno.
- *Respuesta*: HTML con la página de dashboard del usuario.

**GET /scrabble/game/{id}**

Renderiza la página del tablero de la partida {id}  (_scr_tableboard.blade.php_).

- *Alias*: tableboard.
- *Parámetros*: 

<center>

| Parámetro     |  Tipo       |  Descripción                |
| :----------:  | :-------:   | :------------               |
| id            | Obligatorio | Identificador de la partida |  

</center>

- *Respuesta*: HTML con la página de juego (tablero) de la partida {id}.

**GET /scrabble/login**

Renderiza la página de login (_login.blade.php_).

- *Alias*: login.
- *Parámetros*: Ninguno.
- *Respuesta*: HTML con la página de login.

**POST /scrabble/login**

Realiza el login del usuario.

- *Alias*: login.
- *Parámetros*: 

<center>

| Parámetro     |  Tipo       |  Descripción          |
| :----------:  | :-------:   | :------------         |
| name          | Obligatorio | Nombre del usuario              |  
| email         | Obligatorio | Correo electrónico del usuario  | 
| remember      | Opcional    | Indica si el sistema ha de recordar al usuario |

</center>

- *Respuesta*: Si no hay ningún problema, redirecciona a la página de dashboard del usuario (_/scrabble/dashboard_). En caso de error, página de login con la información del error asociada a la variable _$error_:

<center>

| Parámetro        | Descripción       |
| :----------:     | :------------     |
| email            | Array de errores relativos al campo _email_ |  

</center>

**POST /scrabble/logout**

Realiza el logout del usuario.

- *Alias*: logout.
- *Parámetros*: Ninguno
- *Requerimientos*: Usuario autenticado.
- *Respuesta*: Si no hay ningún problema, redirecciona a la página de inicio (_/_). 

**POST /scrabble/password/email**

Envia por correo electrónico la solicitud del reinicio de contraseña.

- *Alias*: password.email
- *Parámetros*:

<center>

| Parámetro             |  Tipo       |  Descripción       |
| :----------:          | :-------:   | :------------      |
| email                 | Obligatorio | Correo electrónico del usuario   |

</center>

- *Respuesta*: página de reset (_/scrabble/password/reset_) con la información del estado de la petición asociada a la variable _$error_ y a la sesión (más información en el fichero [blade_variables.md](./blade_variables.md))

| Parámetro          | Descripción       |
| :----------:       | :------------     |
| error.email        | Array de errores relativos al campo _email_ |  
| session.status     | Información sobre el estado de la petición |  

**GET /scrabble/password/reset**

Renderiza la página para solicitar el reinicio de la contraseña (_email.blade.php_) en caso de olvido.

- *Alias*: password.request
- *Parámetros*: Ninguno.
- *Respuesta*: HTML con la página de reinicio.

**POST /scrabble/password/reset**

Resetea la contraseña del usuario

- *Alias*: password.request
- *Parámetros*:

<center>

| Parámetro             |  Tipo       |  Descripción       |
| :----------:          | :-------:   | :------------      |
| email                 | Obligatorio | Correo electrónico del usuario    |
| password              | Obligatorio | Contraseña del usuario            |
| password_confirmation | Obligatorio | Contraseña del usuario            |

</center>

- *Respuesta*: Si no hay ningún problema, redirecciona a la página de dashboard del usuario (_/scrabble/dashboard_). En caso de error, página de reinicio (_/scrabble/password/reset/{token}_) con la información del error asociada a la variable _$error_:

<center>

| Parámetro          | Descripción       |
| :----------:       | :------------     |
| token              | token único correspondiente a la solicitud del usuario de reinicio de contraseña |
| email              | Array de errores relativos al campo _email_ |  
| password           | Array de errores relativos al campo _password_ |  
 
</center>

**GET /scrabble/password/reset/{token}**

Renderiza la página para realizar el reset del password asociado a {token}. Normalmente es llamada desde el correo que se envia al usuario con el enlace.

- *Alias*: password.reset 
- *Parámetros*: 

<center>

| Parámetro      | Tipo        |  Descripción  |
| :----------:   | :-------:   | :------------                        |
| token          | Obligatorio | Token asociado al reset del password |  

</center>

- *Respuesta*: HTML con la página de reset asociada a {token}.

**GET /scrabble/register**

Renderiza la página de registro (_register.blade.php_) de nuevos usuarios.

- *Alias*: register.
- *Parámetros*: Ninguno.
- *Respuesta*: HTML con la página de registro.

**POST /scrabble/register**

Crea un nuevo usuario en el sistema.

- *Alias*: register.
- *Parámetros*:

<center>

| Parámetro             |  Tipo       |  Descripción       |
| :----------:          | :-------:   | :------------      |
| name                  | Obligatorio | Nombre del usuario    |  
| email                 | Obligatorio | Correo electrónico del usuario    |
| password              | Obligatorio | Contraseña del usuario            |
| password_confirmation | Obligatorio | Contraseña del usuario            |
| country               | Obligatorio | Código ISO 639-1 alfa-2 del país  |
| favourite_language    | Opcional    | Código ISO 639-1 alfa-2 del lenguaje favorito del usuario | 

</center>

- *Respuesta*: Si no hay ningún problema, redirecciona a la página de dashboard del usuario (_/scrabble/dashboard_). En caso de error, página de registro con la información del error asociada a la variable _$error_:

<center>

| Parámetro          | Descripción       |
| :----------:       | :------------     |
| name               | Array de errores relativos al campo _name_ |  
| email              | Array de errores relativos al campo _email_ |  
| password           | Array de errores relativos al campo _password_ |  
| country            | Array de errores relativos al campo _country_ |  
| favourite_language | Array de errores relativos al campo *favourite_language* | 

</center>

**GET /scrabble/block_auth**

Renderiza una página (_block_auth.blade.php_)  con toda las opciones de autenticación: login, registro y reset de contraseña).

- *Alias*: blockauth.
- *Parámetros*: Ninguno.
- *Respuesta*: HTML con la página con opciones de autenticación.
