# Listado de funciones API

**GET /api/info/general**

Devuelve información sobre la aplicación en formato JSON.

- *Parámetros*: Ninguno.
- *Respuesta*: JSON con información general estadística de la aplicación.

<center>

| Parámetro                     |  Descripción  |
| :----------:                  | :------------                   |
| users.number                  | Número de usuarios              |
| users.connected               | Número de jugadores conectados  |
| users.nacionalities           | Número de nacionalidades        |
| supported_languages.languages | Array con el nombre del idioma soportado  |
| supported_languages.number    | Número de lenguajes soportados  |

</center>

**GET /scrabble/login**

Renderiza la página de login [_login.blade.php_].

- *Alias*: login.
- *Parámetros*: Ninguno.
- *Respuesta*: HTML con la página de login.

**POST /scrabble/login**

Realiza el login del usuario.

- *Alias*: login.
- *Parámetros*: 

<center>

| Parámetro          |  Tipo       |  Descripción          |
| :----------:       | :-------:   | :------------         |
| name               | Obligatorio | Nombre del usuario    |  
| email              | Obligatorio | Correo electrónico del usuario      | 

</center>

- *Respuesta*: Si no hay ningún problema, redirecciona a la página de dashboard del usuario (_/scrabble/dashboard_). En caso de error, página de login con la información del error asociada a la variable _$error_:

<center>

| Parámetro          | Descripción       |
| :----------:       | :------------     |
| email              | Array de errores relativos al campo _email_ |  

</center>

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


**GET /scrabble/password/reset**

Renderiza la página para solicitar el reset del password en caso de olvido.

- *Parámetros*: Ninguno.
- *Respuesta*: HTML con la página de solicitud.

**GET /scrabble/password/reset/{token}**

Renderiza la página para realizar el reset del password asociado a {token}. Normalmente es llamada desde el correo que se envia al usuario con el enlace.

- *Parámetros*: 

<center>

| Parámetro      | Tipo        |  Descripción  |
| :----------:   | :-------:   | :------------                        |
| token          | Obligatorio | Token asociado al reset del password |  

</center>

- *Respuesta*: HTML con la página de reset.
