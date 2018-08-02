# Listado de funciones API

**GET /api/info/general**

Devuelve información sobre la aplicación en formato JSON.

- *Parámetros*: Ninguno.
- *Salida*: JSON con información general estadística de la aplicación.

<center>

| Parámetro                     |  Descripción  |
| :----------:                  | :------------                   |
| users.number                  | Número de usuarios              |
| users.connected               | Número de jugadores conectados  |
| users.nacionalities           | Número de nacionalidades        |
| supported_languages.languages | Array con el nombre del idioma soportado  |
| supported_languages.number    | Número de lenguajes soportados  |

</center>

**GET /login**

Renderiza la página de login

- *Parámetros*: Ninguno.
- *Salida*: HTML con la página de login.

**GET /password/reset**

Renderiza la página para solicitar el reset del password en caso de olvido.

- *Parámetros*: Ninguno.
- *Salida*: HTML con la página de solicitud.

**GET /password/reset/{token}**

Renderiza la página para realizar el reset del password asociado a {token}.

- *Parámetros*: 

<center>

| Parámet           |  Descripción  |
| :----------:      | :------------                        |
| token             | Token asociado al reset del password |              

</center>

- *Salida*: HTML con la página de reset.

**GET /register**

Renderiza la página de registro de nuevos usuarios

- *Parámetros*: Ninguno.
- *Salida*: HTML con la página de registro.

