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
